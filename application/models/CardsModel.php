<?php
class CardsModel extends CI_Model
{

    public function curl($url)
    {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $data = curl_exec($ch);
            $error = curl_errno($ch);
            $error_message = curl_error($ch);
            curl_close($ch);
        if ($error == 0) {
            $result = json_decode($data, true);
            return $result;
        } else { //if there's no data or there was an error
             $this->errorHandler($error);
        }
    }

    public function searchCard($card = null)
    {
        if ($card == null) {
                $this->errorHandler();
        }
            //search parameters
            $exp = 'rarity=common+game=paper+';
            $card = preg_replace('/[^A-Za-z0-9 ]/', '', $card);
            $card = str_replace(' ', '+', $card);
            $param = $exp.'name='.$card;
            $url = 'https://api.scryfall.com/cards/search?q='.$param;

            $result = $this->curl($url);
            return $result;
    }

    public function searchViewedCard($card = null)
    {
            //search parameters
            $card = preg_replace('/[^A-Za-z0-9 ]/', '', $card);
            $param = $card."'rarity=common+game=paper";
            $url = "https://api.scryfall.com/cards/search?q=!'".$param;

            $result = $this->curl($url);
            return $result['data'][0];
    }

    public function searchAll($page_num = 1)
    {
            //search parameters
            $param = 'rarity=common+game=paper';
            $url = 'https://api.scryfall.com/cards/search?q='.$param.'&page='.$page_num;
            
            $result = $this->curl($url);
            return $result;
    }

    public function viewCard($result)
    {
            $card = array();
            $fetchCard = $result;
            
            $card['name'] = $fetchCard['name'];
            $card['cost'] = $fetchCard['mana_cost'];
            $card['link'] = url_title($fetchCard['name']);
            $card['type'] = $fetchCard['type_line'];
            $card['text'] = preg_replace("/[\n\r]/", "\n\n", $fetchCard['oracle_text']);

        if (preg_match_all("/\([^)]+\)/", $card['text'], $matches)) { //show reminder text in italics
            foreach ($matches[0] as $match) {
                    $card['text'] = str_replace($match, '<i>'.$match.'</i>', $card['text']);
            }
        }

        if (isset($fetchCard['image_uris']['normal'])) {
                  $card['url'] = $fetchCard['image_uris']['normal'];
        } else { //if card is double sided
                  $card['url'] = $fetchCard['card_faces'][0]['image_uris']['normal'];
        }
              return $card;
    }

    public function viewAll($result)
    {
            $cards = array(
            "data" => array(),
            "next_exists" => array()
            );

            $card = $result['data'];
            //check if there is a next page beyond this one
            $cards['next_exists'] = isset($result['next_page']) ? true : false;
                $i = 0;
            foreach ($card as $value) {
                  $cards['data'][$i]['name'] = $card[$i]['name'];
                  $cards['data'][$i]['link'] = url_title($card[$i]['name']);

                if (isset($card[$i]['image_uris']['normal'])) {
                      $cards['data'][$i]['url'] = $card[$i]['image_uris']['normal'];
                } else { //if card is double sided
                      $cards['data'][$i]['url'] = $card[$i]['card_faces'][0]['image_uris']['normal'];
                }
                    $i++;
            }
                  return $cards;
    }

    public function errorHandler($error_code = null)
    {
        switch ($error_code) {
            case 22:
                $message = "No cards found.";
                break;
            case 6:
                $message = "Couldn't resolve host.";
                break;
            default:
                $message = "No cards found.";
                break;
        }
        return show_error($message, '404', 'Error');
    }
}

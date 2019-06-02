<?php
Class Cards_model extends CI_Model {

public function get_response($certain_card = NULL, $page_num = 1) {

// search parameters
$exp = 'rarity:common+game:paper+';
$certain_card = preg_replace('/[^A-Za-z0-9 ]/', '', $certain_card);
$param = $certain_card == NULL ? $exp : $exp.'name:'.$certain_card;
$url = 'https://api.scryfall.com/cards/search?q='.$param.'&page='.$page_num;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);      
    $data = curl_exec($ch);
    $error = curl_errno($ch);
    $error_message = curl_error($ch); 
    curl_close($ch);

if ($error == 0) {
  	$result = json_decode($data, true);} 
  	else { // if there's no data or there was an error
  	$result = $error;
  	}
  	return $result;
  }

public function get_cards($result) {

$cards = array(
"info" => array(),	
"details" => array()	
);

$card = $result['data'];

	$cards['info']['next_exists'] = isset($result['next_page']) ? TRUE : FALSE; // check if there is a next page beyond this one
	$i = 0;
	foreach ($card as $value) {

		$cards['details'][$i]['name'] = $card[$i]['name'];
		$cards['details'][$i]['link'] = url_title($card[$i]['name']);

		if (isset($card[$i]['image_uris']['normal'])) {

				$cards['details'][$i]['url'] = $card[$i]['image_uris']['normal'];

		} else { // if card is double sided
				$cards['details'][$i]['url'] = $card[$i]['card_faces'][0]['image_uris']['normal'];
		}
			$i++;
	}
		return $cards;
}

public function error_handler($result) {

	switch ($result) {
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
	return show_error($message,'404','Error');
}
}
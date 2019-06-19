<?php
class Cards extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('twig');
        $this->load->model('cardsmodel');
        $this->load->helper('html');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $result = $this->cardsmodel->searchAll();
        $cards =  $this->cardsmodel->viewAll($result);
        $next_exists = $cards['next_exists'];
        $page_num = 1;
        $cards = $cards['data'];
        $title = "All Commons";

        $this->twig->display('cards/index', ['cards' => $cards, 'title' =>
        $title, 'nextexists' => $next_exists, 'pagenumber' => $page_num]);
    }

    public function page($page_num)
    {
        $result = $this->cardsmodel->searchAll($page_num);
        $cards =  $this->cardsmodel->viewAll($result);
        $next_exists = $cards['next_exists'];
        $cards = $cards['data'];
        $title = "All Commons - Page ".$page_num;

        $this->twig->display('cards/index', ['cards' => $cards, 'title' =>
        $title, 'nextexists' => $next_exists, 'pagenumber' => $page_num]);
    }

    public function view($card)
    {
        $result = $this->cardsmodel->searchViewedCard($card);
        $data['error_message'] = "";
        $card = $this->cardsmodel->viewCard($result);
        
        $title = $card['name'];

        $this->twig->display('cards/view', ['card' => $card, 'title' => $title ]);
    }

    public function search()
    {
        $card = $this->input->post('name');
        $result = $this->cardsmodel->searchCard($card);
        $name = url_title($result['data'][0]['name']);
        redirect('view/'.$name);
    }
}

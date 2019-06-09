<?php
class Cards extends CI_Controller {

public function __construct() {

		parent::__construct();
		$this->load->library('twig');
		$this->load->model('cards_model');
		$this->load->helper('html');
		$this->load->helper('url_helper');
	}

public function index() {

		$result = $this->cards_model->searchAll();
		$cards =  $this->cards_model->viewAll($result);
		$next_exists = $cards['info']['next_exists'];
		$page_num = 1;
		$cards = $cards['details'];
		$title = "All Commons";

$this->twig->display('cards/index', ['cards' => $cards, 'title' => $title, 'nextexists' => $next_exists, 'pagenumber' => $page_num]); }

public function page($page_num) {

		$result = $this->cards_model->searchAll(NULL,$page_num);
	    $cards =  $this->cards_model->viewAll($result);
	    $next_exists = $cards['info']['next_exists'];
		$cards = $cards['details'];
		$title = "All Commons";

$this->twig->display('cards/index', ['cards' => $cards, 'title' => $title, 'nextexists' => $next_exists, 'pagenumber' => $page_num]);
	}

public function view($card) {

		$result = $this->cards_model->searchNamedCard($card, NULL);
		$data['error_message'] = "";
		$data['fetchCard'] = $this->cards_model->viewCard($result);
		$card = $data['fetchCard']['details'];
        $title = $card['name'];

$this->twig->display('cards/view', ['card' => $card, 'title' => $title ]);
	}

public function search() {
		$card = $this->input->post('name');
		$result = $this->cards_model->searchCard($card);
		$name = url_title($result['data'][0]['name']);

		redirect('view/'.$name);
}


}
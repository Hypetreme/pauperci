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

		$result = $this->cards_model->get_response();
		if (!is_array($result)) {
		$data['error_message'] = $this->cards_model->error_handler($result);		
		} else {
		$cards =  $this->cards_model->get_cards($result);
		$next_exists = $cards['info']['next_exists'];
		$cards = $cards['details'];
		$title = "All Commons";
		$this->twig->display('cards/index', ['cards' => $cards, 'title' => $title, 'nextexists' => $next_exists]);
}
        
	}


	public function page($page_num) {

		$result = $this->cards_model->get_response(NULL,$page_num);

		if (!is_array($result) || empty($result['data'])) {
		$data['error_message'] = $this->cards_model->error_handler($result);

		} else {
	    $cards =  $this->cards_model->get_cards($result);
	    $next_exists = $cards['info']['next_exists'];
		$cards = $cards['details'];
		$title = "All Commons";
		$this->twig->display('cards/index', ['cards' => $cards, 'title' => $title, 'nextexists' => $next_exists, 'pagenumber' => $page_num]);
		}
	}

	public function view($certain_card) {

		$result = $this->cards_model->get_response($certain_card, NULL);
		if (!is_array($result)) {

		$data['error_message'] = $this->cards_model->error_handler($result);	
		} else {

		$data['error_message'] = "";
		$data['cards'] = $this->cards_model->get_cards($result);
		$card = $data['card']['details'] = array_shift($data['cards']['details']);
        $title = $card['name'];
    }

        $this->twig->display('cards/view', ['card' => $card, 'title' => $title ]);
	}

	public function search() {
		$certain_card = $this->input->post('name');
		$this->view($certain_card);
	}


}
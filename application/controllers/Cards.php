<?php
class Cards extends CI_Controller {

		public function __construct() {

		parent::__construct();
		$this->load->model('cards_model');
		$this->load->helper('html');
		$this->load->helper('url_helper');
	}

	public function index() {

		$result = $this->cards_model->get_response();
		if (!is_array($result)) {
		$data['error_message'] = $this->cards_model->error_handler($result);		
		} else {
		$data['cards'] =  $this->cards_model->get_cards($result);
		$data['card'] = $data['cards']['details'];
		$data['next_exists'] =$data['cards']['info']['next_exists'];
		$data['page_num'] = 1;
}
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
        $this->load->view('cards/index', $data);
        $this->load->view('templates/footer', $data);
	}


	public function page($page_num) {

		$result = $this->cards_model->get_response(NULL,$page_num);

		if (!is_array($result) || empty($result['data'])) {
		$data['error_message'] = $this->cards_model->error_handler($result);

		} else {
		$data['cards'] =  $this->cards_model->get_cards($result);
		$data['card'] = $data['cards']['details'];
		$data['next_exists'] =$data['cards']['info']['next_exists'];
		$data['page_num'] = $page_num;
}
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('cards/index', $data);
        $this->load->view('templates/footer', $data);
	}

	public function view($certain_card) {

		$result = $this->cards_model->get_response($certain_card, NULL);
		if (!is_array($result)) {

		$data['error_message'] = $this->cards_model->error_handler($result);	
		} else {

		$data['error_message'] = "";
		$data['cards'] = $this->cards_model->get_cards($result);
		$data['card']['details'] = array_shift($data['cards']['details']);
        $data['title'] = $data['card'];
    }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav', $data);
        $this->load->view('cards/view', $data);
        $this->load->view('templates/footer', $data);
	}


}
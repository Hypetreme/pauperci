<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {

  public function __construct() {

    parent::__construct();
    $this->load->library('twig');
    $this->load->helper('url');
    $this->load->helper('html');
  }

  public function index(){
 
    $this->output->set_status_header('404'); 
    $this->twig->display('error404');
 
  }

}
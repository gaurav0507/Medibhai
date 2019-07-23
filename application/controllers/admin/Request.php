<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {
	
	
	  protected $data;
	  public function __construct()
	  {
		  parent::__construct();
          date_default_timezone_get('Asia/kolkata');
		  
		   $this->load->library('session');
           $this->load->helper('url');
		   $this->load->library('form_validation');
		   
		    if(!$this->session->userdata('logged_in'))
		    {
			   $session_data = $this->session->userdata('logged_in');
			   $data['id'] = $session_data['id'];
			   redirect('Login','refresh');
			}
		   
		   
		   
			$this->load->model('Privileges_model');
			$this->load->model('Delivery_model');
		    $data['Menu'] = $this->Privileges_model->Menu();
			
			$this->load->view('admin/Header');
		    $this->load->view('admin/sidebar',$data);
	  }
	
	
	
	public function index()
	{
		$this->load->view('admin/Request');
		$this->load->view('admin/footer');
	}
	
	
}
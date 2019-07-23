<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Plain extends CI_Controller {
	
	
	   protected $data;
	   public function __construct()
	   {
		   parent::__construct();
           date_default_timezone_get('Asia/kolkata');
		   
		   
           $this->load->helper('url');
		   $this->load->model(array('Policy_model'));
		}



    public function user_files($userid)
	{
		if($userid)
		{
			$data['userfile'] = json_decode($this->Policy_model->get_policy($userid),true);
			$this->load->view('admin/userfile',$data);
		}
	}








	
	
}
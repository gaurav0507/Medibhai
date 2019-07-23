<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

         protected $data;
         
         public function __construct()
         {
               parent::__construct();
               date_default_timezone_get('Asia/kolkata');
              
               $this->load->library('session');
               $this->load->helper('url');
               $this->load->library('form_validation');
               $this->load->model('Login_database');
               $this->load->library('encryption');

              
         }
    
    
      public function index()
	  {
	    if(isset($this->session->userdata['logged_in'])) 
		{
		    redirect('admin/Dashboard');
		}
		else
		{
			$this->load->view('admin/login');
		}
	  }
      

      public function user_login_process()
      {
         
            if($this->input->post('login'))
            {
                  $this->form_validation->set_rules('username', 'Username', 'trim|required');
                  $this->form_validation->set_rules('password', 'Password', 'trim|required');
                  
                  if($this->form_validation->run() == FALSE)
				  {
                       
					   if(isset($this->session->userdata['logged_in']))
					   {
                           $this->load->view('admin/Dashboard');
                       }
					   else
					   {
                           $this->load->view('admin/login');
                       }
					   
					   
                  }
				  else
				  {
                         
						 $data = array('username'=>$this->input->post('username'),'password'=>$this->input->post('password'));
						 $result = $this->Login_database->login($data);
						 if($result == TRUE) 
						 {
							 $username = $this->input->post('username');
                             $result = $this->Login_database->read_user_information($username);
							 if ($result != false) 
							 { 
						         $session_data = array('id'=>$result[0]->id,'firstname'=>$result[0]->first_name,'email'=>$result[0]->email,'type'=>$result[0]->user_type);
                                 $this->session->set_userdata('logged_in',$session_data);
								 redirect('admin/Dashboard');
                                 
							 }
						 }
					     else
						 {
							 $data = array('error_message'=>'Invalid Username or Password');
                             $this->load->view('admin/Login',$data);
						 }
						 
						 
						 
                  }

            }
            else
			{
                   echo "error";
            }



      }

      public function Home()
      {
            
            $this->load->view('Header');
			$this->load->view('Sidebar');
			$this->load->view('Dashboard');
			$this->load->view('Footer');

      }

     
     public function Logout()
	 {
		 $sess_array = array('id'=> '');
		 $this->session->unset_userdata('logged_in',$sess_array);
		 $data['message_display'] = 'Successfully Logout';
		 $this->load->view('admin/login',$data);
		 
	 }	 


}

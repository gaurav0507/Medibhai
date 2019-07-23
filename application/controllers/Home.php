<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/third_party/razorpay-php/Razorpay.php";
use Razorpay\Api\Api as RazorpayApi;

class Home extends CI_Controller {

	  protected $data;
	  public function __construct()
	  {
					parent::__construct();
					date_default_timezone_get('Asia/kolkata');
					$this->load->library('session');
					$this->load->helper('url');
					
					$this->load->library('form_validation');
					$this->load->model('Agents_model');
					$this->load->model('User_model');
					
					$this->load->library('google');
					$this->load->library('facebook');
					
      }
	
	
	public function index()
	{
		$this->load->view('Header');
		$this->load->view('index');
		$this->load->view('Footer');
	}
	
	
	
	public function Registeration()
	{
		//$this->load->view('Members.php');
		$this->load->view('Register.php');
	}
	
	
	public function create_members()
	{
		


		if($this->input->post())
		{
			
			$this->form_validation->set_rules('firstname','Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname','Lastname', 'trim|required');
			$this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[ci_agent_registration.agent_email]');
			$this->form_validation->set_rules('mobile','Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]|is_unique[ci_agent_registration.mobile]');
			$this->form_validation->set_rules('package','Package', 'trim|required');
			$this->form_validation->set_rules('password','Password', 'trim|required');
			
           

			if($this->form_validation->run() == FALSE)
			{
				//$this->load->view('Members');
				$this->load->view('Register');
				
			}
			else
			{  
				$data = array('first_name' => $this->input->post('firstname'),'last_name' => $this->input->post('lastname'),
							  'agent_email' => $this->input->post('email'),'mobile'=>$this->input->post('mobile'),
							  'package_info'=>$this->input->post('package'),'password'=>$this->input->post('password'));

					
					   $result = $this->Agents_model->registration_insert($data);
					   if(isset($result))
					   {
						    $id = $data['package_info'];
						    $data['getinfo'] = $this->Agents_model->package_info($id);
							$data['user_id'] = $result;
							$data['payment_data'] = $data; 
							
							//$this->load->view('payments',$data);
							
							$this->load->view('Header');
			                $this->load->view('payments',$data);
			                $this->load->view('Footer');
						    
					   }
					   else
					   {
							
							//$this->load->view('payments');
					   }
					

					

			}




		}
		else
		{
            $this->load->view('Register');
			
		}





	}

  public function signin()
	{
		
		
		if($this->input->post('save'))
		{
				
				
				$this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('password','Password', 'trim|required');

				if($this->form_validation->run() == FALSE)
				{
					   $this->load->view('Header');
					   $this->load->view('Login123');
					   $this->load->view('Footer');
				}
				else
				{
						    $data = array('username'=>$this->input->post('email'),'password'=>$this->input->post('password'));
                            $results = $this->Agents_model->login($data);
							if($results != false)
							{
								$session_data = array('id'=>$results['id'],'lastname'=>$results['last_name'],'package'=>$results['package_info']);
								$this->session->set_userdata('user_info',$session_data);
								redirect('Dashboard');

							}
							else
							{
								$data = array('error_message' => 'Invalid Username or Password');
								$this->load->view('Header');
								$this->load->view('Login123',$data);
								$this->load->view('Footer');
								//redirect('Home/signin',$data);
							}
                }
        }
	    else
		{
			$this->load->view('Header');
			$this->load->view('Login123');
			$this->load->view('Footer');
			
		}

	}
	

	
	public function paymentupdate()
	{
		if($this->input->is_ajax_request())
		{
			
			$userid = $this->input->post('user_id');
			$transactionid = $this->input->post('transaction_id');
			$packageid = $this->input->post('packageid');
			$amount = $this->input->post('amount');
			
			$api = new RazorpayApi('rzp_test_slCHSOjh0jlE72','HRzoTM19xkzirwscPZyjqfMh'); //beta
			$payment = $api->payment->fetch($transactionid); 
           			
            $amount  = $payment->amount;
            $capture = $payment->capture(array('amount' => $amount));
            $status  = $capture->status;
			
			if($status=="captured")
            {
			
				$data = array('user_id'=>$userid,'transaction_id'=>$transactionid,'package_id'=>$packageid,'amount'=>$amount);
				$payment_info = $this->Agents_model->Insert_payment($data);
				
				if($payment_info)
				{
					$results = $this->Agents_model->get_user_info($userid);
					
					$session_data = array('id'=>$results['id'],'first_name'=>$results['first_name'],'lastname'=>$results['last_name'],'package'=>$results['package_info']);
					$this->session->set_userdata('user_info',$session_data);
					
					$json_array['redirect'] = base_url('Dashboard');
					$json_array['status'] = TRUE;
					$json_array['message'] = "";    
				}
				else
				{
					$json_array['status'] = FALSE;
                    $json_array['message'] = "Payment status not update.Please Try again later!";
				}
				
				 echo json_encode($json_array);
			}
			
			
		}
	    
	}
	
	
	

	
	
	
/*-------------------------------------------------------------------------------------------------------------------------*/	
	
	public function registeration_link()
	{
       
	   $code = $this->uri->segment(3);
	   $this->load->model('User_model');
       if(isset($code) && $code != "")
	   {
		   $status = $this->User_model->check_code($code);
		   
		   if($status == 'TRUE')
		   {
			   $limit = $this->User_model->check_limit($code);
			   if($limit['total_unit'] > $limit['used_unit'])
			   {
				   
				   $data['code'] = $code;
				   
				   $this->load->view('link_page',$data);
				   
				   
			   }
			   else
			   {
				   echo "<center><span><strong>your limit over upgrade your package</strong></br></br>Need any help or assistance call <a href='tel:9967965001' style='text-decoration:none;color:#000;'>9967965001.</a></span></center>";
			   }
			   
		   }
		   else if($status == 'FALSE'){
			   
			   echo "<center><span><strong>your agent code is not valid.</strong></br></br>Need any help or assistance call <a href='tel:9967965001' style='text-decoration:none;color:#000;'>9967965001.</a></span></center>";
		   }
		   
		   
		   
	   }
	   else
	   {
		   echo "<center><span><strong>The link you followed may be broken, or the page may have been expired.</strong></br></br>Need any help or assistance call <a href='tel:9967965001' style='text-decoration:none;color:#000;'>9967965001.</a></span></center>";
	   }
		
	}
	
/*----------------------------------------------------------------------------------------------------------*/	
	
	public function claim()
	{
	  $this->load->view('claim');
	}
	
	
/*----------------------------------------------------------------------------------------------*/	
	
	public function user()
	{
		if(!$this->session->userdata('sess_logged_in'))
		{
			$data['google_login_url']=$this->google->get_login_url();
			$data['authUrl'] = $this->facebook->login_url();
			$this->load->view('user',$data);
			
		}
		else
		{
			redirect('Dashboard_user');
		}
		
	}
	
	
	public function oauth2callback()
	{
		$google_data=$this->google->validate();
		
		
		$session_data=array('name'=>$google_data['name'],'email'=>$google_data['email'],'source'=>'google','profile_pic'=>$google_data['profile_pic'],
				            'link'=>$google_data['link'],'sess_logged_in'=>1); 
		$this->session->set_userdata($session_data);
        redirect(base_url());
		
		
	}
	
	
	public function Facebooklogin()
	{
		$userData = array();
		if($this->facebook->is_authenticated())
		{
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
			
			$session_data=array('name'=>$userProfile['first_name'].$userProfile['last_name'],'email'=>$userProfile['email'],'sess_logged_in'=>1);
			 
			$this->session->set_userdata($session_data); 
			
		}
		
    }
    
	
	
	public function register()
	{
		$data['google_login_url']=$this->google->get_login_url();
		$data['authUrl'] = $this->facebook->login_url();
		
		if($this->input->post())
		{
			$this->form_validation->set_rules('First_Name','Firstname', 'trim|required');
			$this->form_validation->set_rules('Last_Name','Lastname', 'trim|required');
			$this->form_validation->set_rules('email_id','Email', 'trim|required|valid_email|is_unique[ci_users.email]');
			$this->form_validation->set_rules('Mobile_Number','Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]|is_unique[ci_users.mobile]');
			$this->form_validation->set_rules('password','Password', 'trim|required');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('user',$data);
			}
			else
			{
				 
				 
				 $data = array('first_name'=>$this->input->post('First_Name'),'last_name'=>$this->input->post('Last_Name'),
				               'email'=>$this->input->post('email_id'),'mobile'=>$this->input->post('Mobile_Number'),
							   'password'=>$this->input->post('password'));
                 
				 $results = $this->User_model->save_user($data);
				 if(isset($results))
                 {
						$session_data = array('name'=>$this->input->post('First_Name').$this->input->post('Last_Name'),
						        'email'=>$this->input->post('email_id'),'mobile'=>$this->input->post('Mobile_Number'),
								'source'=>'website','sess_logged_in'=>1); 
		                $this->session->set_userdata($session_data); 
						
						
						redirect('Dashboard_user');
				 }
                 else
				 {
					 redirect('Home/user'); 	 
					 
				 }					 
			}
			
			
			
		}
		else
		{
			redirect('Home/userlogout');
		}
	}
	
	
	
	
	public function login()
	{
		$data['google_login_url']=$this->google->get_login_url();
		$data['authUrl'] = $this->facebook->login_url();
		
		$this->load->view('login_user',$data);
	}
	
	
	
	
	public function Auth()
	{
		$data['google_login_url']=$this->google->get_login_url();
		$data['authUrl'] = $this->facebook->login_url();
		
		if($this->input->post())
		{
			$this->form_validation->set_rules('txtemailmobile','Email or Mobile', 'trim|required');
			$this->form_validation->set_rules('password','Password', 'trim|required');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('login_user',$data);
			}
			else
			{
				  $data = array('txtemailmobile'=>$this->input->post('txtemailmobile'),'password'=>$this->input->post('password'));
				  
	         	  $username = $this->input->post('txtemailmobile');
				  $password = $this->input->post('password');
				  
				  $results = $this->User_model->Auth_login($username,$password);
				  if($results)
				  {
					  $data = $this->User_model->Auth_Info($username);
					  
					  $session_data = array('id'=>$data['id'],'email'=>$data['email'],'mobile'=>$data['mobile'],'sess_logged_in'=>1); 
		              $this->session->set_userdata($session_data); 
					  
					  redirect('Dashboard_user'); 
					  
				  }
				  else{
					  
					  $this->session->set_flashdata('error',"Username and Password Invalid");
					  redirect('Home/login');
				  }
				  
				  
			}
			
			
		}
		else{
			redirect('Home/login');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function logout()
	{
		$sess_array = array('username' => '');
		$this->session->unset_userdata('user_info', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		
		//$this->load->view('Home',$data);
		
		redirect('Home');
	}
	
	
	
	
	public function userlogout() 
	{
		$this->facebook->destroy_session();
		
		
		session_destroy();
		unset($_SESSION['access_token']);
		$session_data=array('sess_logged_in'=>0);
		$this->session->set_userdata($session_data);
		
		
		redirect('Home/user');
    }
	
	
	
	
	
}

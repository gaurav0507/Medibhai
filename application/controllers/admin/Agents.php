<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends CI_Controller {
	
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
			$this->load->model('Agents_model');
		    $data['Menu'] = $this->Privileges_model->Menu();
			
			$this->load->view('admin/Header');
		    $this->load->view('admin/sidebar',$data);
		   
	   }
	
	
	
	public function index()
	{
		$data['title'] = "Agent-Form";
		
		$this->load->view('admin/Agents_form.php',$data);
		$this->load->view('admin/Footer');
	}
	
	public function create()
	{
	    
		if($this->input->post('save'))
        {
			$this->form_validation->set_rules('firstname','firstname', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('pincode', 'pincode', 'trim|required|regex_match[/^[0-9]{6}$/]');
			
                  
            if($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/Agents_form.php');
				$this->load->view('admin/Footer');
			}
		    else
			{
				
				$data = array('first_name'=>$this->input->post('firstname'),'last_name'=>$this->input->post('lastname'),
				              'agent_email'=>$this->input->post('email'),'mobile'=>$this->input->post('mobile'),
							  'alternate_contact'=>$this->input->post('amobile'),'office_landline'=>$this->input->post('landline'),
							  'Area'=>$this->input->post('address'),'pincode'=>$this->input->post('pincode'),
				             );
							 
							 
							 $result = $this->Agents_model->save($data);
							 if($result)
							 {
								$this->session->set_flashdata('message',array('message'=>'Save Successfully','class'=>'label label-success'));
                                redirect('admin/Agents');
							 }
							 else
							 {
								$this->session->set_flashdata('message',array('message'=>'Server error please try again','class'=>'error_strings'));
                                redirect('admin/Agents');
							 }
							 
							
							 
			}
		}
	    else
		{
			echo "sdfsdf";
		}
	}
	
	public function view()
	{
		$data['header_title'] = 'Agents';
		$data['get_data'] = json_decode($this->Agents_model->Get_Agents(),true);
		$this->load->view('admin/Agents_view.php',$data);
		$this->load->view('admin/Footer');
	}
	
	public function update()
	{}
	
	public function status()
	{}
	
	
}


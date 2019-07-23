<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Policy extends CI_Controller {
	
	
	   protected $data;
	   public function __construct()
	   {
		   parent::__construct();
           date_default_timezone_get('Asia/kolkata');
		   
		   $this->load->library('session');
           $this->load->helper('url');
		   $this->load->library('form_validation');
		   $this->load->library('encrypt');
		   
		   if(!$this->session->userdata('logged_in'))
		   {
			   $session_data = $this->session->userdata('logged_in');
			   $data['id'] = $session_data['id'];
			   redirect('Login','refresh');
			}
		   
		   
		   
			$this->load->model('Privileges_model');
			$this->load->model(array('Agents_model','User_model','Policy_model'));
		    $data['Menu'] = $this->Privileges_model->Menu();
			
			$this->load->view('admin/Header');
		    $this->load->view('admin/sidebar',$data);
		   
	   }
	
	
	
	public function index()
	{
		
		$data['header_title'] = "Policy_upload";
        $data['documents'] = json_decode($this->Agents_model->get_documents(),true);
		
		$this->load->view('admin/upload_policy_page',$data);
		$this->load->view('admin/Footer');
		
	}
	
	public function status_changed($id = NULL)
	{
		
		if($id)
		{
			$data['status'] = json_decode($this->Agents_model->get_status(),true);
			
			$status_id = $this->uri->segment(4);
			
			$data['eid'] = $status_id;
			
			$this->load->view('admin/upload_policy_page_edit',$data);
			$this->load->view('admin/Footer');
			
		}
		else
		{
			redirect('admin/Policy');
		}
		
		
	}
	
	public function status_update()
	{
		if($this->input->post('save'))
        {
			$eid = $this->input->post('eid');
			
			$dropdown_status = $this->input->post('dropdown_status');
			$note = $this->input->post('note');
			
			$this->form_validation->set_rules('dropdown_status', 'Please select status', 'required');
			$this->form_validation->set_rules('note', 'Note', 'required');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->status_changed($eid);
			}
			else
			{
				$results = $this->Agents_model->update_status($eid,$dropdown_status);
				if($results == 1)
				{
					$this->session->set_flashdata('message', array('message' =>'status updated successfully','class'=>'alert alert-success fade in'));
					redirect('admin/Policy');
				}
                else
                {
					$this->session->set_flashdata('message', array('message' =>'server error try again','class'=>'alert alert-danger fade in'));
					redirect('admin/Policy');
				}	
			}
			
			
			
			
		}
		else
		{
			redirect('admin/Policy');
		}
		
		
	}
	
	
	
	
	public function Assign()
	{
		$data['header_title'] = "New Policy";
        $data['new_policy'] = json_decode($this->Policy_model->get_new_policy(),true);
		
		$this->load->view('admin/New_policy',$data);
		$this->load->view('admin/Footer');
	}
	
	
	public function Assign_new()
	{
		
		$data['header_title'] = "Assign";
		$userid = $this->uri->segment(4);
		//$data['policy'] = json_decode($this->Policy_model->get_policy($userid),true);
		$data['policy'] = json_decode($this->Policy_model->get_new_policy(),true);
		
		$this->load->view('admin/New_policy_form',$data);
		$this->load->view('admin/Footer');
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
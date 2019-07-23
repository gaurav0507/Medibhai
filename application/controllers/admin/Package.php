<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {
	
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
			$this->load->model('Package_model');
		    $data['Menu'] = $this->Privileges_model->Menu();
			
			$this->load->view('admin/Header');
		    $this->load->view('admin/sidebar',$data);
	   }
	
	
	
	public function index()
	{
		
		$this->load->view('admin/Add_Package');
		$this->load->view('admin/Footer');
	}
	
	public function create()
	{
		//print_r($this->input->post());
		//exit();
		
		
		if($this->input->post('save'))
        {
			$this->form_validation->set_rules('Registration_cost','Please Enter Registration Amount', 'trim|required');
            $this->form_validation->set_rules('dropdown_package', 'Select Package', 'trim|required');
			$this->form_validation->set_rules('payment', 'Payment', 'trim|required');
			$this->form_validation->set_rules('gst', 'GST Tax', 'trim|required');
			$this->form_validation->set_rules('Paid', 'Paid By Customer', 'trim|required');
			$this->form_validation->set_rules('description', 'Description of Package', 'trim|required');
			
                  
            if($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/Add_Package.php');
				$this->load->view('admin/Footer');
			}
		    else
			{
				
				
				$data = array('registration_fees'=>$this->input->post('Registration_cost'),'package_service'=>$this->input->post('dropdown_package'),
				              'net_payment'=>$this->input->post('payment'),'gst'=>$this->input->post('gst'),
							  'total_package_amt_paid'=>$this->input->post('Paid'),'package_info'=>$this->input->post('description'));
							  
							
				            $result = $this->Package_model->save($data);
							if($result)
							 {
								$this->session->set_flashdata('message',array('message'=>'Save Successfully','class'=>'label label-success'));
                                redirect('admin/Package');
							 }
							 else
							 {
								$this->session->set_flashdata('message',array('message'=>'Server error please try again','class'=>'error_strings'));
                                redirect('admin/Package');
							 }
			}
		}
		else
	    {
			redirect('admin/Package');
		}
		
	}
	
	public function view()
	{
		$data['header_title'] = 'Package';
		$data['get_data'] = json_decode($this->Package_model->Get_package(),true);
		$this->load->view('admin/View_package.php',$data);
		$this->load->view('admin/Footer');
	}
	
	
	
	
	
	
	
	
	
	
	public function edit($id = NULL)
	{
		if($id)
		{
			$package_id = $this->uri->segment(4);
			$data["eid"] = $package_id;
			$data['get_results'] = json_decode($this->Package_model->edit($package_id),true);
			if(empty($data['get_results']))
			{
				$this->session->set_flashdata('message', array('message' => 'Server error try again','class'=>'alert alert-danger fade in'));
				redirect('admin/Package/view');
			}
			else
			{
				$this->load->view('admin/Add_Package',$data);
				$this->load->view('admin/Footer');
			}
		}
		else
		{
			redirect('admin/Package/view');
		}
	}
	
	
	
	
	public function update()
	{
		if($this->input->post('save'))
        {
			$eid = $this->input->post('eid');
			
			$this->form_validation->set_rules('Registration_cost','Please Enter Registration Amount', 'trim|required');
            $this->form_validation->set_rules('dropdown_package', 'Select Package', 'trim|required');
			$this->form_validation->set_rules('payment', 'Payment', 'trim|required');
			$this->form_validation->set_rules('gst', 'GST Tax', 'trim|required');
			$this->form_validation->set_rules('Paid', 'Paid By Customer', 'trim|required');
			$this->form_validation->set_rules('description', 'Description of Package', 'trim|required');
			
                  
            if($this->form_validation->run() == FALSE)
			{
				$this->edit($eid);
			}
		    else
			{
				
				$where = array('id'=>$eid);
				$data = array('registration_fees'=>$this->input->post('Registration_cost'),
				              'package_service'=>$this->input->post('dropdown_package'),
				              'net_payment'=>$this->input->post('payment'),
							  'gst'=>$this->input->post('gst'),
							  'total_package_amt_paid'=>$this->input->post('Paid'),
							  'package_info'=>$this->input->post('description'));
							  
							
				            $result = $this->Package_model->save($data,$where);
							if($result)
							 {
								$this->session->set_flashdata('message',array('message'=>'updated Successfully','class'=>'label label-success'));
                                redirect('admin/Package/edit/'.$eid);
							 }
							 else
							 {
								$this->session->set_flashdata('message',array('message'=>'Server error please try again','class'=>'error_strings'));
                                redirect('admin/Package/edit/'.$eid);
							 }
			}
			
			
			
			
			
			
			
		}
		else
		{
			redirect('admin/Package/view');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function status()
	{
		
		$id = $this->uri->segment(4);
		if(isset($id))
		{
			$response = $this->Package_model->status($id);
			if($response)
			{
				$this->session->set_flashdata('message', array('message' =>'Status updated Successfully','class' =>'alert alert-success fade in'));
				redirect('admin/Package/view');
			}
			else
			{
				$this->session->set_flashdata('message', array('message' =>'Server error try again','class' =>'alert alert-danger fade in'));
				redirect('admin/Package/view');
			}
		}
		else
		{
			redirect('admin/Package/view');
		}
		
		
	}
	
	
	
	
}
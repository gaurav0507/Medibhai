<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller {
	
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
	
	
	
	public function view()
	{
		$data['header_title'] = 'Delivery Agents';
		$data['get_data'] = json_decode($this->Delivery_model->Get_Agents(),true);
		$this->load->view('admin/Delivery_view.php',$data);
		$this->load->view('admin/Footer');
	}
	
	
	
	
	public function index()
	{
		$data['title'] = "Delivery-Boy-Form";
		$this->load->view('admin/Delivery_form.php',$data);
		$this->load->view('admin/Footer');
	}
	
	
	
	
	
	
	
	
	
	public function Add()
	{
	    
		if($this->input->post('save'))
        {
			$this->form_validation->set_rules('name','Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[ci_delivery_boy.email]');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|is_unique[ci_delivery_boy.contact_number]|min_length[10]|max_length[12]');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('pincode', 'pincode', 'trim|required|regex_match[/^[0-9]{6}$/]');
			
                  
            if($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/Delivery_form.php');
				$this->load->view('admin/Footer');
			}
		    else
			{
				
				$data = array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'),'contact_number'=>$this->input->post('mobile'),
							  'alternate_number'=>$this->input->post('alt_mobile'),'address'=>$this->input->post('address'),
							  'pincode'=>$this->input->post('pincode'));
							 
							 
							 $results = $this->Delivery_model->save($data);
							 if($results)
							 {
								$this->session->set_flashdata('message',array('message'=>'Save Successfully','class'=>'label label-success'));
                                redirect('admin/Delivery/view');
							 }
							 else
							 {
								$this->session->set_flashdata('message',array('message'=>'Server error please try again','class'=>'error_strings'));
                                redirect('admin/Delivery/view');
							 }
							 
							
							 
			}
		}
	    else
		{
			
		}
	}
	
	
	
	public function edit($eid = NULL)
	{
		$eid = $this->uri->segment(4);
		if(isset($eid))
		{
			$data['eid'] = $this->uri->segment(4);
			$data['get_results'] = json_decode($this->Delivery_model->edit($eid),true);
			
			if(empty($data['get_results']))
			{
				$this->session->set_flashdata('message', array('message' =>'Server error try again','class'=>'alert alert-danger fade in'));
				redirect('admin/Delivery/view');
			}
			else
			{
				$this->load->view('admin/Delivery_form',$data);
				$this->load->view('admin/Footer');
				
				
			}
		}
		else
		{
			redirect('admin/Delivery/view');
		}
		
	}
	
	
	public function update()
	{
		if($this->input->post('update'))
		{
			
			$eid = $this->input->post('eid');
			
			$this->form_validation->set_rules('name','Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]|max_length[12]');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('pincode', 'pincode', 'trim|required|regex_match[/^[0-9]{6}$/]');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->edit($eid);
			}
		    else
			{
				$where = array('id'=>$eid);
				$fields = array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'),'contact_number'=>$this->input->post('mobile'),
							  'alternate_number'=>$this->input->post('alt_mobile'),'address'=>$this->input->post('address'),
							  'pincode'=>$this->input->post('pincode'));
							   
				$results = $this->Delivery_model->save($fields,$where);
				
                if($results)
				{
					$this->session->set_flashdata('message', array('message' =>'Updated Successfully','class' =>'alert alert-success fade in'));
					redirect('admin/Delivery/edit/'.$eid);
				}
                else
                {
					$this->session->set_flashdata('message', array('message' =>'Server error try again','class' =>'alert alert-danger fade in'));
					redirect('admin/Delivery/edit/'.$eid);
				}				
			}
		}
		else
		{
			redirect('admin/Delivery/view');
		}
	}
	
	
	
	public function status()
	{
		
		$id = $this->uri->segment(4);
		if(isset($id))
		{
			$response = $this->Delivery_model->status($id);
			if($response)
			{
				$this->session->set_flashdata('message', array('message' =>'Status updated Successfully','class' =>'alert alert-success fade in'));
				redirect('admin/Delivery/view');
			}
			else
			{
				$this->session->set_flashdata('message', array('message' =>'status not updated','class' =>'alert alert-danger fade in'));
				redirect('admin/Delivery/view');
			}
		}
		else
		{
			$this->session->set_flashdata('message', array('message' =>'something went wrong!','class' =>'alert alert-danger fade in'));
			redirect('admin/Delivery/view');
		}
		
	}
	
	
	
	
	public function Mapping_Delivery()
	{
		
		
		$data['delivery_boy'] = json_decode($this->Delivery_model->delivery_boy(),true);
		$data['pincode_list'] = json_decode($this->Delivery_model->pincode(),true);
		
		//print_r($data['pincode']);
		//echo $this->db->last_query();
		//exit();
		
		$data['title'] = "Delivery-Mapping-Form";
		$this->load->view('admin/Mapping_Delivery.php',$data);
		$this->load->view('admin/Footer');
	}
	
	
	public function view_mapping()
	{
		
		$data['mapped_data'] = json_decode($this->Delivery_model->mapped_data(),true);
		
		//print_r($data);
		$data['title'] = "Delivery-Mapping-Form";
		$this->load->view('admin/Mapping.php',$data);
		$this->load->view('admin/Footer');
	}
	
	
	public function add_mapping()
	{
		$data['pincode'] = json_decode($this->Delivery_model->pincode(),true);
		$data['delivery_boy'] = json_decode($this->Delivery_model->delivery_boy(),true);
		
		if($this->input->post('save'))
        {
			/*$pincode = $this->input->post('pincode');
		    $db_array = $this->input->post('Delivery_boy');
			
			$this->form_validation->set_rules('pincode', 'Pincode', 'required');
			$this->form_validation->set_rules('Delivery_boy', 'Delivery boy', 'callback_select_validate');
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/Mapping_delivery',$data);
			}
			else
			{
				$results = $this->Delivery_model->mapping($pincode,$db_array);
				if($results == 1)
				{
					$this->session->set_flashdata('message',array('message'=>'Delivery Boy Mapped Successfully','class'=>'label label-success'));
                    redirect('admin/Delivery/Mapping_Delivery');
				}
				else
				{
					$this->session->set_flashdata('message',array('message'=>'Server error please try again','class'=>'error_strings'));
                    redirect('admin/Delivery/Mapping_Delivery');
				}
			}*/
			
			
			
		    $Dboy = $this->input->post('Delivery_boy');
			$db_array = $this->input->post('pincode');
			
			
			$this->form_validation->set_rules('Delivery_boy', 'Delivery boy', 'required');
			$this->form_validation->set_rules('pincode', 'Pincode', 'callback_select_validate');
			
			
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/Mapping_delivery',$data);
			}
			else
			{
				$results = $this->Delivery_model->mapping($Dboy,$db_array);
				if($results == 1)
				{
					$this->session->set_flashdata('message',array('message'=>'Delivery Boy Mapped Successfully','class'=>'label label-success'));
                    redirect('admin/Delivery/Mapping_Delivery');
				}
				else
				{
					$this->session->set_flashdata('message',array('message'=>'Server error please try again','class'=>'error_strings'));
                    redirect('admin/Delivery/Mapping_Delivery');
				}
			}
			
		}
		else
		{
			
		}
		
	}
	
	
	public function update_mapping()
	{
		
		
		
	}
	
	
    function select_validate()
	{
		$choice = $this->input->post("pincode");
		if(is_null($choice))
		{
			$choice = array();
		}
		$pincode = implode(',', $choice);
        if($pincode != '') 
		{
			return true;
		} 
		else 
		{
			$this->form_validation->set_message('select_validate', 'You need to select a least one Pincode');
			return false;
		}
	}	
	
}


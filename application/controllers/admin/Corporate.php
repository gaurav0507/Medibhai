<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Corporate extends CI_Controller {
	
	   protected $data;
	   const BULK_UPLOAD_SHEET_COLS = 5;
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
			$this->load->model(array('Corporate_model','User_model'));
		    $data['Menu'] = $this->Privileges_model->Menu();
			
			$this->load->view('admin/Header');
		    $this->load->view('admin/sidebar',$data);
		   
	   }
	
	
	
	public function index()
	{
		$data['title'] = "Corporate";
		
		$data['corporate'] = json_decode($this->Corporate_model->get_corporates(),true);
		
	    $this->load->view('admin/Corporate.php',$data);
		$this->load->view('admin/Footer');
		
	}
	
	public function Add()
	{
	    
		if($this->input->post('save'))
        {
			$this->form_validation->set_rules('Corporate_name','Corporate_name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required');
			$this->form_validation->set_rules('Hr_name', 'Hr.Name', 'trim|required');
			$this->form_validation->set_rules('branch', 'Branch', 'trim|required');
			
                  
            if($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/Corporate_form.php');
				$this->load->view('admin/Footer');
			}
		    else
			{
				
				$data = array('corporate_name'=>$this->input->post('Corporate_name'),'mobile'=>$this->input->post('mobile'),
							  'email'=>$this->input->post('email'),'landline'=>$this->input->post('landline'),
							  'corporate_address'=>$this->input->post('address'),'branch'=>$this->input->post('branch'),
							  'Hr_name'=>$this->input->post('Hr_name'));
							 
							 $result = $this->Corporate_model->create($data);
							 if($result)
							 {
								$this->session->set_flashdata('message',array('message'=>'Save Successfully','class'=>'label label-success'));
                                redirect('admin/Corporate');
							 }
							 else
							 {
								$this->session->set_flashdata('message',array('message'=>'Server error please try again','class'=>'error_strings'));
                                redirect('admin/Corporate');
							 }
							 
							
							 
			}
		}
	    else
		{
			$this->load->view('admin/Corporate_form.php');
			$this->load->view('admin/Footer');
		}
	}
	
	
	
	public function edit($id = NULL)
	{
		if($id)
		{
			$corporate_id = $this->uri->segment(4);
			$data["eid"] = $corporate_id;
			$data['get_results'] = json_decode($this->Corporate_model->edit($corporate_id),true);
			if(empty($data['get_results']))
			{
				$this->session->set_flashdata('message', array('message' => 'Server error try again','class' => 'alert alert-danger fade in'));
				redirect('admin/Corporate');
			}
			else
			{
				$this->load->view('admin/Corporate_form',$data);
				$this->load->view('admin/Footer');
				
				
			}
		}
		else
		{
			redirect('admin/Corporate');
		}
		 
	}
	
	
	
	public function update()
	{
		if($this->input->post('update'))
        {
			
			$eid = $this->input->post('eid');
			
			$this->form_validation->set_rules('Corporate_name','Corporate_name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');
			$this->form_validation->set_rules('landline', 'Landline', 'trim|required');
			$this->form_validation->set_rules('Hr_name', 'Hr.Name', 'trim|required');
			$this->form_validation->set_rules('branch', 'Branch', 'trim|required');
		
			if($this->form_validation->run() == FALSE)
			{
				$this->edit($eid);
				
			}
		    else
			{
				
				
				$where = array('id'=>$eid);
				$fields = array('corporate_name' => $this->input->post('Corporate_name'),
                                'corporate_address' => $this->input->post('address'),
								'email' => $this->input->post('email'),
								'mobile' => $this->input->post('mobile'),
								'landline' => $this->input->post('landline'),
								'branch'=>$this->input->post('branch'),
							    'Hr_name'=>$this->input->post('Hr_name'));
							   
				$results = $this->Corporate_model->save($fields,$where);
				
                if($results)
				{
					$this->session->set_flashdata('message', array('message' =>'Updated Successfully','class' =>'alert alert-success fade in'));
					redirect('admin/corporate/edit/'.$eid);
				}
                else
                {
					$this->session->set_flashdata('message', array('message' =>'Server error try again','class' =>'alert alert-danger fade in'));
					redirect('admin/corporate/edit/'.$eid);
				}				
							   
			}
			
		}
		else
		{	
			
		}
		
	}
	
	public function status()
	{
		$id = $this->uri->segment(4);
		if(isset($id))
		{
			$response = $this->Corporate_model->status($id);
			if($response)
			{
				$this->session->set_flashdata('message',array('message'=>'Status updated Successfully','class'=>'alert alert-success fade in'));
				redirect('admin/corporate');
			}
			else
			{
				$this->session->set_flashdata('message', array('message'=>'Server error try again','class'=>'alert alert-danger fade in'));
				redirect('admin/corporate');
			}
		}
		else
		{
			
		}
	}
	
	
	
	public function remove()
	{
		
	}
	
	public function users()
	{
		$data['header_title'] = 'Create CC User';
		$data['cc_corporate'] = json_decode($this->Corporate_model->get_corporates(),true);
		
		
		if($this->input->post('save'))
        {
			
			
		   $file_name = str_replace(' ', '_', $_FILES['cc_bulk_sheet']['name']);
           $new_file_name = time()."_".$file_name;
           $_FILES['cc_bulk_sheet']['name'] = $new_file_name;
           
		   $upload_path  = './uploads/bulk_uploads/';
		   
		   
           $config['upload_path'] = './uploads/bulk_uploads/';
           $config['file_ext_tolower'] = TRUE;
           $config['max_size'] = BULK_UPLOAD_MAX_SIZE_MB*2000;
           $config['allowed_types'] = '*';
           $config['remove_spaces'] = TRUE;
           $config['overwrite'] = FALSE;
		   $config['file_name'] = $new_file_name;

           $this->load->library('upload', $config);

           $this->upload->initialize($config);
		   
		   

				if(!$this->upload->do_upload('cc_bulk_sheet'))
				{
				  $data['fail'][] = $this->upload->display_errors();

					//print_r($data['error']);
				}
				else
				{
					$this->load->library('Excel_reader',array('file_name'=>$upload_path.$new_file_name));
                    $excel_handler = $this->excel_reader->file_handler;
                    $excel_data =  $excel_handler->rows();
					
					if(!empty($excel_data))
					{
					   unset($excel_data[0]);
                       //unset($excel_data[1]);

					  $excel_data = array_map("unserialize", array_unique(array_map("serialize", $excel_data)));

					  $corporate_id = $this->input->post('corporate_id');

						  if(!empty($excel_data))
						  {
								foreach ($excel_data as $key => $value)
								{

								  if(count($value) < SELF::BULK_UPLOAD_SHEET_COLS)
								  {
									continue;
								  }

								  //$activation_key  = random_string('numeric',10);

								  $user = array('corporate_id'=> $corporate_id,
												'first_name'=> htmlentities(trim($value[0])),
												'last_name'=> htmlentities(trim($value[1])),
												'email'=> htmlentities(trim($value[2])),
												'mobile'=> htmlentities(trim($value[3])),
												'user_status'=> 1);

								  
									$is_mobile_exists = $this->User_model->is_mobile_exists($value[3]);
									$is_email_exists =$this->User_model->is_email_exists($value[2]);
									
									
									if($is_mobile_exists == 0  && $is_email_exists == 0)
									{
										 $results = $this->User_model->save($user);
										 
										 $data['success'][] = "The ".$user['email']." and ".$user['mobile']." Created Successfully";
									}
									else
									{
										$data['fail'][] = "The ".$user['email']." and ".$user['mobile']." exists";
									}
								
								  

								  
								}
								 
						  }
						  else
						  {
							$data['fail'][] = "Excel sheet is blank";
						  }
					}
					else
					{
						$data['fail'][] = "Excel sheet is blank";
					}

				   $this->session->set_flashdata('data',$data);	
				   $this->load->view('admin/add_cc_user',$data);
				}
			
        }
		else
		{
			$this->load->view('admin/add_cc_user',$data);
			$this->load->view('admin/Footer');
		}
		
		
		
		
		
	}
	
	public function view_user()
	{
		$data['title'] = "users";
		$data['results'] = json_decode($this->User_model->select(),true);
		
		$this->load->view('admin/Users.php',$data);
		$this->load->view('admin/Footer');
		
		
	}
	
	public function users_status()
	{
		$id = $this->uri->segment(4);
		
		if(isset($id))
		{
			$response = $this->User_model->status($id);
			if($response)
			{
				$this->session->set_flashdata('message', array('message' =>'Status updated Successfully','class' =>'alert alert-success fade in'));
				redirect('admin/corporate/view_user');
			}
			else
			{
				$this->session->set_flashdata('message', array('message' =>'Server error try again','class' =>'alert alert-danger fade in'));
				redirect('admin/corporate/view_user');
			}
		}
	}
	
	
	
	
	
	
	
}


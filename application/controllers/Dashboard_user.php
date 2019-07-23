<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_user extends CI_Controller {
	
	
	protected $data;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_get('Asia/kolkata');
        $this->load->library('session');
        $this->load->helper('url');
		$this->load->helper('utility_helper');
        
       
            if(!$this->session->userdata('sess_logged_in'))
			{
			    redirect('Home/userlogout','refresh');
			}
      
        $this->load->model(array('Policy_model','User_model'));
        
    }
	
	
	
	
	public function index()
	{
		//echo "welcome user";
		$this->load->view('user_dashboard');
	}
	
	
	public function user_upload()
	{
		
		
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			
			
			if(is_array($_FILES) AND !empty($_FILES['policy_files']['name']))
			{
			  
			  $user_id = $this->session->userdata['id'];
			  
			  $files_count = count($_FILES['policy_files']['name']);
			  $uploaded_files_array = array();
			  $uploaded_files_error_array = array();
			  $file_upload_path = './uploads/policy_copy/'.$user_id.'/';
				
			  if(!folder_exist($file_upload_path))
			  {
				 mkdir($file_upload_path,0777);
			  }

				for($i = 0; $i < $files_count; $i++)
				{
				  
					  $old_file_name = $_FILES['policy_files']['name'][$i];
					  $file_info  = pathinfo($old_file_name);
					  $new_file_name = preg_replace('/[\s,]+/', '_', $file_info['filename']);
					  $new_file_name = $new_file_name.'_'.DATE(UPLOAD_FILE_DATE_FORMAT);

					  $file_extension = $file_info['extension'];

					  $new_file_name = $new_file_name.'.'.$file_extension;

					  $_FILES['policy_file']['name'] = $new_file_name;
					  $_FILES['policy_file']['tmp_name'] = $_FILES['policy_files']['tmp_name'][$i];
					  $_FILES['policy_file']['error'] = $_FILES['policy_files']['error'][$i];
					  $_FILES['policy_file']['size'] = $_FILES['policy_files']['size'][$i];
					  $config['upload_path'] = $file_upload_path;
					  $config['allowed_types'] = 'pdf|jpg|jpeg|png|doc|docx';
					  $config['file_ext_tolower'] = TRUE;
					  $config['remove_spaces'] = TRUE;
					  $this->load->library('upload',$config);
					  $this->upload->initialize($config);

					  if($this->upload->do_upload('policy_file'))
					  {
						  $file_uploaded_data = $this->upload->data();
						  array_push($uploaded_files_array,array('real_file_name'=>$old_file_name,'new_file_name'=>$file_uploaded_data['file_name']));
					  }
					  else
					  {
						 $uploaded_files_error_array[$old_file_name] = $this->upload->display_errors('','');
					  }
				}

				if(!empty($uploaded_files_error_array))
				{
					$this->session->set_flashdata('error',"Error in the File");
					redirect('Dashboard_user/user_upload');
				}

				if(!empty($uploaded_files_array))
				{
					$this->load->model(array('Policy_model','User_model'));
					
					$insert_files_array = array();

					foreach ($uploaded_files_array as $file)
					{
						array_push($insert_files_array,array('real_file_name'=>$file['real_file_name'],'file_name'=>$file['new_file_name'],'user_id'=>$user_id,'status'=>1));
					}

					  $last_insert_ids  = $this->Policy_model->multiple_insert($insert_files_array,TRUE);
					  $insert_array = array();

					foreach ($last_insert_ids as $last_insert_id)
					{
						array_push($insert_array,array('policy_upload_id'=>$last_insert_id,'status'=>1));
					}

				    $this->User_model->insert_status($insert_array);

				  
				    $this->session->set_flashdata('success',"Files have been uploaded successfully");
				    redirect('Dashboard_user/user_upload');
				}
				else
				{
					
					$this->session->set_flashdata('error',"Error while saving,please try again!");
					redirect('Dashboard_user/user_upload');
				}


			}
			else
			{
			   
			   $this->session->set_flashdata('error',"Nothing to upload,please try again!");
			   redirect('Dashboard_user/user_upload');
			}
			
		}
		else{
			
			$this->load->view('user_upload');
		}
		
		
		
		
	}
	
	
	public function claim_request()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			  $id = $this->input->post('id');
			  
			  //$results = $this->User_model->Claim_Request_check($id);
			  $results = $this->User_model->Claim_Generate_Request($id);
			  if($results)
			  {
				  $this->session->set_flashdata('success',"Claim Generated successfully. We will call you shortly");
				  redirect('Dashboard_user');
				  
			  }else{
				  $this->session->set_flashdata('error',"Claim could not be Generated!");
				  redirect('Dashboard_user');
			  }
			  
			  
		}
	}
	
	public function policy_info()
	{
		
	}
	
	
	
	
	
	
}
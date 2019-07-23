<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	  protected $data;
	  public function __construct()
	  {
					parent::__construct();
					date_default_timezone_get('Asia/kolkata');
					$this->load->library('session');
					$this->load->helper('url');
					
					$this->load->library('form_validation');
					$this->load->model('User_model');
					
      }
	
	
	
	public function index()
	{
		
        if($this->input->post())
		{
			
			$code = $this->input->post('code');
			
			$this->form_validation->set_rules('First_Name','Firstname', 'trim|required');
			$this->form_validation->set_rules('Last_Name','Lastname', 'trim|required');
			$this->form_validation->set_rules('email_id','Email', 'trim|required|valid_email|is_unique[ci_users.email]');
			$this->form_validation->set_rules('Mobile_Number','Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]|is_unique[ci_users.mobile]');
			$this->form_validation->set_rules('Gender','Package', 'trim|required');
			$this->form_validation->set_rules('password','Password', 'trim|required');
			
           

			if($this->form_validation->run() == FALSE)
			{
				
				redirect('Home');
				
			}
			else
			{  
				    $date = date('Y-m-d H:i:s');
					$data = array('corporate_id'=>$this->input->post('code'),'first_name'=>$this->input->post('First_Name'),
					              'last_name'=>$this->input->post('Last_Name'),'email' => $this->input->post('email_id'),'mobile'=>$this->input->post('Mobile_Number'),'gender'=>$this->input->post('Gender'),'password'=>$this->input->post('password'),'updated_at'=>$date);
							  
							  //print_r($data);
							  
					 $result = $this->User_model->save_user($data);
                     if(isset($result))
                     {
						 echo "<center><span><strong>Register successfully.</strong></br></br>Need any help or assistance call <a href='tel:9967965001' style='text-decoration:none;color:#000;'>9967965001.</a></span></center>";
					 }
                     else
					 {
						 echo "<center><span><strong>Something Went wrong Please Try again later.</strong></br></br>Need any help or assistance call <a href='tel:9967965001' style='text-decoration:none;color:#000;'>9967965001.</a></span></center>";
					 }					 

			}




		}
		else
		{
             redirect('Home');
			
		}

    
	}

    
	public function Signup()
	{
		
		    $this->form_validation->set_rules('First_Name','Firstname', 'trim|required');
			$this->form_validation->set_rules('Last_Name','Lastname', 'trim|required');
			$this->form_validation->set_rules('email_id','Email', 'trim|required|valid_email|is_unique[ci_users.email]');
			$this->form_validation->set_rules('Mobile_Number','Mobile', 'trim|required|regex_match[/^[0-9]{10}$/]|is_unique[ci_users.mobile]');
			$this->form_validation->set_rules('password','Password', 'trim|required');
			
			if($this->form_validation->run() == FALSE)
			{
				redirect('Home/user');
			}
			else
			{
				$date = date('Y-m-d H:i:s');
				$data = array('first_name'=>$this->input->post('First_Name'),'last_name'=>$this->input->post('Last_Name'),
				              'email' =>$this->input->post('email_id'),'mobile'=>$this->input->post('Mobile_Number'),
							  'password'=>$this->input->post('password'),'updated_at'=>$date);
							  
				print_r($data);

                exit();				
							  
			} 
			
			
		
	}
	
	
	
	public function policy()
	{
		$this->load->view('upload_policy');
	}
	
	
	
	public function upload_policy()
	{
		
		
		
		if(is_array($_FILES) AND !empty($_FILES['policy_files']['name']))
        {
          
		  $user_id = 1;
		  
		  $files_count = count($_FILES['policy_files']['name']);
          $uploaded_files_array = array();
          $uploaded_files_error_array = array();
          //$file_upload_path = USER_POLICY_UPLOADS_FOLDER_PATH.$user_id.'/';
		  
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
				  /*$json_array['status'] = FALSE;
				  $json_array['message'] = 'Could not upload';
				  $this->echo_json($json_array);
				  */
				  print_r($uploaded_files_error_array);
            }

            if(!empty($uploaded_files_array))
            {
                 $this->load->model(array('Policy_model'));
                 $insert_files_array = array();

				  foreach ($uploaded_files_array as $file)
				  {
					 array_push($insert_files_array,array('real_file_name'=>$file['real_file_name'],'file_name'=>$file['new_file_name'],'user_id'=>$user_id));
				  }

              $last_insert_ids  = $this->Policy_model->multiple_insert($insert_files_array,TRUE);

              $insert_array = array();

              foreach ($last_insert_ids as $last_insert_id)
              {
                array_push($insert_array,array('user_upload_details_id'=>$last_insert_id,'status'=>POLICY_NEW_UPLOADED));
              }

              $this->Policy_model->multiple_insert($insert_array);

              
                $json_array['status'] = TRUE;
                $json_array['message'] = 'Files have been uploaded successfully';
            }
            else
            {
                $json_array['status'] = FALSE;
                $json_array['message'] = 'Error while saving,please try again!';
            }


        }
        else
        {
           $json_array['status'] = FALSE;
           $json_array['msg'] = 'Nothing to upload,please try again!';
        }
	}
	
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    protected $data;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_get('Asia/kolkata');
        $this->load->library('session');
        $this->load->helper('url');
		$this->load->helper('utility_helper');
        
       
            if(!$this->session->userdata('user_info'))
			{
			   redirect('Home/logout','refresh');
			}
      
        $this->load->Model(array('Package_model','Agents_model'));
        
    }


    public function index()
    {
        $data['header_title'] = "Dashboard";
        $user_id = $this->session->userdata['user_info']['id'];
		$data['user_package'] = $this->Package_model->get_package_user($user_id);
		 
		$this->load->view('Header');
		$this->load->view('Dashboard',$data);
		$this->load->view('Footer');
    }
    
	
	public function upload()
	{
		
		
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
		   $user_id = $this->session->userdata['user_info']['id'];
		   $user_package = $this->Package_model->get_package_user($user_id);
		   
		    if(is_array($_FILES) AND !empty($_FILES['policy_files']['name']))
            {
				$files_count = count($_FILES['policy_files']['name']);
				$uploaded_files_array = array();
                $uploaded_files_error_array = array();
				$file_upload_path = './uploads/'.$user_id.'/';
				
				     //if(!mkdir($file_upload_path))
				     if(!folder_exist($file_upload_path))
                     {
                        mkdir($file_upload_path,0777);
                     }
				
				    for($i = 0; $i < $files_count; $i++)
                    {
					     $old_file_name = $_FILES['policy_files']['name'][$i];
                         $file_info  = pathinfo($old_file_name);
                         $new_file_name = preg_replace('/[[:space:]]+/', '_', $file_info['filename']);
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
                             array_push($uploaded_files_array,array('user_id'=>$user_id,'real_file_name'=>$old_file_name,'new_file_name'=>$file_uploaded_data['file_name']));
                             
                         }
                         else
                         {
                            $uploaded_files_error_array[$old_file_name] = $this->upload->display_errors('','');
                         }
					}
					
					   if(!empty($uploaded_files_error_array))
                       {
                           print_r($uploaded_files_error_array);
                       }
					   
					   
					if(!empty($uploaded_files_array))
                    {
						$insert_files_array = array();
						
					foreach ($uploaded_files_array as $file)
                    {
                       array_push($insert_files_array,array('real_file_name'=>$file['real_file_name'],'file_name'=>$file['new_file_name'],'user_id'=>$user_id,'status'=>11));
                    }
                        
						$insert_id = $this->Agents_model->multiple_insert($insert_files_array,TRUE);
						if($insert_id)
						{
						    
							$remain_unit = $user_package['total_unit'] - $files_count;
							$used_unit = $user_package['used_unit'] + $files_count;
							
							$response = $this->Package_model->update_package($user_id,$remain_unit,$used_unit);
							if($response ==1)
							{
							 $this->session->set_flashdata('message',array('message'=>'Files have been uploaded successfully','class'=>'alert alert-success fade in'));
							 redirect('Dashboard/upload');
							}
							else
							{
								$this->session->set_flashdata('message', array('message' => 'Files have been uploaded successfully','class' => 'alert alert-danger fade in'));
							    redirect('Dashboard/upload');
							}
						}
						else
						{
							 $this->session->set_flashdata('message', array('message' => 'Files have been uploaded successfully','class' => 'alert alert-danger fade in'));
							    redirect('Dashboard/upload'); 
						}
						  
					}
				
				
			}
			else
			{
				
			}
		   
		   
		   
		   
		   
		}
		else
		{
			$this->load->view('Header');
			$this->load->view('upload_form');
			$this->load->view('Footer');
		}
		
	}
    
	
	
	
	
	
	public function track()
	{
	   $user_id = $this->session->userdata['user_info']['id'];
	   
	   $data['uploaded_details'] = json_decode($this->Agents_model->get_uploaded_policy_status($user_id),true);
	   
	   $this->load->view('tracking',$data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  


}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Agents_model extends CI_Model {
       
	   
	   function __construct()
       {
           parent::__construct();
		   
		   $this->tableName = 'ci_agents_upload';
       }

       

      public function save($data)
	  {
         $this->db->insert('ci_agent_registration',$data);
         $insert_id = $this->db->insert_id();
         return  $insert_id;
      }
	   
	   
	   public function view()
	   {
		   
	   }
	   
	   
       public function registration_insert($data) 
       {
            $condition = "mobile =" . "'" . $data['mobile'] . "'";
            $this->db->select('*');
            $this->db->from('ci_agent_registration');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            if($query->num_rows() == 0) 
            {
                $this->db->insert('ci_agent_registration', $data);
                if ($this->db->affected_rows() > 0) 
                {
                  $insert_id = $this->db->insert_id();
                  return  $insert_id;
                }
            }
            else
            {
               return false;
            }
        }
	   
       public function package_info($id)
       {
          $result = $this->db->query("select * from ci_package_info where id = $id");
	      return $result->row_array();
       }



       public function login($data)
       {
            $condition = "agent_email =" . "'" . $data['username'] . "'". " and " ."password =" . "'" . $data['password'] . "'" ;

            $this->db->select('*');
            $this->db->from('ci_agent_registration');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            $result_array = $query->row_array();
            if($query->num_rows() == 1) 
            {
               //return $query->result();
               return $result_array;
            }
            else
            {
               return false;
            }
            
       }
	   
	   
	   public function get_user_info($user_id)
	   {
		   $condition = "id =" . "'" . $user_id . "'";
		   
		    $this->db->select('*');
            $this->db->from('ci_agent_registration');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
            $result_array = $query->row_array();
            if($query->num_rows() == 1) 
            {
               return $result_array;
            }
            else
            {
               return false;
            }
	   }
	    
	   
	   public function Insert_payment($data)
	   {
			 $this->db->insert('ci_payments',$data);
			 $insert_id = $this->db->insert_id();
			 if($this->db->affected_rows() >= 0) 
			 {
			 
			     if(isset($insert_id))
				 {
					 $status = 1;
					 $my_array = array('payment_status'=>$status);
					 $this->db->where("id",$data['user_id']);
					 $this->db->update('ci_agent_registration',$my_array);
					 
					 if($this->db->affected_rows() > 0)
					 {
						 $pack = $data['package_id'];
						 if($pack == 1) { $unit = 50; } else if($pack == 2) { $unit = 100;} else if($pack == 3) { $unit = 150;}
						 $userid = $data['user_id'];
						 $start_unit = 0;
						 
						 
						 $myarray = array('user_id'=>$userid,'total_unit'=>$unit,'used_unit'=>$start_unit,'remain_unit'=>$unit);
						 $this->db->insert('ci_package_purchased',$myarray);
						 $get_last_id = $this->db->insert_id();
						 
						 return  True;
					 }
					 else
					 {
						return FALSE;
					 }
					 
				 }
				 
				 
			 }
			 else
			 {
				 return FALSE;
			 }
		 
		 
      }
	  
	  
	  
	public function multiple_insert($data_arr,$return_insert_ids = FALSE)
	{
		if($return_insert_ids)
		{
			$this->db->insert_batch($this->tableName, $data_arr);
			$first_id = $this->db->insert_id();

			$affected_rows = $this->db->affected_rows();

			if($affected_rows > 0)
			{
				return range($first_id,($first_id+$affected_rows-1));
			}
			else
			{
				return array();
			}
		}
		else
		{
			return $this->db->insert_batch($this->tableName, $data_arr);
		}
	}
	  
	public function Get_Agents()
	{
	  	$this->db->select('*');
		$this->db->from('ci_agent_registration');
		$this->db->order_by("created_on","DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0) 
		{
		    foreach ($query->result() as $row) 
			{
			  $data[] = $row;
			}
		  return json_encode($data);
		}
		   return false;
	}



    public function get_policy_copy($user_id)
	{
		$this->db->select('*');
		$this->db->from('ci_agents_upload');
		$this->db->where('user_id',$user_id);
		$this->db->order_by("created_at","DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0) 
		{
		    foreach ($query->result() as $row) 
			{
			  $data[] = $row;
			}
		    return json_encode($data);
		}
		   return false;
		
	}	
	
	public function get_documents()
	{
		
	   $query=$this->db->query("SELECT a.id,a.user_id,b.first_name,b.last_name,a.file_name,a.created_at,c.status_type FROM ci_agents_upload a 
                                inner join ci_agent_registration b on a.user_id = b.id 
                                inner join ci_status c on a.status = c.id order by a.created_at desc");
					if($query->num_rows() > 0)
					{
						foreach($query->result_array() as $row)
						{
							$data[]=$row;
						}
						return json_encode($data);
					}
					else
					{
						return FALSE;
					}
	   
	   
	}
	
	
	
	
	public function get_status()
	{
		
		$this->db->select('*');
		$this->db->from('ci_status');
		$this->db->order_by("created","DESC");
		$query = $this->db->get();
		if($query->num_rows() > 0) 
		{
		    foreach ($query->result() as $row) 
			{
			  $data[] = $row;
			}
		   return json_encode($data);
		}
		   return false;
		
	}
	
	
	
	
	public function update_status($eid,$status)
	{
		$array=array('status'=>$status);
	    $this->db->where("id",$eid);
	    $this->db->update("ci_agents_upload",$array);
	    if($this->db->affected_rows() > 0)
	    {
		   return 1;
		}
		else
		{
		   return 2;
		}
	}
	
	
	
	
	
	public function get_uploaded_policy_status($used_id)
	{
		
		$query = $this->db->query("SELECT a.user_id,a.file_name,a.created_at,c.status_type FROM ci_agents_upload a 
                                 inner join ci_agent_registration b on a.user_id = b.id 
                                 inner join ci_status c on a.status = c.id where a.user_id=$used_id order by a.created_at desc");
								 
		            if($query->num_rows() > 0)
					{
						foreach($query->result_array() as $row)
						{
							$data[]=$row;
						}
						return json_encode($data);
					}
					else
					{
					   return FALSE;
					}
	}
	
	
	
	
	public function fetch_data()
	{
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	   
}
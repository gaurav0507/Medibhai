<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
       
	   
	   function __construct()
       {
           parent::__construct();
		    $this->tableName = 'ci_users';
			$this->tableName1 = 'ci_policy_upload_status';
			$this->primaryKey = 'id';
       }
	   
	   
	   
	   
	   
	public function is_mobile_exists($userMobile)
	{
		$this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where('mobile',$userMobile);
        $result =  $this->db->get();
		return (bool) $result->num_rows();
	}
	
	
	public function is_email_exists($email)
	{
		$this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where('email',$email);
        $result =  $this->db->get();
		return (bool) $result->num_rows();
	}
	
	public function save($arrdata,$arrwhere = array())
    {
    	if(!empty($arrwhere))
    	{

    		foreach ($arrwhere as $field => $value)
    		{
    			$this->db->where($field,$value);
    		}
      	        $result = $this->db->update($this->tableName, $arrdata);
				return $result;
    	}
    	else
    	{
    		    $this->db->insert($this->tableName, $arrdata);
				return $this->db->insert_id();
    	}
    }
	
	public function select()
	{
	  	$this->db->select('ci_users.id,ci_users.first_name,ci_users.last_name,ci_users.mobile,ci_users.email,ci_users.password,
                          ci_users.profile_img,ci_users.gender,ci_users.user_status,ci_users.corporate_id,ci_corporate.corporate_name');
		$this->db->from('ci_users');
		$this->db->join('ci_corporate','ci_corporate.id = ci_users.corporate_id','left');
		$this->db->order_by("ci_users.created_at",'desc');
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

    public function status($eid)
	{
		$query=$this->db->query("UPDATE ci_users SET user_status = IF(user_status=1, 0, 1) WHERE id= $eid");
		$query=$this->db->affected_rows();
		if(isset($query) && $query > 0)
		{
		  return 1;
		}
		else
		{
		  return 0; 
		}
	} 








/*--------------------User Registeration-------------------------------*/


    public function check_code($code)
	{
		$query="SELECT CASE WHEN EXISTS(SELECT * FROM ci_agent_registration WHERE activation_code=".$this->db->escape($code).")
                THEN 'TRUE'
                ELSE 'FALSE'
                END 
         AS my_result";

         $result = $this->db->query($query);  
         $resulting_array = $result->row();

         return $resulting_array->my_result;
	}




   public function check_limit($code)
   {
	   /*$query="SELECT CASE WHEN 0 <  (SELECT ci_package_purchased.remain_unit FROM ci_agent_registration 
       inner join ci_package_purchased on ci_package_purchased.user_id = ci_agent_registration.id 
       where ci_agent_registration.activation_code =".$this->db->escape($code).")
       THEN 'TRUE'
       ELSE 'FALSE'
       END 
       AS my_result";
	   
	   $result = $this->db->query($query);  
       $resulting_array = $result->row();

       return $resulting_array->my_result;
	   */
	   
	   $query = $this->db->query("SELECT * FROM ci_agent_registration 
                 inner join ci_package_purchased on ci_package_purchased.user_id = ci_agent_registration.id 
                 where ci_agent_registration.activation_code =".$this->db->escape($code)."");
				 
		if($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
			{
				  $data = $row;
			}
            return $data;
		}			 
	   
   }



    
	
	public function save_user($arrdata,$arrwhere = array())
    {
    	if(!empty($arrwhere))
    	{

    		foreach ($arrwhere as $field => $value)
    		{
    			$this->db->where($field,$value);
    		}
      	        $result = $this->db->update($this->tableName, $arrdata);
				return $result;
    	}
    	else
    	{
    		    $this->db->insert($this->tableName, $arrdata);
				return $this->db->insert_id();
    	}
    }


    
	
	public function Auth_login($username,$password)
	{
		
		$this->db->select('*');
		$this->db->from('ci_users');
		$this->db->where('password',$password);
        $where = "(email = '$username' or mobile ='$username')";
		$this->db->where($where);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) 
		{
		  return true;
		} 
		else {
		  return false;
		}
		
		
	}



    public function Auth_Info($username)
	{
		$query = $this->db->query("SELECT * FROM ci_users where email =".$this->db->escape($username)." OR mobile = ".$this->db->escape($username)." ");
		if($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
			{
				  $data = $row;
			}
            return $data;
		}
	}


	
	/*-----policy upload status--------*/
	
	
	public function insert_status($data_arr,$return_insert_ids = FALSE)
	{
		if($return_insert_ids)
		{
			$this->db->insert_batch($this->tableName1, $data_arr);
			record_db_error($this->db->last_query());
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
			return $this->db->insert_batch($this->tableName1, $data_arr);
		}
	}
	
	
	/*------Generate Request-------*/
	
	Public Function Claim_Generate_Request($id)
	{
		 $myarray=array('user_id'=>$id,'status'=>1);
	     $this->db->insert('claim_request',$myarray);
         $cnt=$this->db->affected_rows();
		 if(isset($cnt) && $cnt > 0)
		 {
			  return 1;
		 }
		 else
		 {
			  return 2; 
		 }	
    }
	
	
	
	
	   
	   
}
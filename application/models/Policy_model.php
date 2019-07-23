<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Policy_model extends CI_Model {
       
	   
	   function __construct()
       {
           parent::__construct();
		    $this->tableName = 'ci_policy_upload_details';
			$this->tableName1 = 'ci_policy_upload_status';
			$this->primaryKey = 'id';
       }
	   
	   
	   
    /*------upload policy copy-----*/	   
	   
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


    /*-------policy copy status------*/

    public function multiple_insert_status($data_arr,$return_insert_ids = FALSE)
	{
		if($return_insert_ids)
		{
			$this->db->insert_batch($this->tableName1, $data_arr);
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



    public function get_new_policy()
	{
		$query=$this->db->query("select * from ci_policy_upload_details 
                                 inner join ci_users on ci_policy_upload_details.user_id = ci_users.id
                                 where ci_policy_upload_details.status =1 GROUP BY user_id order by ci_policy_upload_details.created_on desc");
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



   
    public function get_policy($userid)
	{
		$query=$this->db->query("select * from ci_policy_upload_details 
                                 inner join ci_users on ci_policy_upload_details.user_id = ci_users.id
                                 where ci_policy_upload_details.status =1 and user_id = ".$this->db->escape($userid)." order by ci_policy_upload_details.created_on desc");
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







	
	   
	   
}
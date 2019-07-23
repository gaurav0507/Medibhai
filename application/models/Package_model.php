<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Package_model extends CI_Model {
       
	   
	   function __construct()
       {
           parent::__construct();
		   $this->tableName = 'ci_package_info';
       }
	   
	   
	  
    public function get_package_info($id)
	{
	  	$result = $this->db->query("select * from ci_package_info where id = $id");
	    return $result->row_array();
       
	}	
	   
	   
	public function get_package_user($id)
	{
	  	$result = $this->db->query("select total_unit,used_unit,remain_unit from ci_package_purchased where user_id = $id");
	    return $result->row_array();
       
	}	

    public function save($arrdata,$arrwhere = array())
	{
         /*$this->db->insert('ci_package_info',$data);
         $insert_id = $this->db->insert_id();
         return  $insert_id;
		 */
		 
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


    public function Get_package()
	{
		$this->db->select('*');
		$this->db->from('ci_package_info');
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

    public function status($eid)
	{
		$query=$this->db->query("UPDATE ci_package_info SET status = IF(status=1, 0, 1) WHERE id= $eid");
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



    public function edit($eid)
	{
		$query = $this->db->query("select * from ci_package_info where id='$eid'");
		if ($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
			{
			  $data = $row;
			}

		   return json_encode($data);
		}
	}




    public function update_package($user_id,$remain_unit,$used_unit)
	{
		$query=$this->db->query("UPDATE ci_package_purchased SET used_unit=$used_unit,remain_unit=$remain_unit WHERE user_id= $user_id");
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


   
























 	
	   
	   
}
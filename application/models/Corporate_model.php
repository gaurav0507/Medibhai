<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Corporate_model extends CI_Model {
       
	   
	   function __construct()
       {
           parent::__construct();
		    $this->tableName = 'ci_corporate';
       }
	   
	   
	  
	  
    public function get_corporates()
	{
	  	$this->db->select('*');
		$this->db->from('ci_corporate');
		$this->db->order_by("created_at");
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
	   
	   
	public function create($data)
	{
		$str = $this->db->insert_string($this->tableName, $data);
		
		$query = $this->db->query($str);
		
		if($query){
			return true;
		}else{
			return false;
		}
		
	}
	
	
	public function edit($eid)
	{
		$query = $this->db->query("select * from ci_corporate where id='$eid'");
		if ($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
			{
			  $data = $row;
			}

		   return json_encode($data);
		}
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
	   
	   
	public function status($eid)
	{
		$query=$this->db->query("UPDATE ci_corporate SET status = IF(status=1, 0, 1) WHERE id= $eid");
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
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Delivery_model extends CI_Model {
       
	   
	   function __construct()
       {
           parent::__construct();
		   
		   $this->tableName = 'ci_delivery_boy';
       }

       

      
	public function Get_Agents()
	{
	  	$this->db->select('*');
		$this->db->from('ci_delivery_boy');
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
    
	
	
	public function pincode()
	{
		$this->db->select('*');
		$this->db->from('ci_pincode_master');
		$this->db->where('status',1);
		$this->db->order_by("created_at","asc");
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
	
	
	
	public function delivery_boy()
	{
		$this->db->select('*');
		$this->db->from('ci_delivery_boy');
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
	
	
	public function mapping($delivery_boy,$db_array)
	{
		if(!empty($db_array))
		{
			//$my_array = array('school_name'=>$school_name,'school_address'=>$address);
			//$this->db->insert('school_master',$my_array);
		    //$insertid = $this->db->insert_id();
			
			foreach($db_array as $index=>$val)
			{
				$myarray =array('pincode_id'=>$val,'delivery_boy_id'=>$delivery_boy);
				$this->db->insert('pincode_delivery_boy_mapping',$myarray);
			}
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
	    else
		{
			return 3;
		}
		
	}
	
	public function mapped_data()
	{
		    $query = $this->db->query("select a.id as pdbm,c.name,c.address,c.pincode,b.pincode as mapped,c.contact_number,c.alternate_number,c.status as db FROM pincode_delivery_boy_mapping a 
inner join ci_pincode_master b on b.id = a.pincode_id
inner join ci_delivery_boy c on c.id = a.delivery_boy_id  where c.status = 0");
			
            if($query->num_rows() > 0)
			{
				foreach($query->result_array() as $row)
				{
				  $data[] = $row;
				}
               return json_encode($data);
			}			
	}
	
	
	
	public function status($eid)
	{
		$query=$this->db->query("UPDATE ci_delivery_boy SET status = IF(status=1, 0, 1) WHERE id= $eid");
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
		$query = $this->db->query("select * from ci_delivery_boy where id='$eid'");
		if ($query->num_rows() > 0)
		{
			foreach($query->result_array() as $row)
			{
			  $data = $row;
			}

		   return json_encode($data);
		}
	}
	
	   
}
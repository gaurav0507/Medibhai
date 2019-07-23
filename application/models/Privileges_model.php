<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Privileges_model extends CI_Model
{
	public function __construct()
	{
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	
	
	public function Menu()
	{
		if(isset($this->session->userdata['logged_in']) && !empty($this->session->userdata['logged_in']))
		{
			$role_id = $this->session->userdata['logged_in']['type'];
			if($role_id == 1)
			{
				return $data = $this->superadmin();
			}
		    else if($role_id == 2)
			{
				return $data = $this->admin();
			}
			else
			{
				return $data = $this->error();
			}
				
				
		}
	}
	
	public function superadmin()
	{
		$a = array();
		$a['dashboard'] = array('dashboard'=>'Dashboard');
		$a['Agents'] = array('Add Partner'=>'admin/Agents','View Partner'=>'admin/Agents/view');
		$a['Package'] = array('Add Package'=>'admin/Package','View Package'=>'admin/Package/view');
		$a['Policy'] = array('Upload_Policy'=>'admin/Policy','Assign'=>'admin/Policy/Assign');
		$a['corporate'] = array('Corporate'=>'admin/Corporate','Add Users'=>'admin/Corporate/users','View Users'=>'admin/Corporate/view_user');
		
		$a['Delivery'] = array('View Delivery Executive'=>'admin/Delivery/view','Mapping Delivery Executive'=>'admin/Delivery/Mapping_Delivery','Mapping'=>'admin/Delivery/view_mapping');
		
		$a['claim'] = array('Claim Request'=>'admin/Request');
		
		//$a['Assign_plan'] = array('Claim Request'=>'admin/Request');
		
		return $a;
	}
	
	public function admin()
	{
		$a = array();
		$a['dashboard'] = array('dashboard'=>'Dashboard');
		$a['Agents'] = array('Add Partner'=>'Agents','View Partner'=>'Agents/view');
		$a['Package'] = array('Add Package'=>'Package','View Package'=>'Package/view');
		
		return $a;
	}
	
	
	public function error()
	{
		$a['Agents'] = array('Add Partner'=>'Agents','View Partner'=>'Agents/view');
	}
	
	
	
	
	
}




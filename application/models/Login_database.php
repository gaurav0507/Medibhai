<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login_database extends CI_Model {
       function __construct()
       {
           parent::__construct();
       }



       public function login($data) 
	   {

			$condition = "email =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
			$this->db->select('*');
			$this->db->from('ci_login');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
            if ($query->num_rows() == 1) 
			{
			  return true;
			} 
			else 
			{
			  return false;
			}
	   }
	   
	   
	   
	   public function read_user_information($username) 
	   {

			$condition = "email =" . "'" . $username . "'";
			$this->db->select('*');
			$this->db->from('ci_login');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) 
			{
			   return $query->result();
			} 
			else 
			{
			  return false;
			}
	  }
	   
	   
	   
	   
	   
	   
	   
	   
	   
}
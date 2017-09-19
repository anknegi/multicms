<?php

class Loginmodel extends CI_Model
{
  public function loginvalidate($username,$password)
  {
    $q= $this->db->where(['uname'=>$username,'pward'=>$password])->get('users');

  	if($q->num_rows())
  		{
  			
  			return $q->row()->id;
  		}
  		else
  		{
  			return FALSE;
  		}
  }

}


?>
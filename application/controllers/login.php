<?php 

class Login extends MY_Controller
{

  public function index()
  {
  	//check for already login 
  	if($this->session->userdata('userid'))
  	{
  		return redirect('admin/dashboard');
  	}
  	//function for viewing admin login view

  	$this->load->view('admin/adminlogin');
  }

  public function adminlogin()
  {
      //getting values from admin login view and validating them

  	 $this->load->library('form_validation');

     $this->form_validation->set_rules('username', 'Username', 'required|alpha|max_length[20]');
     $this->form_validation->set_rules('password', 'Password', 'required');

     if ($this->form_validation->run())
		{
			//in successfull validation
            
            $username= $this->input->post('username');
            $password= $this->input->post('password');

            $this->load->model('loginmodel');
            $userid= $this->loginmodel->loginvalidate($username,$password);
            if($userid)
            {

            	$this->session->set_userdata('userid',$userid);

            	return redirect('admin/dashboard');

            }
            else
            {
                $this->session->set_flashdata('loginfailed', 'The username or password you entered is not matched');
            	return redirect('login');
            }


        }
		else
		{
			//if validation failed redirect to adminlogin view
			$this->load->view('admin/adminlogin');
		}


  }

  public function logout()
  {
  	$this->session->unset_userdata('userid');
  	$this->session->set_flashdata('logoutsuccess', 'Logout successfuly');
  	return redirect('login');
     

  }

}

?>
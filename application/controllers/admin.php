<?php 

class Admin extends MY_Controller
{
  
  public function __construct()
  {
  	parent::__construct();

  	if(!$this->session->userdata('userid'))
  	 	return redirect('login');

  	 $this->load->model('articlemodel');
  }

  public function dashboard()
  {
  	$this->load->library('pagination');

  	$config= [
  				'base_url' => base_url('admin/dashboard'),
  				'per_page' => 5,
  				'total_rows' => $this->articlemodel->totalarticlerows(),
  				'full_tag_open' => "<ul class='pagination'>",
  				'full_tag_close' => "</ul>",
  				'first_tag_open' => '<li>',
  				'first_tag_close' => '</li>',
  				'next_tag_open' => '<li>',
  				'next_tag_close' => '</li>',
  				'prev_tag_open' => '<li>',
  				'prev_tag_close' => '</li>',
  				'num_tag_open' => '<li>',
  				'num_tag_close' => '</li>',
  				'cur_tag_open' => "<li class='active'><a>",
  				'cur_tag_close' => '</a></li>',
  			 ];

  	$this->pagination->initialize($config);

  	 
  	
  	$articles= $this->articlemodel->articlelist($config['per_page'],$this->uri->segment(3));

    $this->load->view('admin/dashboard',['articles'=>$articles]);
  }

  public function addarticle()
  {
  	$this->load->view('admin/addarticleview');
    

  }
   
  public function savearticle()
  {
  	$this->load->library('form_validation');
  	if($this->form_validation->run('addarticlerules'))
  	{
       //if validation passed
  		$post= $this->input->post(); //getting array of all values from form
  		unset($post['submit']);

  		//sending form data to Article model for inserting to database
  		
        if($this->articlemodel->articleinsert($post))
        {
        	$this->session->set_flashdata('message','Article added successfully');
        	return redirect('admin/dashboard');
        }
        else
        {
        	$this->session->set_flashdata('message','Article Cannot be added now');
        	return redirect('admin/dashboard');
        }


  	}
  	else
  	{
  		//if validation failed
 		 //load addarticle view for validation errors
  		$this->load->view('admin/addarticleview');
  	}

  }

   public function editarticle($articleid)
  {
  	
  	$article = $this->articlemodel->findarticle($articleid);
  	
  	$this->load->view('admin/editarticleview',['article'=>$article]);


  }

   public function updatearticle($articleid)
  {

  	$this->load->library('form_validation');
  	if($this->form_validation->run('addarticlerules'))
  	{
       //if validation passed
  		$post= $this->input->post(); //getting array of all values from form
  		unset($post['submit']);

  		//sending form data to Article model for inserting to database
  		
        if($this->articlemodel->updatearticle($articleid,$post))
        {
        	$this->session->set_flashdata('message','Article updated successfully');
        	return redirect('admin/dashboard');
        }
        else
        {
        	$this->session->set_flashdata('message','Article Cannot be be updated now');
        	return redirect('admin/dashboard');
        }

  }
}

   public function deletearticle()
  {
  	$articleid= $this->input->post('articleid');
    
        if($this->articlemodel->deletearticle($articleid))
        {
        	$this->session->set_flashdata('message','Article deleted successfully');
        	return redirect('admin/dashboard');
        }
        else
        {
        	$this->session->set_flashdata('message','Article Cannot be be updated now');
        	return redirect('admin/dashboard');
        }

  }



}

?>
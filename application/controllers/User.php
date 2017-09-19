<?php 


class User extends MY_Controller
{
   public function index()
   {
   	  $this->load->model('articlemodel');

   	  $this->load->library('pagination');

  	$config= [
  				'base_url' => base_url('user/index'),
  				'per_page' => 5,
  				'total_rows' => $this->articlemodel->countallarticles(),
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

    $articles= $this->articlemodel->allarticlelist($config['per_page'],$this->uri->segment(3));

  
   	  $this->load->view('user/articles_list',compact('articles'));

    }
 
  
  public function search()
  {

  	$this->load->library('form_validation');

  	$this->form_validation->set_rules('search','Search','required');

  	if(! $this->form_validation->run())
  	{
  		$this->index();

  		
  	}
  	else
  	{
  		$searchterm = $this->input->post('search');

  		$this->load->model('articlemodel');


      $this->load->library('pagination');

    $config= [
          'base_url' => base_url('user/search'),
          'per_page' => 5,
          'total_rows' => $this->articlemodel->countsearchedarticles($searchterm),
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



  		$articles= $this->articlemodel->search($config['per_page'],$this->uri->segment(4));
  		
      $this->load->view('user/searchresults',compact('articles'));
  	}

  } 

}


?>
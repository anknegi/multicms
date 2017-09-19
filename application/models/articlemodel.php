<?php 

class Articlemodel extends CI_Model
{
	
	public function articlelist($limit,$offset)
	{
	$userid= $this->session->userdata('userid');
      $articles= $this->db
      					->select(['id','title'])
      					->from('articles')
      					->where('user_id',$userid)
                                    ->limit($limit,$offset)
      					->get();


      
      return $articles->result();
	}

      public function allarticlelist($limit,$offset)
      {
     
      $articles= $this->db
                                    ->select(['id','title'])
                                    ->from('articles')
                                    ->limit($limit,$offset)
                                    ->get();


      
      return $articles->result();
      }

      public function totalarticlerows()
      {

            $userid= $this->session->userdata('userid');
      $articles= $this->db
                                    ->select(['id','title'])
                                    ->from('articles')
                                    ->where('user_id',$userid)
                                    ->get();


      
      return $articles->num_rows();


      }

      public function countallarticles()
      {


          
            $articles= $this->db
                                    ->select(['id','title'])
                                    ->from('articles')
                                    ->get();
            return $articles->num_rows();

      }

      public function articleinsert($formdata)
      {
            //print_r($formdata);
          return  $this->db->insert('articles',$formdata);

      }

      public function findarticle($articleid)
      {

        $q= $this->db->select(['id','title','body'])
                     ->where('id',$articleid)
                     ->get('articles');

        return $q->row();              
      }


      public function updatearticle($articleid,$post)
      {
           return $this->db->where('id',$articleid)
                     ->update('articles',$post);

      }

       public function deletearticle($articleid)
      {
           return $this->db->where('id',$articleid)
                     ->delete('articles',$post);

      }


      public function search($searchterm)
      {
            $q= $this->db->from('articles')
                              ->like('title',$searchterm)
                              ->get();

            return $q->result();

      }

      public function countsearchedarticles($searchterm)
      {

            $q= $this->db->from('articles')
                              ->like('title',$searchterm)
                              ->get();

            return $q->num_rows();

      }


}


?>
<?php include("adminheader.php");?>

<div class="container">

<h1> welcome to dashboard</h1> 


 <div class="row">
 	<div class="col-lg-6 col-lg-offset-6">
 		<a href="addarticle" class="btn btn-primary pull-right">Add article</a>
 	</div>
 </div>

 <div class="col-lg-6">

<?php if($msg= $this->session->flashdata('message')){ ?>
<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link"><?= $msg ?> </a>
</div>
<?php } ?>
</div>
<br><Br>
<table class="table">
	<thead>
	<th>Sr. No</th>
	<th>Title</th>	
	<th>Action</th>
	</thead>
	<tbody>
	   <?php if(count($articles)):
	   			$serial= $this->uri->segment(3,0);
	    ?>


		   <?php foreach($articles as $article): ?>
		   
			<tr>
			<td><?= ++$serial ?></td>
			<td><?php echo $article->title ?></td>
			<td>

		<div class="row">
			
			<div class="col-lg-2">
				<?php echo anchor("admin/editarticle/{$article->id}",'Edit',['class'=>'btn btn-primary']); ?>

			</div>
			<div class="col-lg-2">
				<?= form_open('admin/deletearticle'),
				form_hidden('articleid',$article->id),
				form_submit(['name'=>'submit','value'=>'delete','class'=>'btn btn-danger']); 
				form_close();
				?>
			</div>
		</div>		
				

			
				
			

	
			

			

			</td>
		   </tr>
		   <?php endforeach; ?>
		       
		     <?php else:  ?>
		     <tr>
		     <td colspan="3">
		     	No records found
		     </td></tr>
		      <?php endif; ?>
	</tbody>
</table>
<?= $this->pagination->create_links(); ?>
</div>



<?php include("adminfooter.php");?>
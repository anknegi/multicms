<!DOCTYPE html>
<html>
<head>
	<title>Article list</title>
	<?= link_tag('assets/css/bootstrap.min.css') ?>
	</head>
<body>
<?php include("userheader.php"); ?>
<div class="container">

<h3>Search results </h3>
<hr>
<table class="table">
	<thead>
	<th>Sr. No</th>
	<th>Title</th>	
	<th>Published On</th>
	</thead>
	<tbody>
	<?php if(count($articles)):
	   			$serial= $this->uri->segment(3,0);
	    ?>


		   <?php foreach($articles as $article): ?>
		   
			<tr>
			<td><?= ++$serial ?></td>
			<td><?php echo $article->title ?></td>
			<td> </td>
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
<?= $this->pagination->create_links() ?>

</div>

<?php include("userfooter.php"); ?>
</body>
</html>
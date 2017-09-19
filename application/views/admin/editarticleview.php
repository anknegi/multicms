<?php include("adminheader.php"); ?>


<div class="container">

<h3>Edit article</h3>
 <?= form_open("admin/updatearticle/{$article->id}") ?>
<form class="form-horizontal">
  
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Post Title</label>
      <div class="col-lg-10">
        
        <?= form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Enter title for your post ','value'=>set_value('title',$article->title)]) ?>
      
      <?php echo form_error('title',"<p class=text-danger>","</p>");
?>  
      </div>
   <?php echo form_error('title'); ?>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Body</label>
      <div class="col-lg-10">
        <?= form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Enter body for your post ','value'=>set_value('body',$article->body)]) ?>
        <?php echo form_error('body',"<p class=text-danger>","</p>"); ?>
       </div> 

    </div>
   
   
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
         <?= form_reset(['name'=>'reset','value'=>'reset','class'=>'btn btn-default']) ?>
         <?= form_submit(['name'=>'submit','value'=>'Update','class'=>'btn btn-primary']) ?>
      </div>
    </div>
  </fieldset>
</form>

<br>


</div>




<?php include("adminfooter.php"); ?>

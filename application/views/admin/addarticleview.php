<?php include('adminheader.php'); ?>

<div class="container">


 <?= form_open('admin/savearticle') ?>
<form class="form-horizontal">
  
        <?= form_hidden('user_id',$this->session->userdata('userid')); ?>
      
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Post Title</label>
      <div class="col-lg-10">
        
        <?= form_input(['name'=>'title','class'=>'form-control','placeholder'=>'Enter title for your post ','value'=>set_value('title')]) ?>
      
      <?php echo form_error('title',"<p class=text-danger>","</p>");
?>  
      </div>
   <?php echo form_error('title'); ?>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Body</label>
      <div class="col-lg-10">
        <?= form_textarea(['name'=>'body','class'=>'form-control','placeholder'=>'Enter body for your post ','value'=>set_value('body')]) ?>
        <?php echo form_error('body',"<p class=text-danger>","</p>"); ?>
       </div> 

    </div>
   
   
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
         <?= form_reset(['name'=>'reset','value'=>'reset','class'=>'btn btn-default']) ?>
         <?= form_submit(['name'=>'submit','value'=>'Create','class'=>'btn btn-primary']) ?>
      </div>
    </div>
  </fieldset>
</form>

<br>


</div>

<?php include('adminfooter.php'); ?>
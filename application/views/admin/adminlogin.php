
<!DOCTYPE html>
<html>
<head>
  <title>Article list</title>
  <?= link_tag('assets/css/bootstrap.min.css') ?>
  </head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= base_url('user/index') ?>">Multi CMS</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      
      
    </div>
  </div>
</nav>

<div class="container">

<div class="col-lg-6 col-md-6">
 <?= form_open('login/adminlogin') ?>
<form class="form-horizontal">
  <fieldset>
    <legend>Admin login</legend>
<?php if($error= $this->session->flashdata('loginfailed')){ ?>
<div class="alert alert-danger" role="alert">
  <a href="#" class="alert-link"><?= $error ?> </a>
</div>
<?php } ?>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
        
        <?= form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Enter your username ','value'=>set_value('username')]) ?>
      
      <?php echo form_error('username',"<p class=text-danger>","</p>");
?>  
      </div>

    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <?= form_password(['name'=>'password','class'=>'form-control','placeholder'=>'Enter your password ']) ?>
        <?php echo form_error('password',"<p class=text-danger>","</p>"); ?>
       </div> 

    </div>

   
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
         <?= form_reset(['name'=>'reset','value'=>'reset','class'=>'btn btn-default']) ?>
         <?= form_submit(['name'=>'submit','value'=>'login','class'=>'btn btn-primary']) ?>
      </div>
    </div>
  </fieldset>
</form>
<br>
<?php if($msg= $this->session->flashdata('logoutsuccess')){ ?>
<div class="alert alert-success" role="alert">
  <a href="#" class="alert-link"><?= $msg ?> </a>
</div>
<?php } ?>
</div>
<?php include("adminfooter.php"); ?>
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
      <a class="navbar-brand" href="#">Multi CMS</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <?= form_open('user/search', ['class'=>'navbar-form navbar-left']); ?>
       <div class="form-group">
          <input type="text" name="search" class="form-control" placeholder="Search Article">
        </div>
        <button type="submit" class="btn btn-default">Go</button>
        <?= form_error('search',"<span class='label label-danger'>","</span>"); ?>
      
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><?= anchor('login','Login'); ?></li>
        
      </ul>
    </div>
  </div>
</nav>
<h4>User Panel </h4>
<hr>
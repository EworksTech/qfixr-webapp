<!DOCTYPE html>
<html>
  <head>
    <title>Vantagens</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="<?php echo base_url()."assets/css/bootstrap.css" ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url()."assets/css/bootstrap-responsive.css" ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url()."assets/css/custom-amary.css" ?>" rel="stylesheet" media="screen">
  </head>
  
  <body>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
 <div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <button type="button" class="btn btn-navbar btn-dark-blue" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">Qfixr - Admin</a>
            <!-- Responsive -->
            <div class="nav-collapse collapse">
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->
<div class="container">
  <h3>Área Restrita.</h3>
  <div class="control-group">
    <label class="control-label" for="username">Email</label>
    <div class="controls">
      <input type="text" id="username" name="username" placeholder="Usuário">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="password">Password</label>
    <div class="controls">
      <input type="password" id="password" name="password" placeholder="Senha">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Entrar</button>
    </div>
  </div>
</form>
</div>
	
	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url()."assets/js/bootstrap.min.js" ?>"></script>
    
  </body>
</html>


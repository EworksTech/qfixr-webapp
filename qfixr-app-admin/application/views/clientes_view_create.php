<!DOCTYPE html>
<html>
  <head>
    <title>Criar Cliente</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="<?php echo base_url()."assets/css/bootstrap.css" ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url()."assets/css/bootstrap-responsive.css" ?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url()."assets/css/custom.css" ?>" rel="stylesheet" media="screen">
  </head>
  
  <body>
 <div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">Qfixr - Admin</a>
            <!-- Responsive -->
            <div class="nav-collapse collapse">
              <ul class="nav pull-right">
                <li class="active"><a href="<?php echo site_url('clientes')?>">Clientes</a></li>
                 <li class="divider-vertical"></li>
                <li ><a href="<?php echo site_url('chamados')?>">Chamados</a></li>
                 <li class="divider-vertical"></li>
                <li><a href="<?php echo site_url('home/logout')?>">Sair</a></li>
                <li class="divider-vertical"></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->
    
 <div class="container">
  <div class="row-fluid">
    <div class="span2">
      <ul class="nav nav-tabs nav-stacked">
      
        <li><a href="<?php echo site_url('clientes/create') ?>"> Novo<i class="icon-chevron-right"></i></a></li>
        <li><a href="<?php echo site_url('clientes') ?>"> Todos<i class="icon-chevron-right"></i></a></li>
        </ul>
    </div>
    <div class="span10">
        <fieldset>
        <legend>Criar Cliente</legend>
     
        <?php echo validation_errors(); ?>

		<?php echo form_open('clientes/create','id="form_clientes"') ?>
            
            
            <label for="nome">Nome</label> 
            <input type="text" id="nome" name="nome" value=""/><br />
        
            <label for="telefone">Telefone</label> 
            <input type="text" id="telefone" name="telefone" value=""/><br />
            
            <label for="email">E-mail</label> 
            <input type="text" id="email" name="email" value=""/><br />
            
            <label for="rua">Rua</label> 
            <input type="text" id="rua" name="rua" value=""/><br />
         	
            <label for="numero">Número</label> 
            <input type="text" id="numero" name="numero" value=""/><br />
            
            <label for="bairro">Bairro</label> 
            <input type="text" id="bairro" name="bairro" value=""/><br />
            
            <label for="cidade">Cidade</label> 
            <input type="text" id="cidade" name="cidade" value=""/><br />
            
            <label for="cep">CEP</label> 
            <input type="text" id="cep" name="cep" value=""/><br />
            
            
            <input class="btn" type="submit" name="submit" value="Criar Cliente" /> 
         </fieldset>
        </form>
      
    </div>
  </div>
</div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url()."assets/js/bootstrap.min.js" ?>"></script>
 	<script src="<?php echo base_url()."assets/js/bootbox.min.js" ?>"></script>
    <script>
    		$("#form_clientes").submit(function(){
					
					/*
					var stralert = "Por favor, preencher todos os campos." 
						
					var cpf = $("#cpf").val();
					if (cpf == "") {
						bootbox.alert(stralert, function() {
						  //
						});	
						return false;
					}
					
					var name = $("#name").val();
					if (name == "") {
						bootbox.alert(stralert, function() {
						  //
						});	
						return false;
					}
					
					var cellphone = $("#cellphone").val();
					if (cellphone == "") {
						bootbox.alert(stralert, function() {
						  //
						});	
						return false;
					}	
					
					var address = $("#address").val();
					if (address == "") {
						bootbox.alert(stralert, function() {
						  //
						});	
						return false;
					}
					*/	
					
			});
    </script>   
   </body>
</html>
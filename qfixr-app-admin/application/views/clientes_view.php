<!DOCTYPE html>
<html>
  <head>
    <title>Clientes</title>
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
            <button type="button" class="btn btn-navbar btn-dark-blue" data-toggle="collapse" data-target=".nav-collapse">
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
        <legend>Todos os Clientes</legend>
        <table class="table table-hover">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>Email</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
        <?php 
		
			 	 foreach ($dbclientes as $clients_item){ 
					echo "<tr>";
						echo "<td>".$clients_item['id']."</td>";
						//echo "<td><a href='".site_url('clientes/edit/'.$clients_item['id'])."'>".$clients_item['nome']."</a></td>";
						echo "<td>".$clients_item['nome']."</td>";
						echo "<td>".$clients_item['telefone']."</td>";
						echo "<td>".$clients_item['email']."</td>";
						//echo '<td><a href="#">Novo Chamado</a></td>';
						echo "<td><a href='".site_url('chamados/create/'.$clients_item['id'])."'>Novo Chamado</a></td>";
					echo "</tr>";
				  }
				  
		?> 
        </tbody>
        </table>
        
		 <?php	 echo $pagination_links ?>
        
        </fieldset>
       
      
    </div>
  </div>
</div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url()."assets/js/bootstrap.min.js" ?>"></script>
    
  </body>
</html>


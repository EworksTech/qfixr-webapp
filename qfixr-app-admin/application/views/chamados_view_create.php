<!DOCTYPE html>
<html>
  <head>
    <title>Criar Chamado</title>
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
      
        <li><a href="<?php echo site_url('chamados/create') ?>"> Novo<i class="icon-chevron-right"></i></a></li>
        <li><a href="<?php echo site_url('chamados') ?>"> Todos<i class="icon-chevron-right"></i></a></li>
        </ul>
    </div>
    <div class="span10">
        <fieldset>
        <legend>Criar Cliente</legend>
     
        <?php echo validation_errors(); ?>

		<?php echo form_open('chamados/create','id="form_chamados"') ?>
            
            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>"/>
                        
            <label for="id_servico">Serviço</label>
            <select name="id_servico">
                <?php 
					
					$first = true;
					foreach ($servicos as $servicos_item){
				    	echo   '<option value="'.$servicos_item['id'].'" '.( ($first)?("selected"):("")).">".$servicos_item['nome']."</option>";
						if($first){
							$first = false;
						}
					}
				?>
            </select><br />
            
            <label for="id_dispositivo">Dispositivo</label>
            <select name="id_dispositivo">            
				<?php 
					$first = true;
					foreach ($dispositivos as $dispositivos_item){
				    	echo   '<option value="'.$dispositivos_item['id'].'" '.( ($first)?("selected"):("")).">".$dispositivos_item['nome']."</option>";
						if($first){
							$first = false;
						}
					}
                ?>
            </select><br />
            
            <label for="descricao">Descrição</label>
            <textarea name="descricao"></textarea><br />
            
            <label for="agendar">Agendar</label>
            <input type="text" name="agendar" /><br />            
            
            <input class="btn" type="submit" name="submit" value="Criar Chamado" /> 
         </fieldset>
        </form>
      
    </div>
  </div>
</div>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="<?php echo base_url()."assets/js/bootstrap.min.js" ?>"></script>
 	<script src="<?php echo base_url()."assets/js/bootbox.min.js" ?>"></script>
    
   </body>
</html>
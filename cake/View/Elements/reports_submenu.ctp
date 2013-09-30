<?php echo $this->Html->script('jquery-1.10.2.min') ?>
<?php echo $this->Html->script('reports') ?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link('Chamados Em Aberto', '/reports/index/open') ?></li>
		<li><?php echo $this->Html->link('Chamados Pendentes', '/reports/index/pending') ?></li>
		<li><?php echo $this->Html->link('Chamados Finalizados', '/reports/index/closed') ?></li>
		<li><?php echo $this->Html->link('Chamados Por Técnico', '/reports/technician') ?></li>
  </ul>
</div>

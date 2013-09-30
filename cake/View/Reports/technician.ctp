<?php echo $this->element('reports_submenu')?>

<div class="tickets index">
<h2>Chamados <?php echo __(ucfirst($this->request->pass[0])) ?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th>#</th>
	<th>Cliente</th>
	<th>Técnico</th>
	<th>Título</th>
	<th>Criado em</th>
	<th>Situação</th>
</tr>
<?php foreach($tickets as $ticket): $total = 0; ?>
<tr>
  <td><?php echo $ticket['Ticket']['id'] ?></td>
  <td><?php echo $ticket['Customer']['name'] ?></td>
  <td><?php echo $ticket['Technician']['name'] ?></td>
  <td><?php echo $ticket['Ticket']['title'] ?></td>
  <td><?php echo $ticket['Ticket']['created'] ?></td>
  <td><?php echo $ticket['Status']['name'] ?></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td colspan="5">
    <table cellpadding="0" cellspacing="0">
      <tr>
      	<th>Serviços</th>
      	<th>Preço</th>
      	<th>Aprovado</th>
      </tr>
    <?php foreach ($ticket['TicketService'] as $ticketService): $total += $ticketService['price'] ?>
      <tr>
        <td><?php echo $ticketService['description'] ?></td>
        <td><?php echo $ticketService['price'] ?></td>
        <td><input type="checkbox" value="1"></td>
      </tr>
    <?php endforeach; ?>
    </table>
    <table cellpadding="0" cellspacing="0">
      <tr>
      	<th>Peças</th>
      	<th>Preço</th>
      	<th>Aprovado</th>
      </tr>
    <?php foreach ($ticket['TicketPart'] as $ticketPart): $total += $ticketPart['price']; ?>
      <tr>
        <td><?php echo $ticketService['description'] ?></td>
        <td><?php echo $ticketService['price'] ?></td>
        <td><input type="checkbox" value="1"></td>
      </tr>
    <?php endforeach; ?>
    </table>
  </td>
</tr>
<tr>
  <td colspan="6" style="text-align:right">Total Recebido: <b><?php echo $total ?></b></td>
</tr>
<?php endforeach; ?>
</table>
</div>
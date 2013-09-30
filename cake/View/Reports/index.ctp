<?php echo $this->element('reports_submenu')?>

<div class="tickets index">
<h2>Chamados <?php echo __(ucfirst($this->request->pass[0])) ?></h2>

<?php echo $this->Form->create('User') ?>
Selecione um técnico <?php echo $this->Form->select('technician_id', $technicians, array('value' => $technician_id, 'empty' => 'todos')) ?>&nbsp;
&nbsp;<input  type="submit" value="Enviar"/>
<br><br>

<table cellpadding="0" cellspacing="0">
<tr>
	<th>#</th>
	<th>Cliente</th>
	<th>Técnico</th>
	<th>Título</th>
	<th>Criado em</th>
	<th>Modificado em</th>
	<th>Situação</th>
</tr>
<?php foreach($tickets as $ticket): $total = 0; ?>
<tr>
  <td><?php echo $ticket['Ticket']['id'] ?></td>
  <td><?php echo $ticket['Customer']['name'] ?></td>
  <td><?php echo $ticket['Technician']['name'] ?></td>
  <td><?php echo $ticket['Ticket']['title'] ?></td>
  <td><?php echo $ticket['Ticket']['created'] ?></td>
  <td><?php echo $ticket['Ticket']['modified'] ?></td>
  <td><?php echo $this->Form->select('Ticket.status_id', $statuses, array('value' => $ticket['Ticket']['status_id'], 'class' => 'onChange', 'id' => 'status_id')) ?></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td colspan="6">

    <table cellpadding="0" cellspacing="0">
      <tr>
        <th width="100">Data/Hora</th>
      	<th>Atividades</th>
      </tr>
    <?php foreach ($ticket['TicketAction'] as $ticketAction): ?>
      <tr>
        <td><?php echo date('d/m H:i', strtotime($ticketAction['created'])) ?></td>
        <td><?php echo $ticketAction['description'] ?></td>
      </tr>
    <?php endforeach; ?>
    </table>

    <table cellpadding="0" cellspacing="0">
      <tr>
        <th width="100">Data/Hora</th>
      	<th>Serviços</th>
      	<th>Preço</th>
      	<th width="100">Aprovado</th>
      </tr>
    <?php foreach ($ticket['TicketService'] as $ticketService): $total += $ticketService['price'] ?>
      <tr>
        <td><?php echo date('d/m H:i', strtotime($ticketService['created'])) ?></td>
        <td><?php echo $ticketService['description'] ?></td>
        <td><?php echo number_format($ticketService['price'],2,',','.') ?></td>
        <td><input type="checkbox" value="<?php echo $ticketService['id'] ?>" name="TicketService.id"></td>
      </tr>
    <?php endforeach; ?>
    </table>

    <table cellpadding="0" cellspacing="0">
      <tr>
        <th width="100">Data/Hora</th>
      	<th>Peças</th>
      	<th>Preço</th>
      	<th width="100">Aprovado</th>
      </tr>
    <?php foreach ($ticket['TicketPart'] as $ticketPart): $total += $ticketPart['price']; ?>
      <tr>
        <td><?php echo date('d/m H:i', strtotime($ticketPart['created'])) ?></td>
        <td><?php echo $ticketService['description'] ?></td>
        <td><?php echo number_format($ticketService['price'],2,',','.') ?></td>
        <td><input type="checkbox" value="<?php echo $ticketPart['id'] ?>" name="TicketPart.id"></td>
      </tr>
    <?php endforeach; ?>
    </table>

  </td>
</tr>
<tr>
  <td colspan="7" style="text-align:right">Total Recebido: <b><?php echo $total ?></b></td>
</tr>
<?php endforeach; ?>
</table>
</div>
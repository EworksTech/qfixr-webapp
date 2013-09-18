<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><?php echo $this->Html->link('Open Tickets', '/reports/index/open') ?></li>
		<li><?php echo $this->Html->link('Pending Tickets', '/reports/index/pending') ?></li>
		<li><?php echo $this->Html->link('Closed Tickets', '/reports/index/closed') ?></li>
  </ul>
</div>

<div class="tickets index">
<h2><?php echo ucfirst($this->request->pass[0]) ?> Tickets</h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th>Id</th>
	<th>Customer</th>
	<th>Technician</th>
	<th>Title</th>
	<th>Created</th>
	<th>Status</th>
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
      	<th>Services</th>
      	<th>Price</th>
      	<th>Approved</th>
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
      	<th>Parts</th>
      	<th>Price</th>
      	<th>Approved</th>
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
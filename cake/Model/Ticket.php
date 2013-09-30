<?php

class Ticket extends Model {
	var $belongsTo = array(
		'Customer' => array('className' => 'User', 'foreignKey' => 'customer_id'),
		'Technician' => array('className' => 'User', 'foreignKey' => 'technician_id'),
		'Status'
	);
  var $hasMany = array(
    'TicketAction',
    'TicketService',
    'TicketPart'
  );
}

?>
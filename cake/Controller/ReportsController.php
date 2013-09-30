<?php

class ReportsController extends AppController {
  var $uses = array('Ticket', 'Status', 'User');

  public function index() {
    $conditions = array();

    if (! isset($this->request->pass[0]))
      $this->redirect('/reports/index/open');

    switch ($this->request->pass[0]) {
      case 'open':    $conditions = array('Ticket.status_id' => array(1,2,3)); break;
      case 'pending': $conditions = array('Ticket.status_id' => array(4,5)); break;
      case 'closed':  $conditions = array('Ticket.status_id' => array(6)); break;
    }

    if (! isset($this->request->pass[1]))
      $technician_id = 0;
    else {
      $technician_id = $this->request->pass[1];
      $conditions['Ticket.technician_id'] = $technician_id;
    }

    $this->set('statuses', $this->Status->find('list'));
    $this->set('technicians', $this->User->find('list', array('conditions' => array('User.role_id' => 2))));
    $this->set('technician_id', $technician_id);
    $this->set('tickets', $this->Ticket->find('all', array('conditions' => $conditions)));
  }
}

?>
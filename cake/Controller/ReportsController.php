<?php

class ReportsController extends AppController {
  var $uses = array('Ticket');

  public function index() {
    $conditions = array();

    if (! isset($this->request->pass[0]))
      $this->redirect('/reports/index/open');
      
    switch ($this->request->pass[0]) {
      case 'open': $conditions = array('Ticket.status_id' => array(1,2,3)); break;
      case 'pending': $conditions = array('Ticket.status_id' => array(4,5)); break;
      case 'closed': $conditions = array('Ticket.status_id' => array(6)); break;
    }

    $this->set('tickets', $this->Ticket->find('all', array('conditions' => $conditions)));
  }
}

?>
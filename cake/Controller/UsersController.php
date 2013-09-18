<?php

class UsersController extends AppController {
	var $scaffold;

  public function login() {
    if ($this->Session->check('User')) {
      $this->redirect('users');
    }
    $this->set('message', 'Informe seu email e senha');
    if (isset($this->data['User'])) {
      $user = $this->User->findByEmail($this->data['User']['email']);
      if (! isset($user['User'])) {
        $this->set('message', 'Usuário não encontrado');
        return;
      }
      if ($user['User']['password'] != $this->data['User']['password']) {
        $this->set('message', 'Senha inválida');
        return;
      }
      $this->Session->write('User', $user['User']);
      $this->redirect('/tickets');
    }
  }
  
  public function logout() {
    $this->Session->delete('User');
    $this->redirect('users/login');
  }
  
}

?>
<?php

class User extends Model {
	var $belongsTo = array('Role');
	
	public function beforeSave() {
//	  $this->data['User']['password'] = sha1($this->data['User']['password']);
	}
}

?>
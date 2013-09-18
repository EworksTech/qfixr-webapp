<div style="width:300px; margin-left:auto; margin-right:auto">
<div style="text-align:center"><?php echo $message ?></div>
<?php echo $this->Form->create('User', array('url' => '/users/login')) ?>
<?php echo $this->Form->input('email') ?>
<?php echo $this->Form->input('password', array('type' => 'password')) ?>
<?php echo $this->Form->submit() ?>
</div>
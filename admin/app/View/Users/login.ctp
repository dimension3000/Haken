<?php
echo $this->Form->create(array('class'=>'form-signin'));
echo '<h2 class="form-signin-heading">ENTRAR</h2>';
echo $this->Form->input('usuario',array('class'=>'input-block-level', 'label'=>'Nombre de usuario'));
echo $this->Form->input('password',array('class'=>'input-block-level', 'label'=>'Contraseña'));
?>

<?php
echo $this->Form->end(array('label'=>'Entrar','class' => 'btn btn-large btn-warning'));
?>


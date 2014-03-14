<!--BARRA DE DIRECCIONES-->
<div class="navbar">
    <div class="navbar-inner">
        <ul class="breadcrumb">
            <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
            <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
            <li>
                <a href="/haken14/admin">Home</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="/haken14/admin/users">Usuarios</a> <span class="divider">/</span>
            </li>
            <li class="active">Agregar Nuevo Usuario</li>
        </ul>
    </div>
</div>
<!--FIN BARRA DE DIRECCIONES-->

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Agregar Nuevo Usuario</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">

            <fieldset>
                <legend>Agregar Usuario</legend>

                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Información</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <?php echo $this->Form->create(array('class'=>'form-horizontal')); ?>

                <?php

                    echo $this->Form->input("usuario",array('class'=>'control-group', 'label'=>'Nombre de Usuario'));
                    echo $this->Form->input("password",array('class'=>'control-group','type'=>'password', 'label'=>'Contraseña'));
                    echo $this->Form->input("password_confirmation",array('class'=>'control-group', 'label'=>'Confirmación de contraseña','type'=>'password'));

                ?>

                        </div>
                    </div>
                </div>

                <div class="form-actions">
                <?php echo $this->Form->end(array('label'=>'GUARDAR','class' => 'btn btn-warning leftBtn')); ?>
                <?php echo $this->Html->link('REGRESAR',$_SERVER["HTTP_REFERER"],array('class'=>'btn btn-default')); ?>
                </div>


            </fieldset>

        </div>
    </div>
</div>

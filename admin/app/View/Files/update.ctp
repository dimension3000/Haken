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
                <a href="/haken14/admin/files/index">Archivos</a> <span class="divider">/</span>
            </li>
            <li class="active">Editar Archivo</li>
        </ul>
    </div>
</div>
<!--FIN BARRA DE DIRECCIONES-->

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Editar Archivo</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">

            <fieldset>
                <legend>Archivo</legend>

                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Información</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <?php echo $this->Form->create(array('class'=>'form-horizontal','enctype'=>'multipart/form-data','id'=>'addC')); ?>

                            <?php echo $this->Form->input("nombre",array('class'=>'control-group')); ?>

                            <!--Descripcion-->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Descripción</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">

                                        <?php echo $this->Form->textarea("descripcion",array('class'=>'control-group ckeditor', 'label'=>'Descripcion')); ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="form-actions">
                    <?php
                    echo $this->Form->end(array('label'=>'Guardar','class' => 'btn btn-warning leftBtn','name'=>'Submit'));
                    echo $this->Html->link('Regresar',$_SERVER["HTTP_REFERER"],array('class'=>'btn btn-default'));
                    ?>
                </div>

            </fieldset>

        </div>
    </div>
</div>
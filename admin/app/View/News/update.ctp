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
                <a href="/haken14/admin/news">Noticias</a> <span class="divider">/</span>
            </li>
            <li class="active">Editar Noticia</li>
        </ul>
    </div>
</div>
<!--FIN BARRA DE DIRECCIONES-->

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Editar Noticia</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">

            <fieldset>
                <legend>Noticia</legend>

                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Información</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <?php echo $this->Form->create(array('class'=>'form-horizontal','enctype'=>'multipart/form-data','id'=>'addC')); ?>

                            <?php echo $this->Form->input("titulo",array('class'=>'control-group')); ?>

                            <!-- Estilo al input de tipo file -->
                            <div class="control-group">
                                <label for="ServiceImage">Imagen</label>
                                <img id="blah1" src="/haken14/admin/app/webroot/img/news/<?php echo $img[0]['news']['img']; ?>" alt="preview" class="img-rounded" style="margin: 10px; max-width: 50px; max-height: 50px; border: 2px solid #BADDFF; display: block;"/>
                                <div class="uploader" id="uniform-fileInput">
                                    <input type="file" name="image_field" class="input-file uniform_on" id="CategoryImage" onchange="readURL(this,1);">
                                    <span class="filename" style="-webkit-user-select: none;">Sin Imagen</span>
                                    <span class="action" style="-webkit-user-select: none;">Selecciona Imagen</span>
                                </div>
                            </div>
                            <!-- Fin estilo al input de tipo file -->

                        </div>
                    </div>
                </div>

                <!--Descripcion-->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Contenido</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <?php echo $this->Form->textarea("contenido",array('class'=>'control-group ckeditor', 'label'=>'Contenido')); ?>

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
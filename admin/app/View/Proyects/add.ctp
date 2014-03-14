<script id="imageTemplate" type="text/x-jquery-tmpl">
    <div class="imageholder">
		<figure>
			<img src="${filePath}" alt="${fileName}"/>
			<figcaption>
				${fileName} <br/>
			</figcaption>
		</figure>
	</div>
</script>

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
                <a href="/haken14/admin/Proyects">Proyecto</a> <span class="divider">/</span>
            </li>
            <li class="active">Agregar Proyecto</li>
        </ul>
    </div>
</div>
<!--FIN BARRA DE DIRECCIONES-->

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Nuevo Proyecto</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">



            <fieldset>
                <legend>Proyecto</legend>

                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Informacion</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <?php echo $this->Form->create(array('class'=>'form','enctype'=>'multipart/form-data','id'=>'addProduct','name'=>'addP')); ?>

                                <?php echo $this->Form->input("nombre",array('class'=>'control-group')); ?>
                        </div>
                    </div>
                </div>

                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Imagenes</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <!-- Prueba drag and drop -->
                            <!-- drop area -->
                            <div class="dropareainner">
                                <p><input id="uploadbtn" type="button" class="btn btn-warning" value="Seleccionar Imagenes"/><span style="margin: 0 15px; color: #A49999;">Es preferible que todas las imagenes a agregar esten en la misma carpeta. (Manten presionada la tecla Ctrl para seleccionar varias imagenes)</span></p>
                                <!-- extra feature -->
                                <p id="err">Error al subir</p>
                            </div>
                            <input id="upload" type="file" multiple="multiple" name="file[]" />
                            <!-- result area -->
                            <div id="result" class="control-group">

                            </div>
                            <!-- Fin prueba drag and drop -->
                        </div>
                    </div>
                </div>

                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Descripción</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <?php echo $this->Form->textarea("descripcion",array('class'=>'control-group ckeditor', 'label'=>'Descripción')); ?>
                        </div>
                    </div>
                </div>

                <div class="form-actions" id="mostrarDiv">

                <?php echo $this->Form->end(array('label'=>'Guardar','class' => 'btn btn-warning leftBtn','name'=>'Submit')); ?>
                <?php echo $this->Html->link('Regresar',$_SERVER["HTTP_REFERER"],array('class'=>'btn btn-default')); ?>
                </div>

            </fieldset>

        </div>
    </div>
</div>

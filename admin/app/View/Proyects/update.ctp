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
<div class="navbar" xmlns="http://www.w3.org/1999/html">
    <div class="navbar-inner">
        <ul class="breadcrumb">
            <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
            <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
            <li>
                <a href="/haken14/admin">Home</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="/haken14/admin/Proyects">Proyectos</a> <span class="divider">/</span>
            </li>
            <li class="active">Editar Proyecto</li>
        </ul>
    </div>
</div>
<!--FIN BARRA DE DIRECCIONES-->

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Editar Proyecto</div>
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

                            <?php echo $this->Form->create(array('class'=>'form-horizontal','enctype'=>'multipart/form-data')); ?>
                            <?php echo $this->Form->input("nombre",array('class'=>'control-group')); ?>

                        </div>
                    </div>
                </div>

                <!-- Imagenes del producto -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Imagenes</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <table class="table table-striped" id="tableImg">

                                <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach($images as $i){ ?>

                                    <tr>
                                        <td><?php echo $this->Html->image('/app/webroot/img/proyects/'.$i['images_proyects']['img'],array('alt'=>$i['images_proyects']['img'],'width'=>'100px')); ?></td>

                                        <td>
                                            <div class="btn-toolbar" role="toolbar">
                                                <!--<div class="btn-group">-->
                                                    <?php /*echo $this->Form->postLink('<button class="btn btn-default btn-lg"><span class="icon-eye-open"/></button>', array('controller' => 'imagesProducts', 'action' => 'view', $i['images_products']['id']),array('escape'=>false)); */ ?>
                                                    <?php /* echo $this->Form->postLink($this->Html->tag('button',$this->Html->tag('span','', array('class' => 'icon-remove')),array('class' => 'btn btn-default btn-lg')), array('controller' => 'imagesProducts','action' => 'delete', $i['images_products']['id']),array('escape'=>false),'¿Estas Seguro que deseas eliminar esta imagen?'); */ ?>
                                                    <?php /*echo $this->Html->link('<span class="icon-eye-open"></span> View', array('controller' => 'ImagesProducts', 'action' => 'view', $i['images_products']['id']),array('escape'=>false, 'class'=>'btn btn-default btn-lg group1 cboxElement','title'=>'Image'));*/ ?>
                                                    <?php echo $this->Html->link('<span class="icon-remove"></span> Remove', array('controller' => 'Proyects','action' => 'deleteImg', $i['images_proyects']['id']),array('escape'=>false,'class'=>'btn btn-default btn-lg'), '¿Estas seguro que deseas eliminar la imagen?'); ?>

                                                    <!--<a href="/haken14/admin/ImagesProducts/delete/<?php /*echo $i['images_products']['id']*/ ?>" class="btn btn-default btn-lg" onclick="return confirm('¿Estas Seguro que deseas eliminar esta imagen?');"><span class="icon-remove">Eliminar</span></a>-->

                                                <!--</div>-->
                                            </div>
                                        </td>
                                    </tr>

                                <?php } ?>
                                </tbody>

                            </table>

                            <!-- Prueba drag and drop -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Agregar imagenes</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">

                                        <div class="dropareainner">
                                            <p><input id="uploadbtn" type="button" class="btn btn-warning" value="Seleccionar Imagenes"/><span style="margin: 0 15px; color: #A49999;">Es preferible que todas las imagenes a agregar esten en la misma carpeta. (Manten presionada la tecla Ctrl para seleccionar varias imagenes)</span></p>
                                            <!-- extra feature -->
                                            <p id="err">Error al subir</p>
                                        </div>
                                        <input id="upload" type="file" multiple="multiple" name="file[]" />

                                        <div id="result" class="control-group">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin prueba drag and drop -->

                            <?php /*echo $this->Html->link('AGREGAR IMAGEN', array('controller' => 'imagesProducts', 'action' => 'add'));*/ ?>

                         </div>
                    </div>
                </div>
                <!-- Fin imagenes del producto -->

                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Descripcion</div>
                    </div>
                        <div class="block-content collapse in">
                            <div class="span12">
                                <?php echo $this->Form->textarea("descripcion",array('class'=>'ckeditor', 'label'=>'Descripcion')); ?>
                            </div>
                        </div>
                </div>
                </fieldset>
                <div class="form-actions">
                    <?php echo $this->Form->end(array('label'=>'Guardar','class' => 'btn btn-warning leftBtn','name'=>'Submit')); ?>
                    <?php echo $this->Html->link('Regresar',$_SERVER["HTTP_REFERER"],array('class'=>'btn btn-default')); ?>
                </div>



        </div>
    </div>
</div>

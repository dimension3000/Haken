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
                <a href="/haken14/admin/products">Producto</a> <span class="divider">/</span>
            </li>
            <li class="active">Agregar Un Producto</li>
        </ul>
    </div>
</div>
<!--FIN BARRA DE DIRECCIONES-->

<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Agregar Un Producto</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">

            <fieldset>
                <legend>Producto</legend>

                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Informacion</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <?php echo $this->Form->create(array('class'=>'form-horizontal','enctype'=>'multipart/form-data','id'=>'addC')); ?>

                            <?php echo $this->Form->input("linea_id",array('class'=>'control-group')); ?>
                            <?php echo $this->Form->input("application_id",array('class'=>'control-group', 'label'=>'Aplicación', 'default' => '7')); ?>


                            <!--INPUT SELECT SUBAPLICACIONES-->

                            <?php /*echo $this->Form->input("subapplication_id",array('class'=>'control-group', 'label'=>'SubAplicación')); */?>
                            <?php
                                $sizes = array(/*'s' => 'Small', 'm' => 'Medium', 'l' => 'Large'*/);

                                echo $this->Form->input(
                                    'subapplication_id',
                                    array('class'=>'control-group', 'label'=>'SubAplicación')
                                );
                            echo $this->Html->image('/app/webroot/img/ajax-loader.gif',array('alt'=>'espera','width'=>'25px', 'id'=>'carga'));
                            ?>

                            <?php
                            /*LLENANDO INOUT SELECT DE SUBCATEGORIAS MEDIANTE AJAX*/
                            $this->Js->get('#ProductApplicationId')->event(
                                'change',
                                $this->Js->request(
                                    array('controller' => 'Products', 'action' => 'consulta'),
                                    array(
                                        'update' => '#ProductSubapplicationId',
                                        'async' => true,
                                        'dataExpression' => true,
                                        'method' => 'post',
                                        'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true)),
                                        'before'=> "$('#ProductSubapplicationId').hide(); $('#carga').show();",
                                        'complete'=> "  $('#carga').hide();
                                                        $('#ProductSubapplicationId').show();
                                                        "
                                    )
                                )
                            );
                            ?>

                            <script type="text/javascript">
                                $(document).on('ready',function(){
                                    $('#carga').hide();
                                    $('#ProductSubapplicationId').prop('disabled',true);
                                    var campo;
                                    $('#ProductApplicationId').change( function(){
                                        campo = $('#ProductApplicationId').val();
                                        if(campo == '7'||campo == '6'||campo == '5'){
                                            $('#ProductSubapplicationId').prop('disabled',true);
                                        }
                                        else{
                                            $('#ProductSubapplicationId').removeAttr('disabled');
                                        }
                                    })

                                })
                            </script>

                            <!--FIN INPUT SELECT SUBAPLICACIONES-->

                            <?php echo $this->Form->input("nombre",array('class'=>'control-group', 'label'=>'Nombre')); ?>

                            <!-- Estilo al input de tipo file -->
                            <div class="control-group">
                                <label for="ServiceImage">Imagen Principal</label>
                                <img id="blah1" src="#" alt="preview" class="img-rounded" style="margin: 10px; max-width: 50px; max-height: 50px; border: 2px solid #BADDFF; display: none;"/>
                                <div class="uploader" id="uniform-fileInput">
                                    <input type="file" name="image_field1" class="input-file uniform_on" id="CategoryImage" onchange="readURL(this,1);">
                                    <span class="filename" style="-webkit-user-select: none;">Sin Imagen</span>
                                    <span class="action" style="-webkit-user-select: none;">Selecciona Imagen</span>
                                </div>
                            </div>
                            <!-- Fin estilo al input de tipo file -->

                            <!-- Estilo al input de tipo file -->
                            <div class="control-group">
                                <label for="ServiceImage">Imagen 2</label>
                                <img id="blah2" src="#" alt="preview" class="img-rounded" style="margin: 10px; max-width: 50px; max-height: 50px; border: 2px solid #BADDFF; display: none;"/>
                                <div class="uploader" id="uniform-fileInput">
                                    <input type="file" name="image_field2" class="input-file uniform_on" id="CategoryImage2" onchange="readURL(this,2);">
                                    <span class="filename" style="-webkit-user-select: none;">Sin Imagen</span>
                                    <span class="action" style="-webkit-user-select: none;">Selecciona Imagen</span>
                                </div>
                            </div>
                            <!-- Fin estilo al input de tipo file -->

                            <!-- Estilo al input de tipo file -->
                            <div class="control-group">
                                <label for="ServiceImage">Imagen 3</label>
                                <img id="blah3" src="#" alt="preview" class="img-rounded" style="margin: 10px; max-width: 50px; max-height: 50px; border: 2px solid #BADDFF; display: none;"/>
                                <div class="uploader" id="uniform-fileInput">
                                    <input type="file" name="image_field3" class="input-file uniform_on" id="CategoryImage3" onchange="readURL(this,3);">
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
                        <div class="muted pull-left">Descripción</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">

                            <?php echo $this->Form->textarea("descripcion",array('class'=>'control-group ckeditor', 'label'=>'Descripcion')); ?>

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

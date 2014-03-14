<!-- Datatable plugin -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableProductos').dataTable({
            "oLanguage": {
                "sLengthMenu": "_MENU_ Filas por pagina",
                "sZeroRecords": "No se encontraron resultados",
                "sInfo": "Mostrados del _START_ al _END_.    Total de registros: _TOTAL_",
                "sInfoEmpty": "Ningun registro almacenado",
                "sInfoFiltered": "(Filtrados de _MAX_ registros totales)",
                "sSearch": "Buscar",
                "oPaginate":{
                    "sNext": "Sigiente",
                    "sPrevious": "Anterior"
                }
            }
        });
    });
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
            <li class="active">Archivos</li>
        </ul>
    </div>
</div>
<!--FIN BARRA DE DIRECCIONES-->

<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Archivos</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12 well-large">

<table class="table table-striped" id="tableProductos">

    <thead>
    <tr>
        <th>Nombre</th>
        <th>Archivo</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
    </thead>

    <tbody>

<?php foreach($files as $f){ ?>

    <tr>
        <td><?php echo $f['files']['nombre']; ?></td>
        <td><?php echo $f['files']['archivo']; ?></td>
        <td><?php echo $f['files']['descripcion']; ?></td>
        <td>
            <div class="btn-toolbar" role="toolbar">
                <div class="btn-group">
                    <?php echo $this->Form->postLink($this->Html->tag('button',$this->Html->tag('span','', array('class' => 'icon-pencil')).' Editar',array('class' => 'btn btn-default btn-lg')), array('controller' => 'files', 'action' => 'update', $f['files']['id']),array('escape'=>false)); ?>
                    <?php echo $this->Form->postLink($this->Html->tag('button',$this->Html->tag('span','', array('class' => 'icon-remove')).' Eliminar',array('class' => 'btn btn-default btn-lg')), array('controller' => 'files','action' => 'delete', $f['files']['id']),array('escape'=>false),'El archivo '.$f['files']['archivo'].' sera eliminado. ¿Estas seguro?'); ?>
                    <!--<a href="http://misitioweb.com/carpeta_audio?file=nombre_archivo.mp3">Nombre Archivo</a>-->
                    <?php echo $this->Html->link($this->Html->tag('button',$this->Html->tag('span','', array('class' => 'icon-download')).' Descargar',array('class'=>'btn btn-default btn-lg')), array('controller' => 'files', 'action' => 'descargarArchivo', '?' => array('file'=> $f['files']['archivo']) ),array('escape'=>false)); ?>

                    <?php
                    $this->Js->get('#ProductApplicationId')->event(
                        'change',
                        $this->Js->request(
                            array('controller' => 'Products', 'action' => 'consulta'),
                            array(
                                'update' => '#ProductSubapplicationId',
                                'async' => true,
                                'dataExpression' => true,
                                'method' => 'post',
                                'data' => $this->Js->serializeForm(array('isForm' => true, 'inline' => true))
                            )
                        )
                    );
                    ?>

                </div>
            </div>
        </td>
    </tr>

<?php } ?>
    </tbody>

</table>

<br/><br/>
                <div class="form-actions">
                    <?php echo $this->Html->link('Agregar Archivo', array('controller' => 'Files', 'action' => 'add'),array('class'=>'btn btn-warning leftBtn')); ?>
                </div>

            </div>
        </div>
    </div>
</div>
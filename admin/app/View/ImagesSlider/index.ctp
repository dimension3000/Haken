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
            <li class="active">Imagenes del Index</li>
        </ul>
    </div>
</div>
<!--FIN BARRA DE DIRECCIONES-->

<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Imagenes del Index</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12 well-large">

<table class="table table-striped" id="tableProductos">

    <thead>
    <tr>
        <th>Titulo</th>
        <th>Enlace</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>
    </thead>

    <tbody>


<?php foreach($images as $i){ ?>
    <tr>
        <td><?php echo $i['images_sliders']['titulo']; ?></td>
        <td><?php echo $i['images_sliders']['enlace']; ?></td>
        <td><?php if($i['images_sliders']['img']!=null) echo $this->Html->image('/app/webroot/img/slider/'.$i['images_sliders']['img'],array('alt'=>$i['images_sliders']['img'],'width'=>'50px','class'=>'img-rounded','style'=>'width: 50px; height: 50px; border: 2px solid #F89C19;')); ?></td>
        <td>
            <div class="btn-toolbar" role="toolbar">
                <div class="btn-group">
                    <?php echo $this->Form->postLink($this->Html->tag('button',$this->Html->tag('span','', array('class' => 'icon-remove')).' Eliminar',array('class' => 'btn btn-default btn-lg')), array('controller' => 'ImagesSlider','action' => 'delete', $i['images_sliders']['id']),array('escape'=>false),'La imagen '.$i['images_sliders']['img'].' sera eliminada. ¿Estas seguro?'); ?>
                </div>
            </div>
        </td>
    </tr>

<?php } ?>
    </tbody>

</table>

<br/><br/>
                <div class="form-actions">
                    <?php echo $this->Html->link('Agregar Imagen', array('controller' => 'ImagesSlider', 'action' => 'add'),array('class'=>'btn btn-warning leftBtn')); ?>
                </div>

            </div>
        </div>
    </div>
</div>
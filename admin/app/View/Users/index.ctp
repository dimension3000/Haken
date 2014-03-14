<!-- Datatable plugin -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#table_users').dataTable({
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
            <li class="active">Usuarios</li>
        </ul>
    </div>
</div>
<!--FIN BARRA DE DIRECCIONES-->

<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Usuarios</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12 well-large">

<table class="table table-striped" id="table_users">

    <thead>
    <tr>
        <th>Usuario</th>
        <th>Estado</th>
        <th>Acción</th>
    </tr>
    </thead>

    <tbody>
<?php foreach($users1 as $usuarios){ ?>

    <?php if(strcmp($usuarios['User']['estado'],'admin')==0) continue; ?>
    <tr>
        <td><?php echo $usuarios['User']['usuario']; ?></td>
        <td><?php echo $usuarios['User']['estado']; ?></td>

        <td>
            <div class="btn-toolbar" role="toolbar">
                <!--<div class="btn-group">-->
                    <?php echo $this->Form->postLink('<button class="btn btn-warning btn-lg"><span class="icon-tag"></span> Cambiar Estado</button>', array('controller' => 'users','action' => 'estado', $usuarios['User']['id']),array('escape'=>false),'¿Estas seguro que deseas cambiar los permisos de este usuario?'); ?>
                    <?php echo $this->Form->postLink('<button class="btn btn-default btn-lg"><span class="icon-remove"></span> Eliminar</button>', array('controller' => 'users','action' => 'delete', $usuarios['User']['id']),array('escape'=>false),'¿Estas seguro de eliminar a este usuario?'); ?>
                <!--</div>-->
            </div>
        </td>
    </tr>


<?php } ?>
    </tbody>

</table>

<br/><br/>
                <div class="form-actions">
                    <?php echo $this->Html->link('Agregar Usuario', array('controller' => 'users', 'action' => 'add'),array('class'=>'btn btn-warning leftBtn')); ?>
                </div>

            </div>
        </div>
    </div>
</div>
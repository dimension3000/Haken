<!-- Datatable plugin -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tableProyects').dataTable({
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
            <li class="active">Proyectos</li>
        </ul>
    </div>
</div>
<!--FIN BARRA DE DIRECCIONES-->

<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Proyecto</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12 well-large">

                <table class="table table-striped" id="tableProyects">

                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Imagenes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach($proyects as $p): ?>

                            <tr>
                                <td><?php echo $p['proyects']['nombre']; ?></td>
                                <td><?php echo $p['proyects']['descripcion']; ?></td>
                                <td>
                                    <?php foreach($imgs as $img): ?>
                                        <?php if($img['images_proyects']['id_proyect']==$p['proyects']['id'] && $img['images_proyects']['img']!='') echo $this->Html->image('/app/webroot/img/proyects/'.$img['images_proyects']['img'],array('alt'=>$img['images_proyects']['img'],'width'=>'50px','class'=>'img-rounded','style'=>'width: 50px; height: 50px; border: 2px solid #F89C19;')); ?>
                                    <?php endforeach ?>
                                </td>
                                <td style="min-width: 250px">
                                            <?php echo $this->Form->postLink($this->Html->tag('button',$this->Html->tag('span','', array('class' => 'icon-pencil')).' Editar',array('class' => 'btn btn-default btn-lg')), array('controller' => 'Proyects', 'action' => 'update', $p['proyects']['id']),array('escape'=>false)); ?>
                                            <?php echo $this->Form->postLink($this->Html->tag('button',$this->Html->tag('span','', array('class' => 'icon-remove')).' Eliminar',array('class' => 'btn btn-default btn-lg')), array('controller' => 'Proyects','action' => 'delete', $p['proyects']['id']),array('escape'=>false),'¿ Estas seguro que quieres eliminar el proyecto ?'); ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>

                <br/><br/>
                <div class="form-actions">
                    <?php echo $this->Html->link('Agregar Proyecto', array('controller' => 'Proyects', 'action' => 'add'),array('class'=>'btn btn-warning leftBtn')); ?>
                </div>

            </div>
        </div>
    </div>
</div>
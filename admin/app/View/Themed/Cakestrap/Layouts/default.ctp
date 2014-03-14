<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<?php echo $this->Html->docType('html5'); ?> 
<html>
	<head>

        <!--<meta charset="utf-8" />-->
		<?php echo $this->Html->charset(); ?>

		<title>
			<?php /*echo $cakeDescription*/ ?>:
			<?php echo $title_for_layout; ?>
		</title>
		<?php
        echo $this->Html->script('vendors/jquery-1.9.1.min');
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('bootstrap-responsive.min');
        echo $this->Html->css('styles');
        echo $this->Html->css('uniform.default');

        echo $this->fetch('css');
        echo $this->fetch('script');

        //echo $this->Html->script('ckeditorFull/ckeditor');
        echo $this->Html->script('ckeditor/ckeditor');
        echo $this->Html->script('vendors/modernizr-2.6.2-respond-1.1.0.min');
        echo $this->Html->script('vendors/jquery.uniform.min');
        echo $this->Html->script('scripts');

        //DATATABLE PLUGIN
        echo $this->Html->script('datatablePlugin/jquery.dataTables');
        echo $this->Html->script('datatablePlugin/jquery.dataTables.min');
        //echo $this->Html->script('datatablePlugin/shCore');
        //echo $this->Html->css('datatablePlugin/shCore');
        echo $this->Html->css('datatablePlugin/jquery.dataTables');

        //DRAG AND DROP PLUGIN
        echo $this->Html->script('draganddropPlugin/modernizr.custom');
        echo $this->Html->script('draganddropPlugin/script');
        echo $this->Html->css('draganddropPlugin/styleDaD');
        echo $this->Html->script('http://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js');

        //Importar preview.js
        echo $this->Html->script('libs/preview');

        /*Para poder imprimir la cache de jquery (utilizada en campo subaplicaciones de agregar producto)*/
        echo $this->Js->writeBuffer();

		?>

	</head>

	<body>

            <?php if($this->Session->check('User')){ ?>
            <?php echo $this->element('menu/top_menu'); ?>

            <div class="container-fluid">
                <div class="row-fluid">

                    <?php echo $this->element('menu/side_menu') ?>

                    <div class="span9" id="content">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div><!-- /#content .container -->

                </div>

                <hr>

                <footer>
                    <p>&copy; Haken 2014</p>
                </footer>

            </div>

            <!--Mostrando solo la ventana de login en caso que no cumpla el if anterior-->
            <?php } else { ?>
                <div id="login">
                <div class="container">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->element('../Users/login') ?>

                <?php /*echo $this->Html->link('login',array('controller'=>'users','action'=>'login'))*/ ?>
                </div>
                </div>
            <?php } ?>

			
		</div><!-- /#main-container -->


            <?php
            //echo $this->Html->script('vendors/jquery-1.9.1.min');
            echo $this->Html->script('libs/bootstrap.min');
            echo $this->Html->script('scripts');
            ?>

           <script type="text/javascript">
               $(function(){
                   $(".uniform_on").uniform();
               });
            </script>

	</body>

</html>
<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


?>
<!DOCTYPE html>
<html>
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $this->Html->charset(); ?>
        <title>
            Farook College PG Admission | <?php echo $title_for_layout; ?>
        </title>
        <script type="text/javascript">
            var BASEURL = "<?php echo $this->base; ?>";
            
        </script>
        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array('bootstrap.min','style','alert/alert.min','alert/theme.min','bootstrap-datepicker.min'));
        $all_scripts = array('jquery.min','bootstrap.min','alert.min','combodate','moment','bootstrap-datepicker.min');

        echo $this->Html->script($all_scripts);
        echo $this->fetch('script');
        ?> 
    </head>
<body>
    <div class="wrapper">
        <header>
            <div class="container top-bar">
                <div class="col-md-12">
                    <a href="#"><img src="<?php echo $this->webroot; ?>images/logo.jpg"></a>
                </div>

            </div>
            <div class="container zero-padding">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-home"></span>'), "/pages/index", array('escape' => false,'class'=>'navbar-brand')) ?>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                            <?php
                            $this->Session->read('User.name');
                            if(!isset($_SESSION['User']['name'])){
                                
                            ?>
                               
                                <?php } ?>
								
                                <!--<li><?php //echo $this->Html->link(__('INSTRUCTIONS'), "/pages/maininstruction", array('escape' => false)) ?></li>-->
                                <li><?php echo $this->Html->link(__('PROSPECTUS'), "/pages/downloadprospectus", array('escape' => false)) ?></li>
                                <li><?php echo $this->Html->link(__('CONTACT'), "/pages/contact", array('escape' => false)) ?></li>
                            </ul>
                            <?php
                            $this->Session->read('User.name');
                            if(!isset($_SESSION['User']['name'])){
                                
                            ?>
                            
                            <?php } else { ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hello, <?php echo $this->Session->read('User.name');  ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><?php echo $this->Html->link(__('Logout'), "/pages/logout", array('escape' => false)) ?></li>
                                    </ul>
                                </li>
                            </ul>
                            <?php } ?>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </header>
        <div id="content">
              <?php 
                  $flashContent=$this->Session->flash();
                  if($flashContent!=null) {
                      echo "<script type='text/javascript'>$.alert.open('".$flashContent."');</script>";
                  }

              ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>&copy; 2015 Farook College. All Rights are reserved<span class="pull-right">Driven by: <a href="http://www.mentorperformance.com" target="_blank">Mentor Performance Rating Private Limited</a></span</p>

                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
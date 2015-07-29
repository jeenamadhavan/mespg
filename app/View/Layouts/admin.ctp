<head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $this->Html->charset(); ?>
        <title>
            M E S MAMPAD College PG Admission | <?php echo $title_for_layout; ?>
        </title>
        <script type="text/javascript">
            var BASEURL = "<?php echo $this->base; ?>";
            
        </script>
        <?php
        echo $this->Html->meta('icon');
        
        echo $this->Html->css(array('bootstrap.min','style','alert/alert.min','alert/theme.min','jquery.dataTables'));
        $all_scripts = array('jquery.min','bootstrap.min','alert.min','combodate','moment','jquery.dataTables.min');

        echo $this->Html->script($all_scripts);
        echo $this->fetch('script');
        ?>
        <style type="text/css">
        #top-bar {
              background-color: #389226;
        }
        a {
            color: #389226 !important;
        }
        
        </style>
    </head>
<body>
    <div class="wrapper">
        <header>
            
            <div class="container zero-padding">
                <nav class="navbar navbar-inverse" id="top-bar">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-home"></span>'), "/admins/dashboard", array('escape' => false,'class'=>'navbar-brand')) ?>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                            <?php
                             
                            if($this->Session->read('User.admin')==1){
                                
                            ?>
                                <li><?php echo $this->Html->link(__('View Index Details'), "/admins/indexdetails", array('escape' => false)) ?></li>
                                <li><?php echo $this->Html->link(__('Generate PDF'), "/admins/generatecourse", array('escape' => false)) ?></li>
                                    <?php } ?>
                                
                            </ul>
                            <?php
                           
                            if($this->Session->read('User.admin')!=1){
                                
                            ?>
                            <ul class="nav navbar-nav navbar-right">
                               <li><?php echo $this->Html->link(__('LOGIN'), "/admins/adminlogin", array('escape' => false)) ?></li>
                            </ul>
                            <?php } else { ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hello, <?php echo $this->Session->read('User.username');  ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><?php echo $this->Html->link(__('Logout'), "/admins/logout", array('escape' => false)) ?></li>
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

<?php $siteurl = 'https://www.karachizakereen.org'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $header_title ? $header_title . ' - ' : '' ?> Karachi Zakereen Schedules Admin Panel</title>
        <?php $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
        <link rel="canonical" href="<?php echo $actual_link; ?>" />

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <script type="text/javascript">
          WebFontConfig = {
            google: { families: [ 'Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic:latin' ] }
          };
          (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
              '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
          })(); 
        </script>
        
        <link href="<?php echo $siteurl; ?>/schedule/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $siteurl; ?>/site/templates/zakereen/css/template.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $siteurl; ?>/site/templates/zakereen/images/favicon.png" rel="shortcut icon" />
        <link href="<?php echo $siteurl; ?>/schedule/assets/css/datepicker.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $siteurl; ?>/schedule/assets/css/timepicker.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $siteurl; ?>/schedule/assets/css/styles.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $siteurl; ?>/schedule/assets/css/fullcalendar.css" rel="stylesheet" type="text/css">

        <script type="text/javascript"><!--
            var baseUrl = '<?php echo $siteurl ?>/schedule/adminpanel/';
            var routes = <?php echo json_encode(isset($_SESSION['denied_routes']) ? $_SESSION['denied_routes'] : ""); ?>;
        </script>
        <script type="text/javascript" src="<?php echo $siteurl; ?>/schedule/assets/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $siteurl; ?>/schedule/assets/js/datepicker.js"></script>
        <script type="text/javascript" src="<?php echo $siteurl; ?>/schedule/assets/js/timepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo $siteurl; ?>/schedule/assets/js/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo $siteurl; ?>/schedule/assets/js/fullcalendar.js"></script>

    </head>

    <body>
        <div id="wrapper">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 col-sm-4 col-md-4">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <nav class="navbar navbar-default top-navbar navbar-left" role="navigation">
                                    <div class="navbar-header">
                                        <ul class="nav navbar-top-links">
                                            <!-- /.dropdown -->
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    Go to <i class="fa fa-bars"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-user">
                                                    <li><a href="<?php echo CURR_DIR.'adminindex'?>"><span><i class="fa fa-home"></i> Home</span></a></li>
                                                    <li><a href="<?php echo CURR_DIR.'event'?>"><span><i class="fa fa-calendar"></i> Event Management</span></a></li>
                                                    <li><a href="<?php echo CURR_DIR.'eventschedule' ?>"><span><i class="fa fa-clock-o"></i> Time Management</span></a></li>
                                                    <li><a href="<?php echo CURR_DIR.'zakereen'?>"><span><i class="fa fa-calendar-check-o"></i> Schedule Management</span></a></li>
                                                </ul>
                                                <!-- /.dropdown-user -->
                                            </li>
                                            <!-- /.dropdown -->
                                        </ul>
                                    </div>
                                </nav>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-2 col-sm-4 col-md-4"></div>
                        <div class="col-xs-5 col-sm-4 col-md-4">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <nav class="navbar navbar-default top-navbar navbar-right" role="navigation">
                                    <div class="navbar-header">
                                        <ul class="nav navbar-top-links">
                                            <!-- /.dropdown -->
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i> <?php echo substr($_SESSION['user'], 0, 20) . "..."; ?> <i class="caret"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-user">
                                                    <li>
                                                        <a href="<?php echo HTTP_SERVER; ?>logout"><i class="glyphicon glyphicon-off"></i> Logout</a>
                                                    </li>
                                                </ul>
                                                <!-- /.dropdown-user -->
                                            </li>
                                            <!-- /.dropdown -->
                                        </ul>
                                    </div>
                                </nav>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header">
                <div class="header-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                                <div class="logo text-center visible-xs visible-sm">
                                    <a href="<?php echo $siteurl; ?>/schedule" title="Anjuman-e-Zakereen-e-Hussain(A.S) - Karachi - Pakistan">
                                        <img src="<?php echo $siteurl; ?>/site/templates/zakereen/images/logo.png" alt="Anjuman-e-Zakereen-e-Hussain(A.S) - Karachi - Pakistan" />
                                    </a>
                                </div>
                                <div class="logo hidden-xs hidden-sm">
                                    <a href="<?php echo $siteurl; ?>/schedule" title="Anjuman-e-Zakereen-e-Hussain(A.S) - Karachi - Pakistan">
                                        <img src="<?php echo $siteurl; ?>/site/templates/zakereen/images/logo.png" alt="Anjuman-e-Zakereen-e-Hussain(A.S) - Karachi - Pakistan" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="main">
                        <div class="inner-body col-md-12">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                
                            <?php endif; ?>    
                            <div id="page-wrapper">
                                <?php echo $yield ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer-icon"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            &nbsp;&nbsp;
                        </div>
                    </div>
                </div>
            </div>
            <div class="bott-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <div class="copyright">
                                &copy; <?php echo date('Y'); ?> Anjuman-e-Zakereen-e-Hussain (AS) Karachi - Site by <a href="http://www.bohradevelopers.com/" target="_blank">Bohradevelopers</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script type="text/javascript" src="<?php echo $siteurl; ?>/schedule/assets/js/jquery-ui.min.js"></script> -->
        <script type="text/javascript" src="<?php echo $siteurl; ?>/schedule/assets/js/bootstrap.min.js"></script>
        <!-- <script type="text/javascript" src="<?php echo $siteurl; ?>/schedule/assets/js/bootstrap.datepicker.en.js"></script> -->
        <!-- <script src="<?php //echo $siteurl; ?>/schedule/assets/js/script.js"></script> -->
        <script src="<?php echo $siteurl; ?>/schedule/assets/js/script.js"></script>
    </body>
</html>
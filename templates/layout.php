<?php 
    $siteurl = 'https://www.karachizakereen.org/site';
    $scheduleurl = 'http://localhost:5053/karachizakereen/';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Anjuman-e-Zakereen-e-Hussain(A.S) - Karachi - Pakistan</title>
        <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
        <link rel="canonical" href="<?php echo $actual_link; ?>" />
        <meta property="og:locale" content="en_PK" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Anjuman-e-Zakereen-e-Hussain (A.S) - Karachi - Pakistan" />
        <meta property="og:description" content="Check Your Schedules Online Now at KarachiZakereen.org - Only For Karachi Zakereen">
        <meta property="og:site_name" content="Karachi Zakereen Online Schedule" />
        <meta property="og:url" content="<?php echo $scheduleurl; ?>" />
        <meta property="og:image" content="<?php echo $scheduleurl; ?>assets/images/site-icon.png">
        <meta property="og:image:alt" content="Karachi Zakereen Online Schedule" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:description" content="Check Your Schedules Online Now at KarachiZakereen.org - Only For Karachi Zakereen" />
        <meta name="twitter:title" content="Anjuman-e-Zakereen-e-Hussain (A.S) - Karachi - Pakistan" />
        <meta name="twitter:image" content="<?php echo $scheduleurl; ?>assets/images/site-icon.png" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css" />
        <link href="<?php echo $siteurl; ?>/templates/zakereen/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $siteurl; ?>/templates/zakereen/css/template.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $scheduleurl; ?>assets/css/datepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $scheduleurl; ?>assets/css/timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo $siteurl; ?>/templates/zakereen/images/favicon.png" />
        <script type="text/javascript" src="<?php echo $scheduleurl; ?>assets/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $scheduleurl; ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $scheduleurl; ?>assets/js/datepicker.js"></script>
        <script type="text/javascript" src="<?php echo $scheduleurl; ?>assets/js/timepicker.min.js"></script>
        <script type="text/javascript" src="<?php echo $scheduleurl; ?>assets/js/script.js"></script>
    </head>

    <body>

        <div class="wrapper">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 text-right">
                            &nbsp;&nbsp;
                        </div>
                    </div>
                </div>
            </div>
            <div class="header">
                <div class="header-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                                <div class="logo">
                                    <a href="<?php echo $scheduleurl; ?>" title="Anjuman-e-Zakereen-e-Hussain (A.S) - Karachi - Pakistan">
                                        <img src="<?php echo $siteurl; ?>/templates/zakereen/images/logo.png" alt="Anjuman-e-Zakereen-e-Hussain(A.S) - Karachi - Pakistan" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="main">
                        <div class="inner-body col-md-12">
                            <h1>Karachi Zakereen Schedules</h1>
                            <h2>Karachi Zakereen Schedules</h2>
        
                            <?php echo $yield ?>
                            <script type="text/javascript"><!--
                                var baseUrl = '<?php echo HTTP_SERVER ?>';
                                <?php
                                if (!empty($aVarScript)) {
                                    foreach ($aVarScript as $sScript) {
                                        echo $sScript . "\n";
                                    }
                                }
                                ?>
                            //-->
                            </script>

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
    </body>
</html>
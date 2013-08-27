<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/jquery.min.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/bootstrap.min.js", CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/common.js", CClientScript::POS_END);

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/bootstrap.min.css");
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/bootstrap-responsive.min.css");
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/font-awesome.min.css");
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/jquery.rating.css");
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/style.css");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="<?php echo Yii::app()->baseUrl; ?>/js/html5shiv.js"></script>
        <![endif]-->

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome-ie7.min.css">
        <![endif]-->

        <!-- Fav icon -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.png">

        <style>
            .hero-unit {
                padding: 30px;
            }

            .hero-unit h1 {
                font-size: 40px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row"><!-- start header -->
                <div class="span12 logo">
                    <a href="<?php echo $this->createUrl('/'); ?>">
                        <img alt="<?php echo Yii::app()->name; ?>" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-home.png" />
                    </a>
                </div>
            </div><!-- end header -->

            <div class="hero-unit">
                <?php if($this->getUniqueId() == 'install/step1'): ?>
                <h1><?php echo Yii::t('install', 'Step 1 - License'); ?></h1>
                <?php elseif($this->getUniqueId() == 'install/step2'): ?>
                <h1><?php echo Yii::t('install', 'Step 2 - Pre-Installation'); ?></h1>
                <?php elseif($this->getUniqueId() == 'install/step3'): ?>
                <h1><?php echo Yii::t('install', 'Step 3 - Configuration'); ?></h1>
                <?php elseif($this->getUniqueId() == 'install/step4'): ?>
                <h1><?php echo Yii::t('install', 'Step 4 - Finished'); ?></h1>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="span8">
                    <?php echo $content; ?>
                </div>
                <div class="span4">
                    <ul class="nav nav-list">
                        <li class="nav-header">Steps</li>
                        <li <?php if($this->getUniqueId() == 'install/step1'): ?>class="active"<?php endif; ?>><a><?php echo Yii::t('install', 'License'); ?></a></li>
                        <li <?php if($this->getUniqueId() == 'install/step2'): ?>class="active"<?php endif; ?>><a><?php echo Yii::t('install', 'Pre-Installation'); ?></a></li>
                        <li <?php if($this->getUniqueId() == 'install/step3'): ?>class="active"<?php endif; ?>><a><?php echo Yii::t('install', 'Configuration'); ?></a></li>
                        <li <?php if($this->getUniqueId() == 'install/step4'): ?>class="active"<?php endif; ?>><a><?php echo Yii::t('install', 'Finished'); ?></a></li>
                    </ul>
                </div>
            </div>

            <footer>
                <hr />
                <ul class="nav nav-pills span6">
                    <li><a href="https://github.com/damnpoet/yiicart">Project Homepage</a></li>
                    <li><a href="https://github.com/damnpoet/yiicart/wiki">Wiki</a></li>
                    <li><a href="https://github.com/damnpoet/yiicart/issues">Issues & bug reporting</a></li>
                </ul>
            </footer>

        </div> <!-- /container -->
    </body>
</html>

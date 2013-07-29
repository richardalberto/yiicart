<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/admin.css" rel="stylesheet" />

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="<?php echo Yii::app()->baseUrl; ?>/js/html5shiv.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css">
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome-ie7.min.css">
        <![endif]-->

        <!-- Fav icon -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.png">
        
        <!-- Le javascript -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/common.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a href="#" class="brand"><img alt="<?php echo Yii::app()->name; ?>" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-admin.png" /></a>
                        <div class="nav-collapse">
                            <ul class="nav">
                                <li <?php if($this->action->getController()->getId() == "default"): ?>class="active"<?php endif; ?>><a href="<?php echo $this->createUrl('/admin'); ?>"><?php echo Yii::t('admin', 'Dashboard'); ?></a></li>
                                <li class="dropdown <?php if($this->action->getController()->getId() == "products" || $this->action->getController()->getId() == "categories" || $this->action->getController()->getId() == "manufacturers" || $this->action->getController()->getId() == "attributes" || $this->action->getController()->getId() == "attributeGroups"): ?>active<?php endif; ?>">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Catalog <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('/admin/categories'); ?>">Categories</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/products'); ?>">Products</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/filters'); ?>">Filters</a></li>
                                        <li class="divider"></li>
                                        <li class="nav-header"><?php echo Yii::t('attributes', 'Attributes'); ?></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/attributes'); ?>">Attributes</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/attributeGroups'); ?>">Attributes Groups</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/options'); ?>">Options</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/manufacturers'); ?>">Manufacturers</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/downloads'); ?>">Downloads</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/reviews'); ?>">Reviews</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/information'); ?>">Information</a></li>
                                    </ul>
                                </li>
                                <!--
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Extensions <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('/admin/modules'); ?>">Modules</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/shipping'); ?>">Shipping</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/payment'); ?>">Payment</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/totals'); ?>">Order totals</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/feeds'); ?>">Product Feeds</a></li>
                                    </ul>
                                </li>
                                -->
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo Yii::t('admin', 'Sales'); ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('/admin/orders'); ?>">Orders</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/returns'); ?>">Returns</a></li>
                                        <li class="divider"></li>
                                        <li class="nav-header"><?php echo Yii::t('customers', 'Customers'); ?></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/customers'); ?>">Customers</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/customerGroups'); ?>">Customer Groups</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/customerBanIP'); ?>">Banned IP</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/affiliates'); ?>">Affiliates</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/coupons'); ?>">Coupons</a></li>
                                        <li class="divider"></li>
                                        <li class="nav-header"><?php echo Yii::t('giftVouchers', 'Gift Vouchers'); ?></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/giftVouchers'); ?>"><?php echo Yii::t('giftVouchers', 'Gift Vouchers'); ?></a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/giftVoucherThemes'); ?>"><?php echo Yii::t('giftVouchers', 'Voucher Themes'); ?></a></li>
                                        <!--<li class="divider"></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/mail'); ?>">Mail</a></li>-->
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">System <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('/admin/settings'); ?>">Settings</a></li>
                                        <li class="divider"></li>
                                        <li class="nav-header"><?php echo Yii::t('design', 'Design'); ?></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/designLayouts'); ?>">Layouts</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/banners'); ?>">Banners</a></li>
                                        <li class="divider"></li>
                                        <li class="nav-header"><?php echo Yii::t('users', 'Users'); ?></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/users'); ?>">Users</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/userGroups'); ?>">User Groups</a></li>
                                        <li class="divider"></li>
                                        <li class="nav-header"><?php echo Yii::t('localization', 'Localization'); ?></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/languages'); ?>">Languages</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/currencies'); ?>">Currencies</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/stockStatuses'); ?>">Stock Statuses</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/orderStatuses'); ?>">Order Statuses</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/returnStatuses'); ?>">Return Statuses</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/returnActions'); ?>">Return Actions</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/returnReasons'); ?>">Return Reasons</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/countries'); ?>">Countries</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/zones'); ?>">Zones</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/geoZones'); ?>">Geo Zones</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/taxClasses'); ?>">Tax Classes</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/taxRates'); ?>">Tax Rates</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/lengthClasses'); ?>">Length Classes</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/weightClasses'); ?>">Weight Classes</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/errorLogs'); ?>">Error logs</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/backup'); ?>">Backup / Restore</a></li>
                                    </ul>
                                </li>
                                <!--
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Reports <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('/admin/reports/sales'); ?>">Sales</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/reports/products'); ?>">Products</a></li>                                        
                                        <li><a href="<?php echo $this->createUrl('/admin/affiliates'); ?>">Affiliates</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/coupons'); ?>">Coupons</a></li>                                        
                                        <li><a href="<?php echo $this->createUrl('/admin/mail'); ?>">Mail</a></li>
                                    </ul>
                                </li>
                                -->
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo Yii::t('help', 'Help'); ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="https://github.com/damnpoet/yiicart"><?php echo Yii::t('help', 'Github Page'); ?></a></li>
                                        <li class="divider"></li>
                                        <li class="nav-header"><?php echo Yii::t('admin', 'Contribute'); ?></li>
                                        <li><a href="https://github.com/damnpoet/yiicart/pulls"><?php echo Yii::t('help', 'Pull request'); ?></a></li>
                                        <li><a href="https://github.com/damnpoet/yiicart/issues"><?php echo Yii::t('help', 'Report issues'); ?></a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav pull-right">
                                <li><a href="<?php echo $this->createUrl('/'); ?>"><?php echo Yii::t('help', 'Store Front'); ?></a></li>
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a class="" href="<?php echo $this->createUrl('/site/logout'); ?>"><?php echo Yii::t('site', 'Logout'); ?></a>
                                </li>
                            </ul>
                        </div><!-- /.nav-collapse -->
                    </div>
                </div>
            </div>

            <?php if (isset($this->breadcrumbs) && count($this->breadcrumbs)): ?>
                <ul class="breadcrumb">
                    <li><a href="<?php echo $this->createUrl('/admin'); ?>"><?php echo Yii::t('common', 'Home'); ?></a> <span class="divider">/</span></li>
                    <?php foreach ($this->breadcrumbs as $breadcrumb): ?>
                        <?php if ($breadcrumb == end($this->breadcrumbs)): ?>
                            <li class="active"><?php echo $breadcrumb; ?></li>
                        <?php else: ?>
                            <li><a href="#"><?php echo $breadcrumb; ?></a> <span class="divider">/</span></li>
                        <?php endif; ?>
                    <?php endforeach; ?><!-- breadcrumbs -->
                </ul>
            <?php endif ?>

            <?php echo $content; ?>

            <hr />

            <div class="footer">
                <p>YiiCart &copy; 2013 All Rights Reserved.</p>
                <p>Version 0.0.0.1</p>
            </div>

        </div> <!-- /container -->
        
    </body>
</html>
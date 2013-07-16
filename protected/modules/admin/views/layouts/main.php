<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet" />
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/admin.css" rel="stylesheet" />

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="<?php echo Yii::app()->baseUrl; ?>/js/html5shiv.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome.min.css">
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/font-awesome-ie7.min.css">
        <![endif]-->

        <!-- Fav icon -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/ico/favicon.png">
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
                        <a href="#" class="brand"><?php echo Yii::app()->name; ?></a>
                        <div class="nav-collapse">
                            <ul class="nav">
                                <li class="active"><a href="<?php echo $this->createUrl('/admin'); ?>">Dashboard</a></li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Catalog <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('/admin/categories'); ?>">Categories</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/products'); ?>">Products</a></li>
                                        <!--<li><a href="<?php echo $this->createUrl('/admin/filters'); ?>">Filters</a></li>-->
                                        <!--<li><a href="<?php echo $this->createUrl('/admin/attributes'); ?>">Attributes</a></li>-->
                                        <!--<li><a href="<?php echo $this->createUrl('/admin/options'); ?>">Options</a></li>-->
                                        <li><a href="<?php echo $this->createUrl('/admin/manufacturers'); ?>">Manufacturers</a></li>
                                        <!--<li><a href="<?php echo $this->createUrl('/admin/downloads'); ?>">Downloads</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/reviews'); ?>">Reviews</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/information'); ?>">Information</a></li>-->
                                    </ul>
                                </li>
                                <!--<li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Extensions <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('/admin/modules'); ?>">Modules</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/shipping'); ?>">Shipping</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/payment'); ?>">Payment</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/totals'); ?>">Order totals</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/feeds'); ?>">Product Feeds</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Sales <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('/admin/orders'); ?>">Orders</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/returns'); ?>">Returns</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/customers'); ?>">Customers</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/affiliates'); ?>">Affiliates</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/coupons'); ?>">Coupons</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/giftVouchers'); ?>">Gift Vouches</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/mail'); ?>">Mail</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">System <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('/admin/settings'); ?>">Settings</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/design'); ?>">Design</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/users'); ?>">Users</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/localization'); ?>">Localization</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/logs'); ?>">Error logs</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/backup'); ?>">Backup / Restore</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Reports <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo $this->createUrl('/admin/reports/sales'); ?>">Sales</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/reports/products'); ?>">Products</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/reports/customers'); ?>">Customers</a></li>
                                        <li><a href="<?php echo $this->createUrl('/admin/reports/affiliates'); ?>">Affiliates</a></li>
                                    </ul>
                                </li>-->
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Help <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="https://github.com/damnpoet/yiicart">Github Page</a></li>
                                        <li class="divider"></li>
                                        <li class="nav-header">Contribute</li>
                                        <li><a href="https://github.com/damnpoet/yiicart/pulls">Pull request</a></li>
                                        <li><a href="https://github.com/damnpoet/yiicart/issues">Report issues</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav pull-right">
                                <li><a href="<?php echo $this->createUrl('/'); ?>">Store Front</a></li>
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                    <a class="" href="<?php echo $this->createUrl('/site/logout'); ?>">Logout</a>
                                </li>
                            </ul>
                        </div><!-- /.nav-collapse -->
                    </div>
                </div>
            </div>

            <?php if (isset($this->breadcrumbs) && count($this->breadcrumbs)): ?>
                <ul class="breadcrumb">
                    <li><a href="<?php echo $this->createUrl('/admin'); ?>"><?php echo Yii::t('views.layout.main', 'Home'); ?></a> <span class="divider">/</span></li>
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
                <p>&copy; YiiCart 2013</p>
            </div>

        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>
    </body>
</html>

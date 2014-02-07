<?php
    $vars = array(
        'cartUrl' => $this->createUrl('/shoppingCart'),
        'wishlistUrl' => $this->createUrl('/wishlist'),
        'compareUrl' => $this->createUrl('/compare'),
    );
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/bootstrap.min.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/bootstrap-responsive.min.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/font-awesome.min.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/jquery.rating.css");
    Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . "/css/style.css");
	Yii::app()->clientScript->registerScript('vars', 'var urls = ' . CJavaScript::encode($vars) . ';',
		CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/jquery.min.js", CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/bootstrap.min.js", CClientScript::POS_END);
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/common.js", CClientScript::POS_END);
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
    </head>
    <body>
        <div class="container">
            <div class="row"><!-- start header -->
                <div class="span4 logo">
                    <a href="<?php echo $this->createUrl('/'); ?>">
                        <img alt="<?php echo Yii::app()->name; ?>" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-home.png" />
                    </a>
                </div>
                <div class="span8">

                    <div class="row">
                        <div class="span1">&nbsp;</div>
                        <div class="span2">
                            <!--
                            <h4>Currency</h4>
                            <a href="#">USD</a> |
                            <a href="#"><strong>GBP</strong></a> |
                            <a href="#">EUR</a>
                            -->
                        </div>
                        <div class="span2">
                            <h4><?php echo Yii::t('shoppingCart', 'Shopping Cart'); ?></h4>
                            <a href="<?php echo $this->createUrl('/shoppingCart'); ?>" id="cart-total"><?php echo Yii::app()->customer->getShoppingCart()->countProducts(); ?> <?php echo Yii::t('shoppingCart', 'item(s)'); ?> - <?php echo Yii::app()->customer->getShoppingCart()->getTotalPrice(); ?></a>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="links pull-right">
                            <a href="<?php echo $this->createUrl('/'); ?>"><?php echo Yii::t('main', 'Home'); ?></a> |
                            <a href="<?php echo $this->createUrl('/site/about'); ?>"><?php echo Yii::t('main', 'Wish List'); ?></a> |
                            <a href="<?php echo $this->createUrl('/account'); ?>"><?php echo Yii::t('main', 'My Account'); ?></a> |
                            <a href="<?php echo $this->createUrl('/shoppingCart'); ?>"><?php echo Yii::t('main', 'Shopping Cart'); ?></a> |
                            <a href="<?php echo $this->createUrl('/site/contact'); ?>"><?php echo Yii::t('main', 'Checkout'); ?></a>
                        </div>

                    </div>
                </div>
            </div><!-- end header -->

            <div class="row"><!-- start nav -->
                <div class="span12">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="nav-collapse">
                                <ul class="nav">
                                    <?php $categories = Category::model()->firstLevel()->onTop()->active()->orderBySortOrder()->findAll(); ?>
                                    <?php foreach ($categories as $category): ?>
                                        <?php if (!$category->hasProducts())
                                            continue; ?>
                                        <li class="dropdown">
                                            <?php if ($category->hasChildCategories()): ?>
                                                <a href="<?php echo $this->createUrl('/category/view', array('id' => $category->category_id)); ?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category->description->name; ?> <i class="icon-caret-down"></i></a>
                                                <ul class="dropdown-menu">
                                                    <?php foreach ($category->childCategories as $childCategory): ?>
                                                        <li><a href="<?php echo $this->createUrl('/category/view', array('id' => $childCategory->category_id)); ?>"><?php echo $childCategory->description->name; ?></a></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php else: ?>
                                                <a href="<?php echo $this->createUrl('/category/view', array('id' => $category->category_id)); ?>"><?php echo $category->description->name; ?></a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div><!-- /.nav-collapse -->
                        </div><!-- /navbar-inner -->
                    </div><!-- /navbar -->
                </div>
            </div><!-- end nav -->
            <?php echo $content; ?>
            <footer>
                <hr />
                <div class="row well no_margin_left">

                    <?php if(count($this->informations) > 0): ?>
                    <div class="span3">
                        <h4><?php echo Yii::t('footer', 'Information'); ?></h4>
                        <ul>
                            <?php foreach($this->informations as $information): ?>
                            <li><a href="<?php echo $this->createUrl('/information/view', array('id'=>$information->information_id)); ?>"><?php echo $information->description->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="span3">
                        <h4><?php echo Yii::t('footer', 'Customer Service'); ?></h4>
                        <ul>
                            <li><a href="<?php echo $this->createUrl('/site/contact'); ?>"><?php echo Yii::t('footer', 'Contact Us'); ?></a></li>
                            <li><a href="<?php echo $this->createUrl('/returns'); ?>"><?php echo Yii::t('footer', 'Returns'); ?></a></li>
                            <li><a href="<?php echo $this->createUrl('/site/map'); ?>"><?php echo Yii::t('footer', 'Site Map'); ?></a></li>
                        </ul>
                    </div>
                    <div class="span3">
                        <h4><?php echo Yii::t('footer', 'Extras'); ?></h4>
                        <ul>
                            <li><a href="<?php echo $this->createUrl('/manufacturers'); ?>"><?php echo Yii::t('footer', 'Brands'); ?></a></li>
                            <li><a href="<?php echo $this->createUrl('/account/vouchers'); ?>"><?php echo Yii::t('footer', 'Gift Vouchers'); ?></a></li>
                            <li><a href="<?php echo $this->createUrl('/affiliates'); ?>"><?php echo Yii::t('footer', 'Affiliates'); ?></a></li>
                            <li><a href="<?php echo $this->createUrl('/products/specials'); ?>"><?php echo Yii::t('footer', 'Specials'); ?></a></li>
                        </ul>
                    </div>
                    <div class="span2">
                        <h4><?php echo Yii::t('footer', 'My Account'); ?></h4>
                        <ul>
                            <li><a href="<?php echo $this->createUrl('/account'); ?>"><?php echo Yii::t('footer', 'My Account'); ?></a></li>
                            <li><a href="<?php echo $this->createUrl('/orders'); ?>"><?php echo Yii::t('footer', 'Order History'); ?></a></li>
                            <li><a href="<?php echo $this->createUrl('/wishlist'); ?>"><?php echo Yii::t('footer', 'Wish List'); ?></a></li>
                            <li><a href="<?php echo $this->createUrl('/newsletter'); ?>"><?php echo Yii::t('footer', 'Newsletter'); ?></a></li>
                        </ul>
                    </div>
            </footer>
        </div> <!-- /container -->
    </body>
</html>

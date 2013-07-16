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
        <link href="<?php echo Yii::app()->baseUrl; ?>/css/style.css" rel="stylesheet" />

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="<?php echo Yii::app()->baseUrl; ?>/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav icon -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/ico/favicon.png">
    </head>

    <body>

        <div class="container">
            <div class="row"><!-- start header -->
                <div class="span4 logo">
                    <a href="index.html">
                        <h1><?php echo Yii::app()->name; ?></h1>
                    </a>
                </div>
                <div class="span8">

                    <div class="row">
                        <div class="span1">&nbsp;</div>
                        <div class="span2">
                            <h4>Currency</h4>
                            <a href="#">USD</a> |
                            <a href="#"><strong>GBP</strong></a> |
                            <a href="#">EUR</a>
                        </div>
                        <div class="span2">
                            <a href="cart.html"><h4>Shopping Cart (3)</h4></a>
                            <a href="cart.html">2 item(s) - $40.00</a>
                        </div>					
                        <div class="span3 customer_service">
                            <h4>FREE delivery on ALL orders</h4>
                            <h4><small>Customer service: 0800 8475 548</small></h4>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="links pull-right">
                            <a href="index.html">Home</a> |
                            <a href="my_account.html">My Account</a> |
                            <a href="cart.html">Shopping Cart</a> |
                            <a href="two-column.html">About</a> |
                            <a href="contact.html">Contact</a>
                        </div>

                    </div>
                </div>
            </div><!-- end header -->

            <div class="row"><!-- start nav -->
                <div class="span12">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container" style="width: auto;">
                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>

                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <div class="nav-collapse">
                                    <ul class="nav">
                                        <?php $categories = Category::model()->firstLevel()->active()->findAll(); ?>
                                        <?php foreach($categories as $category): ?>
                                        <li class="dropdown">
                                            <a href="category.html" class="dropdown-toggle" data-toggle="dropdown"><?php echo $category->description->name; ?> <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="listings.html">PC</a></li>
                                                <li><a href="listings.html">Mac</a></li>
                                                <li class="divider"></li>
                                                <li class="nav-header">Accessories</li>
                                                <li><a href="listings.html">Keyboard</a></li>
                                                <li><a href="listings.html">Speakers</a></li>
                                            </ul>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>

                                    <ul class="nav pull-right">
                                        <li class="divider-vertical"></li>
                                        <form class="navbar-search" action="">
                                            <input type="text" class="search-query span2" placeholder="Search">
                                            <button class="btn btn-primary btn-small search_btn" type="submit">Go</button>
                                        </form>

                                    </ul>
                                </div><!-- /.nav-collapse -->
                            </div>
                        </div><!-- /navbar-inner -->
                    </div><!-- /navbar -->
                </div>
            </div><!-- end nav -->	 <div class="row">
                <div class="span3">
                    <!-- start sidebar -->
                    <ul class="breadcrumb">
                        <li>Categories</span></li>
                    </ul>
                    <div class="span3 product_list">
                        <ul class="nav">
                            <li>
                                <a class="active" href="category.html">Desktops (12)</a>
                                <ul>
                                    <li><a href="listings.html"> - PC (11)</a></li>
                                    <li><a class="active" href="listings.html"> - Mac (1)</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="category.html">Laptops &amp; Notebooks (5)</a>
                                <ul>
                                    <li><a href="listings.html"> - Macs (0)</a></li>
                                    <li><a href="listings.html"> - Windows (0)</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="category.html">Components (2)</a>
                                <ul>
                                    <li><a href="listings.html"> - Mice and Trackballs (0)</a></li>
                                    <li><a href="listings.html"> - Monitors (2)</a></li>
                                    <li><a href="listings.html"> - Printers (0)</a></li>
                                    <li><a href="listings.html"> - Scanners (0)</a></li>
                                    <li><a href="listings.html"> - Web Cameras (0)</a></li>
                                </ul>
                            </li>
                            <li><a href="category.html">Tablets (1)</a></li>
                            <li><a href="category.html">Software (0)</a></li>
                            <li><a href="category.html">Phones &amp; PDAs (3)</a></li>
                            <li><a href="category.html">Cameras (2)</a></li>
                        </ul>
                    </div><!-- end sidebar -->		</div>
                <div class="span9">

                    <div id="myCarousel" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="css/images/carousel_1.jpg" alt="">
                                <div class="carousel-caption">
                                    <h4>First Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>

                            </div>
                            <div class="item">
                                <img src="css/images/carousel_2.jpg" alt="">
                                <div class="carousel-caption">
                                    <h4>Second Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="css/images/carousel_3.jpg" alt="">
                                <div class="carousel-caption">
                                    <h4>Third Thumbnail label</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                </div>
                            </div>
                        </div>

                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                    </div>
                </div>



                <div class="span7 popular_products">
                    <h4>Popular products</h4><br />
                    <ul class="thumbnails">

                        <li class="span2">
                            <div class="thumbnail">
                                <a href="product.html"><img alt="" src="css/images/ps-vita-150cx123.jpg" /></a>
                                <div class="caption">
                                    <a href="product.html"> <h5>PS Vita</h5></a>  Price: &#36;50.00<br /><br />
                                </div>
                            </div>
                        </li>

                        <li class="span2">
                            <div class="thumbnail">
                                <a href="product.html"><img alt="" src="css/images/nexus-one-3-150x123.jpg" /></a>
                                <div class="caption">
                                    <a href="product.html"> <h5>Nexus one</h5></a>  Price: &#36;50.00<br /><br />
                                </div>
                            </div>
                        </li>

                        <li class="span2">
                            <div class="thumbnail">
                                <a href="product.html"><img alt="" src="css/images/thumb_sam_3d.jpg" /></a>
                                <div class="caption">
                                    <a href="product.html"> <h5>Samsung 3D TV</h5></a>  Price: &#36;50.00<br /><br />
                                </div>
                            </div>
                        </li>

                        <li class="span2">
                            <div class="thumbnail">
                                <a href="product.html"><img alt="" src="css/images/ipad_case.jpg" /></a>
                                <div class="caption">
                                    <a href="product.html"> <h5>iPod Case</h5></a>  Price: &#36;50.00<br /><br />
                                </div>
                            </div>
                        </li>

                        <li class="span2">
                            <div class="thumbnail">
                                <a href="product.html"><img alt="" src="css/images/HMX-H104.JPG" /></a>
                                <div class="caption">
                                    <a href="product.html"> <h5>HMX Camcorder</h5></a>  Price: &#36;50.00<br /><br />
                                </div>
                            </div>
                        </li>

                        <li class="span2">
                            <div class="thumbnail">
                                <a href="product.html"><img alt="" src="css/images/expic.png" /></a>
                                <div class="caption">
                                    <a href="product.html"> <h5>Kindle Fire</h5></a>  Price: &#36;50.00<br /><br />
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="span2">

                    <div class="roe">
                        <h4>Newsletter</h4><br />
                        <p>Sign up for our weekly newsletter and stay up-to-date with the latest offers, and newest products.</p>

                        <form class="form-search">
                            <input type="text" class="span2" placeholder="Enter your email" /><br /><br />
                            <button type="submit" class="btn pull-right">Subscribe</button>
                        </form>
                    </div><br /><br />
                    <a href="#"><img alt="" title="" src="css/images/paypal_mc_visa_amex_disc_150x139.gif" /></a>
                    <a href="#"><img alt="" src="css/images/bnr_nowAccepting_150x60.gif" /></a>

                </div>

            </div><footer>
                <hr />
                <div class="row well no_margin_left">

                    <div class="span3">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="two-column.html">About Us</a></li>
                            <li><a href="typography.html">Delivery Information</a></li>
                            <li><a href="typography.html">Privacy Policy</a></li>
                            <li><a href="typography.html">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                    <div class="span3">
                        <h4>Customer Service</h4>
                        <ul>
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="typography.html">Returns</a></li>
                            <li><a href="typography.html">Site Map</a></li>
                        </ul>
                    </div>
                    <div class="span3">
                        <h4>Extras</h4>
                        <ul>
                            <li><a href="typography.html">Brands</a></li>
                            <li><a href="typography.html">Gift Vouchers</a></li>
                            <li><a href="typography.html">Affiliates</a></li>
                            <li><a href="typography.html">Specials</a></li>
                        </ul>
                    </div>
                    <div class="span2">
                        <h4>My Account</h4>
                        <ul>
                            <li><a href="my_account.html">My Account</a></li>
                            <li><a href="typography.html">Order History</a></li>
                            <li><a href="typography.html">Wish List</a></li>
                            <li><a href="typography.html">Newsletter</a></li>
                        </ul>
                    </div>

            </footer>

        </div> <!-- /container -->


        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>
    </body>
</html>

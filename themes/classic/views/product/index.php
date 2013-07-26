<div class="span9">
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Audio</a> <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">MP3 players</a>
        </li>
    </ul>


    <div class="row">
        <div class="span9">
            <h1><?php echo $product->description->name; ?></h1>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="span3">
            <img src="<?php echo $product->getImageWithSize(220, 220); ?>" alt="">
            <?php if ($product->hasAdditionalImages()): ?>
                <ul class="thumbnails">
                    <?php foreach ($product->additionalImages as $image): ?>
                        <li class="span1">
                            <a class="thumbnail" href="#">
                                <img alt="" src="<?php echo $image->getImageWithSize(50, 50); ?>" />
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

        </div>	 

        <div class="span6">

            <div class="span6">
                <address>
                    <?php if (isset($product->manufacturer)): ?><strong>Brand:</strong> <span><?php echo $product->manufacturer->name; ?></span><br><?php endif; ?>
                    <strong>Product Code:</strong> <span><?php echo $product->model; ?></span><br>
                    <!--<strong>Reward Points:</strong> <span>0</span><br>-->
                    <strong>Availability:</strong> <span><?php echo $product->stockStatus->name; ?></span><br>
                </address>
            </div>	

            <div class="span6">
                <h2>
                    <strong>Price: <?php echo $product->getFormattedPrice(); ?></strong> <!--<small>Ex Tax: $500.00</small>--><br><br>
                </h2>
            </div>	

            <div class="span6">
                <form class="form-inline">
                    <div class="span3 no_margin_left">
                        <label>Qty:</label>
                        <input type="text" placeholder="1" class="span1">
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </div>	
                    <!--
                    <div class="span1">
                        - OR -
                    </div>	
                    <div class="span2">
                        <p><a href="#">Add to Wish List</a></p>
                        <p><a href="compare.html">Add to Compare</a></p>
                    </div>	
                    -->
                </form>
            </div>	

            <div class="span6">
                <!--
                <p>
                    <input name="star1" type="radio" class="star"/>
                    <input name="star1" type="radio" class="star"/>
                    <input name="star1" type="radio" class="star"/>
                    <input name="star1" type="radio" class="star"/>
                    <input name="star1" type="radio" class="star"/>&nbsp;&nbsp;

                    <a href="#">0 reviews</a>  |  <a href="#">Write a review</a>
                </p>
                -->
            </div>	


        </div>	


    </div>
    <hr>
    <div class="row">
        <div class="span9">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#1">Description</a></li>
                    <!--<li><a data-toggle="tab" href="#2">Reviews</a></li>
                    <li><a data-toggle="tab" href="#3">Related products</a></li>-->
                </ul>
                <div class="tab-content">
                    <div id="1" class="tab-pane active">
                        <?php echo $product->description->getDescription(); ?>
                    </div>
                    <div id="2" class="tab-pane">
                        <p>There are no reviews for this product.</p>
                    </div>    
                    <div id="3" class="tab-pane">
                        <ul class="thumbnails related_products">

                            <li class="span2">
                                <div class="thumbnail">
                                    <a href="product.html"><img src="http://placehold.it/220x180" alt=""></a>
                                    <div class="caption">
                                        <a href="product.html"> <h5>iPod Touch</h5></a>  Price: $50.00<br><br>
                                    </div>
                                </div>
                            </li>

                            <li class="span2">
                                <div class="thumbnail">
                                    <a href="product.html"><img src="http://placehold.it/220x180" alt=""></a>
                                    <div class="caption">
                                        <a href="product.html"> <h5>iPod Touch</h5></a>  Price: $50.00<br><br>
                                    </div>
                                </div>
                            </li>

                            <li class="span2">
                                <div class="thumbnail">
                                    <a href="product.html"><img src="http://placehold.it/220x180" alt=""></a>
                                    <div class="caption">
                                        <a href="product.html"> <h5>iPod Touch</h5></a>  Price: $50.00<br><br>
                                    </div>
                                </div>
                            </li>

                            <li class="span2">
                                <div class="thumbnail">
                                    <a href="product.html"><img src="http://placehold.it/220x180" alt=""></a>
                                    <div class="caption">
                                        <a href="product.html"> <h5>iPod Touch</h5></a>  Price: $50.00<br><br>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
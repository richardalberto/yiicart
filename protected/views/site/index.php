
<div class="span3">
    <!-- start sidebar -->
    <ul class="breadcrumb">
        <li>Categories</span></li>
    </ul>
    <div class="span3 product_list">
        <ul class="nav">
            <?php foreach($categories as $category): ?>
            <li>
                <a class="active" href="#"><?php echo $category->description->name; ?> (<?php echo $category->getProductsCount(); ?>)</a>
                <?php if($category->hasChildCategories()): ?>
                <ul>
                    <?php foreach($category->childCategories as $childCategory): ?>
                    <li><a href="#"> - <?php echo $childCategory->description->name; ?> (<?php echo $childCategory->getProductsCount(); ?>)</a></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div><!-- end sidebar -->		
</div>
<div class="span9">

    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <?php foreach($banners as $banner): ?>
            <?php if($banner->hasImages()): ?>
                <?php $images = $banner->images; ?>
                <?php foreach($images as $image): ?>
                <div class="item <?php if ($banner === reset($banners) && $image === reset($images)): ?>active<?php endif; ?>">
                    <img src="<?php echo $image->getImageWithSize(700, 286); ?>" alt="">
                    <div class="carousel-caption">
                        <h4><?php echo $banner->name; ?></h4>
                        <p><?php echo isset($image->description) ? $image->description->title : null; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>



<div class="span9 popular_products">
    <h4>Latest products</h4><br />
    <ul class="thumbnails">
        <?php foreach ($latestProducts as $product): ?> 
        <li class="span2">
            <div class="thumbnail">
                <a href="product.html"><img alt="" src="<?php echo $product->getImageWithSize(150, 123); ?>" /></a>
                <div class="caption">
                    <a href="product.html"> <h5>PS Vita</h5></a>  Price: &#36;50.00<br /><br />
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
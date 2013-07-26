<div class="span9">
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <?php foreach ($banners as $banner): ?>
                <?php if ($banner->hasImages()): ?>
                    <?php $images = $banner->images; ?>
                    <?php foreach ($images as $image): ?>
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
        <?php foreach ($latestProducts as $index => $product): ?>
            <li class="span2">
                <div class="thumbnail">
                    <a href="<?php echo $this->createUrl('/product/view', array('id' => $product->product_id)); ?>"><img alt="" src="<?php echo $product->getImageWithSize(150, 123); ?>" /></a>
                    <div class="caption">
                        <a href="<?php echo $this->createUrl('/product/view', array('id' => $product->product_id)); ?>"> <h5><?php echo $product->description->getNameShort(15); ?></h5></a>  Price: <?php echo $product->getFormattedPrice(); ?><br /><br />
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
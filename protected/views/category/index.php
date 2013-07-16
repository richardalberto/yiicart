<div class="span9">
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="listings.html">Desktops</a> <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="category.html">Mac</a>
        </li>
    </ul>

    <?php foreach ($products as $product): ?>
        <div class="row">
            <div class="span1">
                <a href="<?php echo $this->createUrl('/product/view', array('id'=>$product->product_id)); ?>"><img src="<?php echo $product->getImageWithSize(60, 60); ?>" id="tmp" alt=""></a>
            </div>
            <div class="span6">
                <a href="<?php echo $this->createUrl('/product/view', array('id'=>$product->product_id)); ?>"><h5><?php echo $product->description->name; ?></h5></a>
                <p><?php echo $product->description->getDescriptionShort(); ?></p>
            </div>
            <div class="span1">
                <p><?php echo $product->getFormattedPrice(); ?></p>
            </div>
            <div class="span2">
                <p><a href="cart.html" class="btn btn-primary">Add to cart</a></p>
                <p><a href="#" class="">Add to Wish List</a></p>
                <p><a href="compare.html" class="">Add to Compare</a></p>
            </div>
        </div>
        <hr />
    <?php endforeach; ?>

    <div class="pagination">
        <ul>
            <li><a href="#">Prev</a></li>
            <li class="active">
                <a href="#">1</a>
            </li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">Next</a></li>
        </ul>
    </div>

</div>
<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('categories', 'Category');
$this->breadcrumbs = array(
    Yii::t('categories', 'Category'),
);
?>

<?php foreach ($products as $product): ?>
    <div class="row">
        <div class="span1">
            <a href="<?php echo $this->createUrl('/product/view', array('id' => $product->product_id)); ?>"><img src="<?php echo $product->getImageWithSize(60, 60); ?>" id="tmp" alt=""></a>
        </div>
        <div class="span6">
            <a href="<?php echo $this->createUrl('/product/view', array('id' => $product->product_id)); ?>"><h5><?php echo $product->description->name; ?></h5></a>
            <p><?php echo $product->description->getDescriptionShort(); ?></p>
        </div>
        <div class="span1">
            <p><?php echo $product->getFormattedPrice(); ?></p>
        </div>
        <div class="span2">
            <p><a onclick="addToCart(<?php echo $product->product_id; ?>, 1);" href="#" class="btn btn-primary"><?php echo Yii::t('cart', 'Add to cart'); ?></a></p>
            <p><a onclick="addToWishList(<?php echo $product->product_id; ?>);" href="#" class=""><?php echo Yii::t('wishlist', 'Add to Wish List'); ?></a></p>
            <p><a onclick="addToCompare(<?php echo $product->product_id; ?>);" href="#" class=""><?php echo Yii::t('compare', 'Add to Compare'); ?></a></p>
        </div>
    </div>
    <hr />
<?php endforeach; ?>

<!--
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
-->
<?php $categories = Category::model()->firstLevel()->active()->orderBySortOrder()->findAll(); ?>
<div class="span3">
    <!-- start sidebar -->
    <ul class="breadcrumb">
        <li>Categories</span></li>
    </ul>
    <div class="span3 product_list">
        <ul class="nav">
            <?php foreach($categories as $category): ?>
            <li>
                <a class="active" href="<?php echo $this->createUrl('/category/view', array('id'=>$category->category_id)); ?>"><?php echo $category->description->name; ?> (<?php echo $category->getProductsCount(); ?>)</a>
                <?php if($category->hasChildCategories()): ?>
                <ul>
                    <?php foreach($category->childCategories as $childCategory): ?>
                    <li><a href="<?php echo $this->createUrl('/category/view', array('id'=>$childCategory->category_id)); ?>"> - <?php echo $childCategory->description->name; ?> (<?php echo $childCategory->getProductsCount(); ?>)</a></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div><!-- end sidebar -->		
</div>
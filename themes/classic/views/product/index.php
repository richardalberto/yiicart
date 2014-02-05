<?php
	Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl .
		"/bootstrapImageGallery/css/blueimp-gallery.min.css");
	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/jquery.min.js", CClientScript::POS_END);
	Yii::app()->clientScript->RegisterScriptFile(Yii::app()->theme->baseUrl .
		'/bootstrapImageGallery/js/jquery.blueimp-gallery.min.js', CClientScript::POS_END);
?>
<br>
<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
	<div class="slides"></div>
	<h3 class="title"></h3>
	<a class="prev">‹</a>
	<a class="next">›</a>
	<a class="close">×</a>
	<a class="play-pause"></a>
	<ol class="indicator"></ol>
</div>
<div class="row">
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
	    <?php if ($product->hasAdditionalImages()): ?>
		    <div class="span3" id="links">
	            <?php $numImages = count($product->additionalImages) ?>
	            <?php foreach ($product->additionalImages as $i => $image): ?>
		            <? if($i===0): ?>
			            <?= CHtml::link($image->render(260,160, $product->description->name),
				            $image->getImageWithSize(), array('data-gallery'=>'')); ?>
			            <? continue ?>
		            <? elseif($i === 1): ?>
		                <ul class="thumbnails">
		            <? endif ?>
	                    <li class="span1">
	                        <?= CHtml::link($image->render(50,50, $product->description->name),
		                        $image->getImageWithSize(), array('class'=>'thumbnail','data-gallery'=>'')); ?>
	                    </li>
		            <? if($i===$numImages): ?>
	                    </ul>
			        <? endif ?>
	            <? endforeach ?>
            </div>
	    <?php endif; ?>
	    <div class="span6">
            <div class="span6">
                <address>
                    <?php if (isset($product->manufacturer)): ?><strong>Brand:</strong>
	                <span><?php echo $product->manufacturer->name; ?></span><br><?php endif; ?>
                    <strong>Product Code:</strong> <span><?php echo $product->model; ?></span><br>
                    <!--<strong>Reward Points:</strong> <span>0</span><br>-->
                    <strong>Availability:</strong> <span><?php echo $product->stockStatus->name; ?></span><br>
                </address>
            </div>	
            <div class="span6">
                <h2>
                    <strong>Price: <?php echo $product->getFormattedPrice(); ?></strong>
	                <!--<small>Ex Tax: $500.00</small>--><br><br>
                </h2>
            </div>	
            <div class="span6">
                <form class="form-inline">
                    <div class="span3 no_margin_left">
                        <label>Qty:</label>
                        <input id="quantity" type="text" value="1" class="span1">
                        <button type="button" onclick="addToCart(<?php echo $product->product_id; ?>,
	                        $('#quantity').val())" class="btn btn-primary">Add to cart</button>
                    </div>	
                    
                    <div class="span1">
                        - OR -
                    </div>	
                    <div class="span2">
                        <p><a href="#">Add to Wish List</a></p>
                        <p><a href="#">Add to Compare</a></p>
                    </div>	
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
                    <li class="active"><a data-toggle="tab" href="#description"><?php echo Yii::t('products',
						'Description'); ?></a></li>
                    <?php if($product->hasAttributes()): ?><li><a data-toggle="tab" href="#specification"><?php
						echo Yii::t('products', 'Specification'); ?></a></li><?php endif; ?>
                    <li><a data-toggle="tab" href="#reviews"><?php echo Yii::t('products', 'Reviews'); ?></a></li>
                    <?php if($product->hasRelatedProducts()): ?><li><a data-toggle="tab" href="#related"><?php
						echo Yii::t('products', 'Related products'); ?></a></li><?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div id="description" class="tab-pane fade in active">
                        <?php echo $product->description->getDescription(); ?>
                    </div>
                    <?php if($product->hasAttributes()): ?>
                    <div id="specification" class="tab-pane fade">
                        <?php foreach($groups as $groupId => $group): ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><?php echo $group['name']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($group['attributes'] as $attributeId => $attribute): ?>
                                <tr>
                                    <th style="width: 200px; text-align: right;"><?php echo $attribute['name']; ?></th>
                                    <td><?php echo $attribute['text']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    <div id="reviews" class="tab-pane fade">
                        <p>There are no reviews for this product.</p>
                    </div>    
                    <?php if($product->hasRelatedProducts()): ?>
                    <div id="related" class="tab-pane fade">
                        <ul class="thumbnails related_products">
                            <?php foreach($product->relatedProducts as $related): ?>
	                            <li class="span2">
	                                <div class="thumbnail">
	                                    <a href="<?php echo $this->createUrl('product/view',
		                                    array('id'=>$related->product_id)); ?>"><img src="<?php echo
		                                    $related->getImageWithSize(220, 180); ?>" alt=""></a>
	                                    <div class="caption">
	                                        <a href="<?php echo $this->createUrl('product/view',
		                                        array('id'=>$related->product_id)); ?>"> <h5><?php echo
			                                    $related->description->name; ?></h5></a>
		                                        <?php echo Yii::t('products', 'Price'); ?>:
		                                        <?php echo $related->getFormattedprice(); ?><br><br>
	                                    </div>
	                                </div>
	                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
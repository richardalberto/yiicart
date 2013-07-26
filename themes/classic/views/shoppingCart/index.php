<?php 
$js = 'function updateQuantity(product_id, quantity) { document.location = "' . $this->createUrl('update') . '/?product_id=" + product_id + "&quantity=" + quantity; }';
Yii::app()->clientScript->registerScript('updateQuantity', $js, CClientScript::POS_END);
?>
<div class="row-fluid">
    <div class="span12">
        <h1> Shopping Cart</h1><br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 47px;">Image</th>
                    <th>Product Name</th>
                    <th style="width: 150px;">Model</th>
                    <th style="width: 180px;">Quantity</th>
                    <th style="width: 100px;">Unit Price</th>
                    <th style="width: 100px;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shoppingCart->findAllProducts() as $product): ?>
                    <tr>
                        <td class="muted center_text"><a href="<?php echo $this->createUrl('/product/view', array('id'=>$product->product_id)); ?>"><img src="<?php echo $product->getImageWithSize(47, 47); ?>"></a></td>
                        <td>
                            <a href="<?php echo $this->createUrl('/product/view', array('id'=>$product->product_id)); ?>"><?php echo $product->description->name; ?></a>
                            <?php if($product->hasReward()): ?><br /><small><?php echo Yii::t('products', 'Reward Points'); ?>: <?php echo $product->reward->points; ?></small><?php endif; ?>
                        </td>
                        <td><?php echo $product->model; ?></td>
                        <td>
                            <input id="quantity-<?php echo $product->product_id; ?>" type="text" class="input-mini no_margin_bottom" value="<?php echo $shoppingCart->getQuantity($product->product_id); ?>">
                            <button onclick="updateQuantity(<?php echo $product->product_id; ?>, $('#quantity-<?php echo $product->product_id; ?>').val());" class="btn btn-primary"><i class="icon-refresh"></i></button>
                            <button onclick="updateQuantity(<?php echo $product->product_id; ?>, 0);" class="btn btn-danger"><i class="icon-remove-circle"></i></button>
                        </td>
                        <td><?php echo $product->getFormattedPrice(); ?></td>
                        <td><?php echo $shoppingCart->getTotalPriceForProduct($product->product_id); ?></td>
                    </tr>
                <?php endforeach; ?>		  
            </tbody>
        </table>

        <form class="form-horizontal">
            <fieldset>	  


                <div id="accordion2" class="accordion">
                    <div class="accordion-group">
                        <div class="accordion-heading">

                            <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                <h5>Apply discount code</h5>
                            </a>
                        </div>
                        <div class="accordion-body collapse in" id="collapseOne">
                            <div class="accordion-inner">
                                <div class="control-group">
                                    <label class="control-label" for="input01">Discount code: </label>
                                    <div class="controls">
                                        <input type="text" placeholder="Enter your coupon here" class="input-xlarge" id="input01">
                                        <p class="help-block">You can only use one discount code at a time</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                <h5>Use gift voucher</h5>
                            </a>
                        </div>
                        <div class="accordion-body collapse" id="collapseTwo">
                            <div class="accordion-inner">
                                <div class="control-group">
                                    <label class="control-label" for="input01">Gift voucher: </label>
                                    <div class="controls">
                                        <input type="text" placeholder="Enter your gift voucher here" class="input-xlarge" id="input01">
                                        <p class="help-block">You can use multiple gift vouchers at a time</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row-fluid">
                    
                </div>

                <div class="row-fluid">	  
                    <div class="offset5 span2">
                        <a class="btn btn-primary" href="<?php echo $this->createUrl('/site/index'); ?>"><?php echo Yii::t('shoppingCart', 'Continue shopping'); ?></a>
                    </div>		  
                    <div class="span5">
                        <a class="btn btn-primary pull-right" href="<?php echo $this->createUrl('checkout'); ?>"><?php echo Yii::t('shoppingCart', 'Checkout'); ?></a>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <h1><?php echo Yii::t('checkout', 'Checkout'); ?></h1><br>
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#step1">
                        <?php echo Yii::t('checkout', 'Step 1: Checkout Options'); ?>
                    </a>
                </div>
                <div id="step1" class="accordion-body collapse in">
                    <div class="accordion-inner">
                        <div class="row-fluid">
                            <div class="span6">
                                <legend><?php echo Yii::t('checkout', 'New Customer'); ?></legend>
                                <p><?php echo Yii::t('checkout', 'Checkout options'); ?>:</p>
                                <label class="radio">
                                    <b><?php echo Yii::t('checkout', 'Register account'); ?></b>
                                    <input type="radio" />
                                </label>
                                <label class="radio">
                                    <b><?php echo Yii::t('checkout', 'Guest checkout'); ?></b>
                                    <input type="radio" />
                                </label>
                                <p><?php echo Yii::t('checkout', 'By creating an account you will be able to shop faster, be up to date on an order\'s status, and keep track of the orders you have previously made.'); ?></p>
                                <button class="btn btn-primary"><?php echo Yii::t('common', 'Continue'); ?></button>
                            </div>
                            <div class="span6">
                                <legend><?php echo Yii::t('checkout', 'Returning Customer'); ?></legend>
                                <p><?php echo Yii::t('checkout', 'I am a returning customer'); ?></p>
                                <form>
                                    <label><?php echo Yii::t('customers', 'E-Mail'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'E-Mail'); ?></label>
                                    <input type="password" />
                                    <br />
                                    <button type="submit" class="btn btn-primary"><?php echo Yii::t('common', 'Continue'); ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#step2">
                        <?php echo Yii::t('checkout', 'Step 2: Account & Billing Details'); ?>
                    </a>
                </div>
                <div id="step2" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <div class="row-fluid">
                            <div class="span6">
                                <form>
                                    <legend><?php echo Yii::t('checkout', 'Your Personal Details'); ?></legend>
                                    <label><?php echo Yii::t('customers', 'First Name'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'Last Name'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'E-Mail'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'Telephone'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'Fax'); ?></label>
                                    <input type="text" />
                                    <legend><?php echo Yii::t('checkout', 'Your Password'); ?></legend>
                                    <label><?php echo Yii::t('customers', 'Password'); ?></label>
                                    <input type="password" />
                                    <label><?php echo Yii::t('customers', 'Password Confirm'); ?></label>
                                    <input type="password" />
                                </form>
                            </div>
                            <div class="span6">
                                <form>
                                    <legend><?php echo Yii::t('checkout', 'Your Address'); ?></legend>
                                    <label><?php echo Yii::t('customers', 'Company'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'Company ID'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'Address 1'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'Address 2'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'City'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'Post Code'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'Country'); ?></label>
                                    <input type="text" />
                                    <label><?php echo Yii::t('customers', 'Region / State'); ?></label>
                                    <input type="text" />
                                </form>                                
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <hr />
                                <label class="checkbox">
                                    <!-- TODO: add store name here -->
                                    <?php echo Yii::t('checkout', 'I wish to subscribe to the :storename newsletter.', array(':storename' => 'Default store')); ?>
                                    <input type="checkbox" />
                                </label>
                                <label class="checkbox">
                                    <!-- TODO: add store name here -->
                                    <?php echo Yii::t('checkout', 'My delivery and billing addresses are the same. '); ?>
                                    <input type="checkbox" checked="true" />
                                </label>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="span5 pull-right">
                                    <label class="checkbox inline"><?php echo Yii::t('checkout', 'I have read and agree to the Privacy Policy'); ?><input type="checkbox" /></label>
                                    <button type="submit" class="btn btn-primary"><?php echo Yii::t('common', 'Continue'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#step3">
                        <?php echo Yii::t('checkout', 'Step 3: Delivery Details'); ?>
                    </a>
                </div>
                <div id="step3" class="accordion-body collapse">
                    <div class="accordion-inner">

                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#step4">
                        <?php echo Yii::t('checkout', 'Step 4: Delivery Method'); ?>
                    </a>
                </div>
                <div id="step4" class="accordion-body collapse">
                    <div class="accordion-inner">
                        Anim pariatur cliche...
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#step5">
                        <?php echo Yii::t('checkout', 'Step 5: Payment Method'); ?>
                    </a>
                </div>
                <div id="step5" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <p><?php echo Yii::t('checkout', 'Please select the preferred payment method to use on this order.'); ?></p>
                        <label class="radio">
                            Cash on delivery
                            <input type="radio" checked="true" />
                        </label>
                        <label>Add comments about your order</label>
                        <textarea class="span12"></textarea>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="span5 pull-right">
                                    <label class="checkbox inline"><?php echo Yii::t('checkout', 'I have read and agree to the Privacy Policy'); ?><input type="checkbox" /></label>
                                    <button type="submit" class="btn btn-primary"><?php echo Yii::t('common', 'Continue'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#step6">
                        <?php echo Yii::t('checkout', 'Step 6: Confirm Order'); ?>
                    </a>
                </div>
                <div id="step6" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th style="width: 150px;">Model</th>
                                    <th style="width: 180px;">Quantity</th>
                                    <th style="width: 100px;">Price</th>
                                    <th style="width: 100px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($shoppingCart->findAllProducts() as $product): ?>
                                    <tr>
                                        <td><a href="<?php echo $this->createUrl('/product/view', array('id' => $product->product_id)); ?>"><?php echo $product->description->name; ?></a></td>
                                        <td><?php echo $product->model; ?></td>
                                        <td><?php echo $shoppingCart->getQuantity($product->product_id); ?></td>
                                        <td><?php echo $product->getFormattedPrice(); ?></td>
                                        <td><?php echo $shoppingCart->getTotalPriceForProduct($product->product_id); ?></td>
                                    </tr>
                                <?php endforeach; ?>		  
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" style="text-align: right;">Sub-Total:</th>
                                    <td><?php echo $shoppingCart->getTotalPrice(); ?></td>
                                </tr>
                                <tr>
                                    <th colspan="4" style="text-align: right;">Total:</th>
                                    <td><?php echo $shoppingCart->getTotalPrice(); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="offset10 span2">
                            <button class="btn btn-primary">Confirm Order</button>
                            <br /><br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('orders', 'Orders');
$this->breadcrumbs = array(
    Yii::t('orders', 'Orders'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('orders', 'Orders'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a href="<?php echo $this->createUrl('index'); ?>" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</div>

<br />

<div class="tabbable tabs-left">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#order" data-toggle="tab"><?php echo Yii::t('orders', 'Order Details'); ?></a></li>
        <li><a href="#payment" data-toggle="tab"><?php echo Yii::t('orders', 'Payment Details'); ?></a></li>
        <li><a href="#shipping" data-toggle="tab"><?php echo Yii::t('orders', 'Shipping Details'); ?></a></li>
        <li><a href="#products" data-toggle="tab"><?php echo Yii::t('orders', 'Products'); ?></a></li>
        <li><a href="#history" data-toggle="tab"><?php echo Yii::t('orders', 'History Details'); ?></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="order">
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width: 250px;"><?php echo Yii::t('orders', 'Order ID'); ?>:</th>
                        <td>#<?php echo $order->order_id; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Invoice No.'); ?>:</th>
                        <td><a class="btn btn-mini" href="#"><?php echo Yii::t('common', 'Generate'); ?></a></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Store Name'); ?>:</th>
                        <td><?php echo $order->store_name; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Store Url'); ?>:</th>
                        <td><?php echo $order->store_url; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Customer'); ?>:</th>
                        <td><a href="<?php echo $this->createUrl('/admin/customers/view', array('id'=>$order->customer_id)); ?>"><?php echo $order->getCustomerFullname(); ?></a></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Customer Group'); ?>:</th>
                        <td><?php echo $order->customerGroup->description->name; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'E-Mail'); ?>:</th>
                        <td><?php echo $order->email; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Telephone'); ?>:</th>
                        <td><?php echo $order->telephone; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Total'); ?>:</th>
                        <td><?php echo $order->getTotal(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Reward Points'); ?>:</th>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Order Status'); ?>:</th>
                        <td><?php echo $order->status->name; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'IP Address'); ?>:</th>
                        <td><?php echo $order->ip; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'User Agent'); ?>:</th>
                        <td><?php echo $order->user_agent; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Accept Language'); ?>:</th>
                        <td><?php echo $order->accept_language; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Date Added'); ?>:</th>
                        <td><?php echo $order->getDateAdded(); ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Date Modified'); ?>:</th>
                        <td><?php echo $order->getDateModified(); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="payment">
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width: 250px;"><?php echo Yii::t('orders', 'First Name'); ?>:</th>
                        <td><?php echo $order->payment_firstname; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Last Name'); ?>:</th>
                        <td><?php echo $order->payment_lastname; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Address 1'); ?>:</th>
                        <td><?php echo $order->payment_address_1; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'City'); ?>:</th>
                        <td><?php echo $order->payment_city; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Region / State'); ?>:</th>
                        <td><?php echo $order->payment_zone; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Region / State Code'); ?>:</th>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Country'); ?>:</th>
                        <td><?php echo $order->payment_country; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Payment Method'); ?>:</th>
                        <td><?php echo $order->payment_method; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="shipping">
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width: 250px;"><?php echo Yii::t('orders', 'First Name'); ?>:</th>
                        <td><?php echo $order->shipping_firstname; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Last Name'); ?>:</th>
                        <td><?php echo $order->shipping_lastname; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Address 1'); ?>:</th>
                        <td><?php echo $order->shipping_address_1; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'City'); ?>:</th>
                        <td><?php echo $order->shipping_city; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Region / State'); ?>:</th>
                        <td><?php echo $order->shipping_zone; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Region / State Code'); ?>:</th>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Country'); ?>:</th>
                        <td><?php echo $order->shipping_country; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Shipping Method'); ?>:</th>
                        <td><?php echo $order->shipping_method; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="products">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th><?php echo Yii::t('orders', 'Product'); ?></th>
                        <th><?php echo Yii::t('orders', 'Model'); ?></th>
                        <th><?php echo Yii::t('orders', 'Quantity'); ?></th>
                        <th><?php echo Yii::t('orders', 'Unit Price'); ?></th>
                        <th><?php echo Yii::t('orders', 'Total'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order->products as $product): ?>
                        <tr>
                            <td><?php echo $product->name; ?></td>
                            <td><?php echo $product->model; ?></td>
                            <td><?php echo $product->quantity; ?></td>
                            <td><?php echo $product->price; ?></td>
                            <td><?php echo $product->price * $product->quantity; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" style="text-align: right;"><?php echo Yii::t('orders', 'Sub-Total'); ?>:</th>
                        <td><?php echo $order->getSubTotal(); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: right;"><?php echo $order->shipping_method; ?>:</th>
                        <td><?php echo $order->getShippingTotal(); ?></td>
                    </tr>
                    <tr>
                        <th colspan="4" style="text-align: right;"><?php echo Yii::t('orders', 'Total'); ?>:</th>
                        <td><?php echo $order->getTotal(); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="tab-pane" id="history">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th style="width: 100px;"><?php echo Yii::t('orders', 'Date Added'); ?></th>
                        <th><?php echo Yii::t('orders', 'Comment'); ?></th>
                        <th style="width: 120px;"><?php echo Yii::t('orders', 'Status'); ?></th>
                        <th style="width: 130px;"><?php echo Yii::t('orders', 'Customer Notified'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order->histories as $history): ?>
                        <tr>
                            <td><?php echo $history->getDateAdded(); ?></td>
                            <td><?php echo $history->comment; ?></td>
                            <td><?php echo $history->status->name; ?></td>
                            <td><?php echo $history->getNotify(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br /><br />
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'login-form',
                'enableClientValidation' => true,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'htmlOptions' => array(
                    'class' => 'form-horizontal',
                ),
            ));
            ?>
            <div class="control-group">
                <?php echo $form->label($orderHistoryModel, 'order_status_id', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($orderHistoryModel, 'order_status_id', $orderStatuses); ?>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->label($orderHistoryModel, 'notify', array('class' => 'control-label')); ?>
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $form->checkbox($orderHistoryModel, 'notify'); ?>
                    </label>
                </div>
            </div>
            <div class="control-group">
                <?php echo $form->label($orderHistoryModel, 'comment', array('class' => 'control-label')); ?>
                <div class="controls">
                    <?php echo $form->textArea($orderHistoryModel, 'comment', array('class' => 'span6', 'rows' => 4)); ?>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><?php echo Yii::t('orders', 'Add History'); ?></button>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
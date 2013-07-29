<!-- Jumbotron -->
<div class="jumbotron">
    <h1><?php echo Yii::t('dashboard', 'Dashboard'); ?></h1>
    <p class="lead"><?php echo Yii::t('dashboard', 'Latest 10 orders'); ?></p>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="width: 60px;"><?php echo Yii::t('order', 'Order ID'); ?></th>
                <th><?php echo Yii::t('order', 'Customer'); ?></th>
                <th><?php echo Yii::t('order', 'Status'); ?></th>
                <th style="width: 100px;"><?php echo Yii::t('order', 'Date Added'); ?></th>
                <th><?php echo Yii::t('order', 'Total'); ?></th>
                <th><?php echo Yii::t('order', 'Action'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order): ?>
            <tr>
                <td><?php echo $order->order_id; ?></td>
                <td><?php echo $order->getCustomerFullname(); ?></td>
                <td><?php echo $order->status->name; ?></td>
                <td><?php echo $order->getDateAdded(); ?></td>
                <td><?php echo $order->getTotal(); ?></td>
                <td><?php echo CHtml::link(Yii::t('common', 'view'), $this->createUrl('/admin/orders/view', array('id'=>$order->order_id)), array('class'=>'btn btn-success btn-mini')); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<hr />

<!-- Example row of columns -->
<div class="row-fluid">
    <div class="span5">
        <h4>Overview</h4>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th><?php echo Yii::t('dashboard', 'Total Sales'); ?>:</th>
                    <td><?php echo Order::getOrdersTotal(); ?></td>
                </tr>
                <tr>
                    <th><?php echo Yii::t('dashboard', 'Total Sales This Year'); ?>:</th>
                    <td><?php echo Order::getOrdersTotal(); ?></td>
                </tr>
                <tr>
                    <th><?php echo Yii::t('dashboard', 'Total Orders'); ?>:</th>
                    <td><?php echo Order::model()->count(); ?></td>
                </tr>
                <tr>
                    <th><?php echo Yii::t('dashboard', 'No. of Customers'); ?>:</th>
                    <td><?php echo Customer::model()->count(); ?></td>
                </tr>
                <tr>
                    <th><?php echo Yii::t('dashboard', 'Customers Awaiting Approval'); ?>:</th>
                    <td><?php echo Customer::model()->countByAttributes(array('approved'=>Customer::APPROVED_NO)); ?></td>
                </tr>
                <tr>
                    <th><?php echo Yii::t('dashboard', 'Reviews Awaiting Approval'); ?>:</th>
                    <td><?php echo Review::model()->countByAttributes(array('status'=>Review::STATUS_PENDING)); ?></td>
                </tr>
                <tr>
                    <th><?php echo Yii::t('dashboard', 'No. of Affiliates'); ?>:</th>
                    <td><?php echo Affiliate::model()->count(); ?></td>
                </tr>
                <tr>
                    <th><?php echo Yii::t('dashboard', 'Affiliates Awaiting Approval'); ?>:</th>
                    <td><?php echo Affiliate::model()->countByAttributes(array('approved'=>  Affiliate::PENDING)); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="span7">
        <h2>Statistics</h2>
        <ul class="nav nav-tabs" id="myTab">
          <li class="active"><a data-toggle="tab" href="#today"><?php echo Yii::t('dashboard', 'Today'); ?></a></li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div id="today" class="tab-pane fade in active">
                <?php
                $this->Widget('ext.highcharts.HighchartsWidget', array(
                   'options'=>array(
                      'title' => array('text' => false),
                      'xAxis' => array(
                         'categories' => array('00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23')
                      ),
                      'yAxis' => array(
                         'title' => array('text' => 'Total')
                      ),
                      'series' => array(
                         array('name' => Yii::t('dashboard', 'Orders'), 'data' => array(1, 0, 4, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 20, 0, 0, 0, 0, 0, 0, 6, 0 )),
                         array('name' => Yii::t('dashboard', 'Customers'), 'data' => array(1, 0, 4, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 8, 0, 0, 0, 0, 0, 10, 0, 0, 0)),
                      )
                   )
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<hr />
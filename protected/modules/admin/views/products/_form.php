<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'category-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
        ));
?>
<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#general">General</a></li>
    <li><a data-toggle="tab" href="#data">Data</a></li>
</ul>
<div class="tab-content" id="myTabContent">
    <div id="general" class="tab-pane fade in active">
        <div class="control-group">
            <?php echo $form->label($model, 'name', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'name', array('class' => 'span8')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'metaTagDescription', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model, 'metaTagDescription', array('class' => 'span6')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'metaTagKeywords', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model, 'metaTagKeywords', array('class' => 'span6')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'description', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model, 'description', array('class' => 'span6')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'productTags', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'productTags', array('class' => 'span3')); ?>
            </div>
        </div>
    </div>
    <div id="data" class="tab-pane fade">
        <div class="control-group">
            <?php echo $form->label($model, 'model', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'model', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'sku', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'sku', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'upc', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'upc', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'ean', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'ean', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'jan', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'jan', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'isbn', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'isbn', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'mpn', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'mpn', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'location', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'location', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'price', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'price', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'taxClass', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'taxClass', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'quantity', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'quantity', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'minimumQuantity', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'minimumQuantity', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'subtractStock', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'subtractStock', array('class' => 'span3')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'outOfStockStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'outOfStockStatus', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'requiresShipping', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'requiresShipping', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'seoKeyword', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'seoKeyword', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'image', array('class' => 'control-label')); ?>
            <div class="controls">

            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'dateAvailable', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'seoKeyword', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'dimensionL', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'dimensionL', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'lenghtClass', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'lenghtClass', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'weight', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'weight', array('class' => 'span3')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'weightClass', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'weightClass', array('class' => 'span3')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'status', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'status', $statues, array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'sortOrder', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'sortOrder', array('class' => 'span1')); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
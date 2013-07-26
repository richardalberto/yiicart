<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'product-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
));
?>
<?php echo $form->hiddenField($model, 'id'); ?>
<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#general"><?php echo Yii::t('products', 'General'); ?></a></li>
    <li><a data-toggle="tab" href="#data"><?php echo Yii::t('products', 'Data'); ?></a></li>
    <li><a data-toggle="tab" href="#links"><?php echo Yii::t('products', 'Links'); ?></a></li>
    <li><a data-toggle="tab" href="#attributes"><?php echo Yii::t('products', 'Attributes'); ?></a></li>
    <li><a data-toggle="tab" href="#images"><?php echo Yii::t('products', 'Images'); ?></a></li>
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
                <?php $this->widget('application.extensions.yiickeditor.YiiCKEditor', array(
                    'model'=>$model,
                    'attribute'=>'description',
                )); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'productTags', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'productTags', array('class' => 'span6')); ?>
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
                <?php echo $form->dropDownList($model, 'taxClass', $taxClasses,  array('class' => 'span3')); ?>
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
                <?php echo $form->dropDownList($model, 'subtractStock', $yes_no, array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'outOfStockStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'outOfStockStatus', $stockStatuses, array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'requiresShipping', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'requiresShipping', $yes_no, array('class' => 'span2')); ?>
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
                <ul class="thumbnails">
                  <li class="span2">
                  <div class="thumbnail">
                      <img id="thumb" alt="" src="<?php if(!is_null($model->getProduct())) echo $model->getProduct()->getImageWithSize(100, 100); ?>">
                      <?php echo $form->hiddenField($model, 'image'); ?>
                      <div class="caption">
                        <p>
                            <a onclick="image_upload('ProductForm_image', 'thumb');" class="btn btn-mini btn-primary" href="#">Browse</a> 
                            <a onclick="image_clear('ProductForm_image', 'thumb');" class="btn btn-mini" href="#">Clear</a>
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'dateAvailable', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'dateAvailable', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'dimensionL', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'dimensionL', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'lengthClass', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'lengthClass', $lengthClasses, array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'weight', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'weight', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'weightClass', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'weightClass', $weightClasses, array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'status', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'status', $statuses, array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'sortOrder', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'sortOrder', array('class' => 'span1')); ?>
            </div>
        </div>
    </div>
    <div id="links" class="tab-pane fade">
        <div class="control-group">
            <?php echo $form->label($model, 'manufacturer', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php $this->widget('TypeaheadSingle', array(
                    'model' => $model,
                    'attribute' => 'manufacturer',
                    'value' => $model->getProduct()->getManufacturerName(),
                    'htmlOptions' => array('class' => 'span2'),
                    'url'=>$this->createUrl('/admin/manufacturers/autocomplete')                    
                ))?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'categories', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php $this->widget('TypeaheadMultiple', array(
                    'model' => $model,
                    'attribute' => 'categories',
                    'url'=>$this->createUrl('/admin/categories/autocomplete'),
                    'htmlOptions' => array('class' => 'span2')
                ))?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'filters', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php $this->widget('TypeaheadMultiple', array(
                    'model' => $model,
                    'attribute' => 'filters',
                    'url'=>$this->createUrl('/admin/filters/autocomplete'),
                    'htmlOptions' => array('class' => 'span2')
                ))?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'stores', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php $this->widget('TypeaheadMultiple', array(
                    'model' => $model,
                    'attribute' => 'stores',
                    'url'=>$this->createUrl('/admin/stores/autocomplete'),
                    'htmlOptions' => array('class' => 'span2')
                ))?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'downloads', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php $this->widget('TypeaheadMultiple', array(
                    'model' => $model,
                    'attribute' => 'downloads',
                    'url'=>$this->createUrl('/admin/downloads/autocomplete'),
                    'htmlOptions' => array('class' => 'span2')
                ))?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'relatedProducts', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php $this->widget('TypeaheadMultiple', array(
                    'model' => $model,
                    'attribute' => 'relatedProducts',
                    'url'=>$this->createUrl('/admin/products/autocomplete'),
                    'htmlOptions' => array('class' => 'span2')
                ))?>
            </div>
        </div>
    </div>
    <div id="attributes" class="tab-pane fade">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><?php echo Yii::t('products', 'Attribute'); ?></th>
                    <th><?php echo Yii::t('products', 'Text'); ?></th>
                    <th style="width: 1px;">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($model->getProduct()->attributes as $attribute): ?>
                <tr>
                    <td>
                        <?php $this->widget('TypeaheadSingle', array(
                            'model' => $attribute,
                            'attribute' => 'text',
                            'value' => $attribute->attribute->description->name,
                            'htmlOptions' => array('class' => 'span3'),
                            'url'=>$this->createUrl('/admin/attributes/autocomplete')                    
                        ))?>
                    </td>
                    <td><?php echo CHtml::textArea("attributes[]", $attribute->text, array('class'=>'span4')) ; ?></td>
                    <td><a href="#" class="btn btn-danger"><?php echo Yii::t('products', 'Remove'); ?></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="images" class="tab-pane fade">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><?php echo Yii::t('products', 'Image'); ?></th>
                    <th><?php echo Yii::t('products', 'Sort Order'); ?></th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($model->getProduct()->additionalImages as $image): ?>
                <tr>
                    <td>
                        <ul class="thumbnails">
                            <li class="span2">
                                <div class="thumbnail">
                                    <img id="thumb" alt="" src="<?php if (!is_null($model->getProduct())) echo $image->getImageWithSize(100, 100); ?>">
                                    <?php echo $form->hiddenField($model, 'image'); ?>
                                    <div class="caption">
                                        <p>
                                            <a onclick="image_upload('ProductForm_image', 'thumb');" class="btn btn-mini btn-primary" href="#">Browse</a> 
                                            <a onclick="image_clear('ProductForm_image', 'thumb');" class="btn btn-mini" href="#">Clear</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </td>
                    <td><?php $image->sort_order; ?></td>
                    <td><a href="#" class="btn btn-danger"><?php echo Yii::t('products', 'Remove'); ?></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endWidget(); ?>

<?php $this->renderPartial('/common/_fileManager'); ?>
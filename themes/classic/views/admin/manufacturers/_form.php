<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'manufacturer-form',
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
    <li class="active"><a data-toggle="tab" href="#general">General</a></li>
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
            <?php echo $form->label($model, 'seoKeyword', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'seoKeyword', array('class' => 'span3')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'image', array('class' => 'control-label')); ?>
            <div class="controls">
                <ul class="thumbnails">
                  <li class="span2">
                  <div class="thumbnail">
                      <img id="thumb" alt="" src="<?php if(!is_null($model->getManufacturer())) echo $model->getManufacturer()->getImageWithSize(100, 100); ?>">
                      <?php echo $form->hiddenField($model, 'image'); ?>
                      <div class="caption">
                        <p>
                            <a onclick="image_upload('ManufacturerForm_image', 'thumb');" class="btn btn-mini btn-primary" href="#">Browse</a> 
                            <a onclick="image_clear('ManufacturerForm_image', 'thumb');" class="btn btn-mini" href="#">Clear</a>
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
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

<?php $this->renderPartial('/common/_fileManager'); ?>
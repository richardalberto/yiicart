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
<?php echo $form->hiddenField($model, 'id'); ?>
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
                <?php $this->widget('application.extensions.yiickeditor.YiiCKEditor', array(
                    'model'=>$model,
                    'attribute'=>'description',
                )); ?>
            </div>
        </div>
    </div>
    <div id="data" class="tab-pane fade">
        <div class="control-group">
            <?php echo $form->label($model, 'parent', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php $this->widget('TypeaheadSingle', array(
                    'model' => $model,
                    'attribute' => 'parent',
                    'value' => $model->getCategory()->getParentName(),
                    'htmlOptions' => array('class' => 'span8'),
                    'url'=>$this->createUrl('/admin/categories/autocomplete')                    
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
            <?php echo $form->label($model, 'seoKeyword', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'seoKeyword', array('class' => 'span3')); ?>
                <span class="help-block"><?php echo Yii::t('category', 'Do not use spaces instead replace spaces with - and make sure the keyword is globally unique.'); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'image', array('class' => 'control-label')); ?>
            <div class="controls">
                <ul class="thumbnails">
                  <li class="span2">
                    <div class="thumbnail">
                      <img id="thumb" alt="" src="<?php if(!is_null($model->getCategory())) echo $model->getCategory()->getImageWithSize(100, 100); ?>">
                      <?php echo $form->hiddenField($model, 'image'); ?>
                      <div class="caption">
                        <p>
                            <a onclick="image_upload('CategoryForm_image', 'thumb');" class="btn btn-mini btn-primary" href="#">Browse</a> 
                            <a onclick="image_clear('CategoryForm_image', 'thumb');" class="btn btn-mini" href="#">Clear</a>
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'top', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->checkBox($model, 'top'); ?>
                <span class="help-block"><?php echo Yii::t('common', 'Display in the top menu bar. Only works for the top parent categories.'); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'columns', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'columns', array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t('common', 'Number of columns to use for the bottom 3 categories. Only works for the top parent categories.'); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'sortOrder', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'sortOrder', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'status', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'status', $statuses, array('class' => 'span2')); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>

<?php $this->renderPartial('/common/_fileManager'); ?>
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
                <?php echo $form->textField($model, 'parent', array('class' => 'span8')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'filters', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'filters', array('class' => 'span3')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'stores', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'stores', array('class' => 'span3')); ?>
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

            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'top', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->checkBox($model, 'top'); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'columns', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'columns', array('class' => 'span1')); ?>
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
                <?php echo $form->dropDownList($model, 'status', $statues, array('class' => 'span2')); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
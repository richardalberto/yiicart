<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'language-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
));
?>
<?php echo $form->hiddenField($model, 'language_id'); ?>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'name', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'code', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'code', array('class' => 'span1')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'locale', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'locale', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'image', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'image', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'directory', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'directory', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'filename', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'filename', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'status', $statusOptions, array('class' => 'span2')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'sort', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'sort_order', array('class' => 'span1')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'review-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
));
?>
<div class="control-group">
    <?php echo $form->label($model, 'author', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model, 'author', array('class' => 'span4')); ?>
    </div>
</div>
<div class="control-group">
    <?php echo $form->label($model, 'product_id', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model, 'product_id', array('class' => 'span4')); ?>
    </div>
</div>
<div class="control-group">
    <?php echo $form->label($model, 'text', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textArea($model, 'text', array('class' => 'span6', 'rows'=>6)); ?>
    </div>
</div>
<div class="control-group">
    <?php echo $form->label($model, 'rating', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->radioButtonList($model, 'rating', array(1, 2, 3, 4, 5), array('class' => 'inline', 'rows'=>6)); ?>
    </div>
</div>
<div class="control-group">
    <?php echo $form->label($model, 'status', array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->dropDownList($model, 'status', $statuses, array('class' => 'span2')); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
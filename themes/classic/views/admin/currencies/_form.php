<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'currency-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
));
?>
<?php echo $form->hiddenField($model, 'currency_id'); ?>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'title', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'title', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'code', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'code', array('class' => 'span1')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'symbol_left', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'symbol_left', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'symbol_right', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'symbol_right', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'decimal_place', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'decimal_place', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'value', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'value', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'status', $statusOptions, array('class' => 'span2')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'zone-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
));
?>
<?php echo $form->hiddenField($model, 'zone_id'); ?>
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
        <?php echo $form->labelEx($model, 'country_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'country_id', $countries, array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'status', $statusOptions, array('class' => 'span2')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
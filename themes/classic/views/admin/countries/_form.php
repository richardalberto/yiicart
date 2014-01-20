<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'country-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
));
?>
<?php echo $form->hiddenField($model, 'country_id'); ?>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'name', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'name', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'iso_code_2', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'iso_code_2', array('class' => 'span1')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'iso_code_3', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'iso_code_3', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'address_format', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textArea($model, 'address_format', array('class' => 'span3')); ?>
            <span class="help-block">
                First Name = {firstname}
                Last Name = {lastname}
                Company = {company}
                Address 1 = {address_1}
                Address 2 = {address_2}
                City = {city}
                Postcode = {postcode}
                Zone = {zone}
                Zone Code = {zone_code}
                Country = {country}
            </span>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'postcode_required', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'postcode_required', $yesNoOptions, array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'status', $statusOptions, array('class' => 'span2')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
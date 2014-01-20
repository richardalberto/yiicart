<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
));
?>
<?php echo $form->hiddenField($model, 'user_id'); ?>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'username', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'username', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'firstname', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'firstname', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'lastname', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'lastname', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'email', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'email', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'user_group_id', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'user_group_id', $userGroups, array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'password', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->passwordField($model, 'password', array('class' => 'span3')); ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'status', $statusOptions, array('class' => 'span2')); ?>
        </div>
    </div>
<?php $this->endWidget(); ?>
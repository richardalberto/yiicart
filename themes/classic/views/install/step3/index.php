<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'configuration-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => false,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    ),
));
?>
    <legend>1. Please enter your database connection details.</legend>

    <div class="control-group">
        <?php echo $form->label($model, 'dbDriver', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php echo $form->dropDownList($model, 'dbDriver', $dbDrivers); ?>
            <span class="help-block text-error"><?php echo $form->error($model, 'dbDriver'); ?></span>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->label($model, 'dbHost', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'dbHost'); ?>
            <span class="help-block text-error"><?php echo $form->error($model, 'dbHost'); ?></span>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->label($model, 'dbUser', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'dbUser'); ?>
            <span class="help-block text-error"><?php echo $form->error($model, 'dbUser'); ?></span>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->label($model, 'dbPassword', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php echo $form->passwordField($model, 'dbPassword'); ?>
            <span class="help-block text-error"><?php echo $form->error($model, 'dbPassword'); ?></span>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->label($model, 'dbName', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'dbName'); ?>
            <span class="help-block text-error"><?php echo $form->error($model, 'dbName'); ?></span>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->label($model, 'dbPrefix', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'dbPrefix'); ?>
            <span class="help-block text-error"><?php echo $form->error($model, 'dbPrefix'); ?></span>
        </div>
    </div>

    <legend>2. Please enter a username and password for the administration.</legend>
    
    <div class="control-group">
        <?php echo $form->label($model, 'username', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'username'); ?>
            <span class="help-block text-error"><?php echo $form->error($model, 'username'); ?></span>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->label($model, 'password', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php echo $form->passwordField($model, 'password'); ?>
            <span class="help-block text-error"><?php echo $form->error($model, 'password'); ?></span>
        </div>
    </div>
    <div class="control-group">
        <?php echo $form->label($model, 'email', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php echo $form->textField($model, 'email'); ?>
            <span class="help-block text-error"><?php echo $form->error($model, 'email'); ?></span>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <a id="back" class="btn btn-primary pull-left" href="<?php echo $this->createUrl('/install/step1'); ?>"><?php echo Yii::t('common', 'Back'); ?></a>
            <button type="submit" class="btn btn-primary pull-right"><?php echo Yii::t('common', 'Continue'); ?></button>
        </div>
    </div>
<?php $this->endWidget(); ?>

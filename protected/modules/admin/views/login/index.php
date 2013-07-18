<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-signin',
    ),
));
?>
    <h2 class="form-signin-heading"><?php echo Yii::t('login', 'Please sign in'); ?> </h2>
    <?php echo $form->textField($model, 'username', array('placeholder'=>'Username', 'class'=>'input-block-level') ); ?>
    <?php echo $form->passwordField($model, 'password', array('placeholder'=>'Password', 'class'=>'input-block-level') ); ?>
    <div class="pull-right">
        <button class="btn btn-large btn-primary" type="submit">Login</button>
    </div>
    <div class="clearfix"></div>
    
<?php $this->endWidget(); ?>

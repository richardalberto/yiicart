<div class="row-fluid">
    <div class="span12">
        <textarea class="span12" rows="10"><?php echo $license; ?></textarea>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <a id="continue" class="btn btn-primary pull-right" href="<?php echo $this->createUrl('/install/step2'); ?>"><?php echo Yii::t('common', 'Continue'); ?></a>
        <label class="checkbox span4 pull-right">
            I agree to the license
            <input type="checkbox" id="agree" />
        </label>
    </div>
</div>

<?php 
$js = " 
    $('#continue').on('click', function(){
        if(!$('#agree').is(':checked')){
            alert('You must agree to the license before you can install YiiCart!');
            return false;
        }
    });
"; 

Yii::app()->clientScript->registerScript('license', $js);
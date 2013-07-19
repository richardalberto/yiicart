<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'manufacturer-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
));
?>
<?php echo $form->hiddenField($model, 'id'); ?>
<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#general">General</a></li>
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
                <ul class="thumbnails">
                  <li class="span2">
                    <div class="thumbnail">
                      <img alt="" src="<?php if(!is_null($model->getManufacturer())) echo $model->getManufacturer()->getImageWithSize(100, 100); ?>">
                      <div class="caption">
                        <p>
                            <a class="btn btn-mini btn-primary" href="#" onclick="image_upload('image', 'thumb');">Browse</a> 
                            <a class="btn btn-mini" href="#">Clear</a>
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'sortOrder', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'sortOrder', array('class' => 'span1')); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=cbfdeb8903673d59dc56232e9ba564a4&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: 'Image Manager',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=cbfdeb8903673d59dc56232e9ba564a4&image=' + encodeURIComponent($('#' + field).attr('value')),
					dataType: 'text',
					success: function(text) {
						$('#' + thumb).replaceWith('<img src="' + text + '" alt="" id="' + thumb + '" />');
					}
				});
			}
		},	
		bgiframe: false,
		width: 800,
		height: 400,
		resizable: false,
		modal: false
	});
        
        return false;
};
//--></script>

<script>
    $('#btnFormSubmit').on('click', function(){
        $('#manufacturer-form').submit();
        return false; 
    });
</script>
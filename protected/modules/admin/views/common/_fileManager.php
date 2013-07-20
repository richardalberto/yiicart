<!-- Modal -->
<div id="imageManagerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="imageManagerModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Image Manager</h3>
    </div>
    <div class="modal-body">
        <iframe src="<?php echo $this->createUrl('/admin/fileManager'); ?>/?field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
    </div>
</div>

<script type="text/javascript"><!--
    function image_upload(field, thumb) {
        $('#imageManagerModal').modal('show');
	
        /*$('#dialog').dialog({
            title: '',
            close: function (event, ui) {
                if ($('#' + field).attr('value')) {
                    $.ajax({
                        url: 'index.php?route=common/filemanager/image&token=ec3b312764dac553bfba341a05069280&image=' + encodeURIComponent($('#' + field).val()),
                        dataType: 'text',
                        success: function(data) {
                            $('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
                        }
                    });
                }
            },	
            bgiframe: false,
            width: 800,
            height: 400,
            resizable: false,
            modal: false
        });*/
    };
//--></script> 
<!-- Modal -->
<div id="imageManagerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="imageManagerModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Image Manager</h3>
    </div>
    <div class="modal-body" style="height: 400px;">
    </div>
</div>

<script type="text/javascript"><!--
    function image_upload(field, thumb) {
        $('.modal-body').html('<iframe src="<?php echo $this->createUrl('/admin/fileManager'); ?>/?field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe>');        
        $('#imageManagerModal').modal('show');
        
        $('#imageManagerModal').on('hidden', function () {
            if ($('#' + field).attr('value')) {
                $.ajax({
                    url: '<?php echo $this->createUrl('/admin/fileManager/image'); ?>/?image=' + encodeURIComponent($('#' + field).val()),
                    dataType: 'text',
                    success: function(data) {
                        $('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
                    }
                });
            }
        })
        
        return false;
    };
    
    function image_clear(field, thumb){
        $('#' + thumb).attr('src', '<?php echo Category::model()->getImageWithSize(100, 100); ?>'); 
        $('#' + field).attr('value', '');
        
        return false;
    }
    
    //--></script> 
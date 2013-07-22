<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo Yii::t('filemanager', 'Image manager') ; ?></title>
        <base href="<?php echo Yii::app()->theme->baseUrl; ?>/index.php/admin/" />
        
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/ui/jquery-ui-1.8.16.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/js/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" />
        
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/ui/external/jquery.bgiframe-2.1.2.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jstree/jquery.tree.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/ajaxupload.js"></script>
        
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.min.css">
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome-ie7.min.css">
        <![endif]-->
        
        <style type="text/css">
            body {
                padding: 0;
                margin: 0;
                background: #F7F7F7;
                font-family: Verdana, Arial, Helvetica, sans-serif;
                font-size: 11px;
            }
            img {
                border: 0;
            }
            #container {
                padding: 0px 10px 7px 10px;
                height: 340px;
            }
            #menu {
                clear: both;
                height: 29px;
                margin-bottom: 3px;
            }
            #column-left {
                background: #FFF;
                border: 1px solid #CCC;
                float: left;
                width: 20%;
                height: 320px;
                overflow: auto;
            }
            #column-right {
                background: #FFF;
                border: 1px solid #CCC;
                float: right;
                width: 78%;
                height: 320px;
                overflow: auto;
                text-align: center;
            }
            #column-right div {
                text-align: left;
                padding: 5px;
            }
            #column-right a {
                display: inline-block;
                text-align: center;
                border: 1px solid #EEEEEE;
                cursor: pointer;
                margin: 5px;
                padding: 5px;
            }
            #column-right a.selected {
                border: 1px solid #7DA2CE;
                background: #EBF4FD;
            }
            #column-right input {
                display: none;
            }
            #dialog {
                display: none;
            }
            .button {
                display: block;
                float: left;
                padding: 8px 5px 8px 5px;
                margin-right: 5px;
                background-position: 5px 6px;
                background-repeat: no-repeat;
                cursor: pointer;
            }
            .button:hover {
                background-color: #EEEEEE;
            }
            .thumb {
                padding: 5px;
                width: 105px;
                height: 105px;
                background: #F7F7F7;
                border: 1px solid #CCCCCC;
                cursor: pointer;
                cursor: move;
                position: relative;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <div id="menu">
                <a id="create" class="button"><i class="icon-folder-close"></i>&nbsp;<?php echo Yii::t('filemanager', 'New folder'); ?></a>
                <a id="delete" class="button"><i class="icon-remove"></i>&nbsp;<?php echo Yii::t('filemanager', 'Delete'); ?></a>
                <a id="move" class="button"><i class="icon-move"></i>&nbsp;<?php echo Yii::t('filemanager', 'Move'); ?></a>
                <a id="copy" class="button"><i class="icon-copy"></i>&nbsp;<?php echo Yii::t('filemanager', 'Copy'); ?></a>
                <a id="rename" class="button"><i class="icon-edit"></i>&nbsp;<?php echo Yii::t('filemanager', 'Rename'); ?></a>
                <a id="upload" class="button"><i class="icon-upload"></i>&nbsp;<?php echo Yii::t('filemanager', 'Upload'); ?></a>
                <a id="refresh" class="button"><i class="icon-refresh"></i>&nbsp;<?php echo Yii::t('filemanager', 'Refresh'); ?></a>
            </div>
            <div id="column-left"></div>
            <div id="column-right"></div>
        </div>
        <script type="text/javascript"><!--
            $(document).ready(function() { 
                (function(){
                    var special = jQuery.event.special,
                    uid1 = 'D' + (+new Date()),
                    uid2 = 'D' + (+new Date() + 1);
	 
                    special.scrollstart = {
                        setup: function() {
                            var timer,
                            handler =  function(evt) {
                                var _self = this,
                                _args = arguments;
	 
                                if (timer) {
                                    clearTimeout(timer);
                                } else {
                                    evt.type = 'scrollstart';
                                    jQuery.event.handle.apply(_self, _args);
                                }
	 
                                timer = setTimeout( function(){
                                    timer = null;
                                }, special.scrollstop.latency);
	 
                            };
	 
                            jQuery(this).bind('scroll', handler).data(uid1, handler);
                        },
                        teardown: function(){
                            jQuery(this).unbind( 'scroll', jQuery(this).data(uid1) );
                        }
                    };
	 
                    special.scrollstop = {
                        latency: 300,
                        setup: function() {
	 
                            var timer,
                            handler = function(evt) {
	 
                                var _self = this,
                                _args = arguments;
	 
                                if (timer) {
                                    clearTimeout(timer);
                                }
	 
                                timer = setTimeout( function(){
	 
                                    timer = null;
                                    evt.type = 'scrollstop';
                                    jQuery.event.handle.apply(_self, _args);
	 
                                }, special.scrollstop.latency);
	 
                            };
	 
                            jQuery(this).bind('scroll', handler).data(uid2, handler);
	 
                        },
                        teardown: function() {
                            jQuery(this).unbind('scroll', jQuery(this).data(uid2));
                        }
                    };
                })();
	
                $('#column-right').bind('scrollstop', function() {
                    $('#column-right a').each(function(index, element) {
                        var height = $('#column-right').height();
                        var offset = $(element).offset();
						
                        if ((offset.top > 0) && (offset.top < height) && $(element).find('img').attr('src') == '<?php echo $no_image; ?>') {
                            $.ajax({
                                url: '<?php echo $this->createUrl('/admin/fileManager/image'); ?>/?image=' + encodeURIComponent('data/' + $(element).find('input[name=\'image\']').attr('value')),
                                dataType: 'html',
                                success: function(html) {
                                    $(element).find('img').replaceWith('<img src="' + html + '" alt="" title="" />');
                                }
                            });
                        }
                    });
                });
	
                $('#column-left').tree({
                    data: { 
                        type: 'json',
                        async: true, 
                        opts: { 
                            method: 'post', 
                            url: '<?php echo $this->createUrl('/admin/fileManager/directory'); ?>'
                        } 
                    },
                    selected: 'top',
                    ui: {		
                        theme_name: 'classic',
                        animation: 700
                    },	
                    types: { 
                        'default': {
                            clickable: true,
                            creatable: false,
                            renameable: false,
                            deletable: false,
                            draggable: false,
                            max_children: -1,
                            max_depth: -1,
                            valid_children: 'all'
                        }
                    },
                    callback: {
                        beforedata: function(NODE, TREE_OBJ) { 
                            if (NODE == false) {
                                TREE_OBJ.settings.data.opts.static = [ 
                                    {
                                        data: 'image',
                                        attributes: { 
                                            'id': 'top',
                                            'directory': ''
                                        }, 
                                        state: 'closed'
                                    }
                                ];
					
                                return { 'directory': '' } 
                            } else {
                                TREE_OBJ.settings.data.opts.static = false;  
					
                                return { 'directory': $(NODE).attr('directory') } 
                            }
                        },		
                        onselect: function (NODE, TREE_OBJ) {
                            $.ajax({
                                url: '<?php echo $this->createUrl('/admin/fileManager/files'); ?>',
                                type: 'post',
                                data: 'directory=' + encodeURIComponent($(NODE).attr('directory')),
                                dataType: 'json',
                                success: function(json) {
                                    html = '<div>';
						
                                    if (json) {
                                        for (i = 0; i < json.length; i++) {
                                            html += '<a><img src="<?php echo $no_image; ?>" alt="" title="" /><br />' + ((json[i]['filename'].length > 15) ? (json[i]['filename'].substr(0, 15) + '..') : json[i]['filename']) + '<br />' + json[i]['size'] + '<input type="hidden" name="image" value="' + json[i]['file'] + '" /></a>';
                                        }
                                    }
						
                                    html += '</div>';
						
                                    $('#column-right').html(html);

                                    $('#column-right').trigger('scrollstop');	
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                }
                            });
                        }
                    }
                });	

                $('#column-right a').live('click', function() {
                    if ($(this).attr('class') == 'selected') {
                        $(this).removeAttr('class');
                    } else {
                        $('#column-right a').removeAttr('class');
			
                        $(this).attr('class', 'selected');
                    }
                });
	
                $('#column-right a').live('dblclick', function() {
                <?php if ($fckeditor) { ?>
                    window.opener.CKEDITOR.tools.callFunction(<?php echo $fckeditor; ?>, '<?php echo $directory; ?>' + $(this).find('input[name=\'image\']').attr('value'));
                    self.close();	
                <?php } else { ?>
                    parent.$('#<?php echo $field; ?>').attr('value', 'data/' + $(this).find('input[name=\'image\']').attr('value'));
                    parent.$('#imageManagerModal').modal('hide');
                <?php } ?>
        });		
						
        $('#create').bind('click', function() {
            var tree = $.tree.focused();
		
            if (tree.selected) {
                $('#dialog').remove();
			
                html  = '<div id="dialog">';
                html += '<?php echo Yii::t('filemanager', 'New folder'); ?> <input type="text" name="name" value="" /> <input type="button" value="<?php echo Yii::t('filemanager', 'Submit'); ?>" />';
                html += '</div>';
			
                $('#column-right').prepend(html);
			
                $('#dialog').dialog({
                    title: '<?php echo Yii::t('filemanager', 'New folder'); ?>',
                    resizable: false
                });	
			
                $('#dialog input[type=\'button\']').bind('click', function() {
                    $.ajax({
                        url: '<?php echo $this->createUrl('/admin/fileManager/create'); ?>',
                        type: 'post',
                        data: 'directory=' + encodeURIComponent($(tree.selected).attr('directory')) + '&name=' + encodeURIComponent($('#dialog input[name=\'name\']').val()),
                        dataType: 'json',
                        success: function(json) {
                            if (json.success) {
                                $('#dialog').remove();
							
                                tree.refresh(tree.selected);
							
                                alert(json.success);
                            } else {
                                alert(json.error);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                });
            } else {
                alert('<?php echo Yii::t('filemanager', 'Warning: Please select a directory!'); ?>');	
            }
        });
	
        $('#delete').bind('click', function() {
            path = $('#column-right a.selected').find('input[name=\'image\']').attr('value');
							 
            if (path) {
                $.ajax({
                    url: '<?php echo $this->createUrl('/admin/fileManager/delete'); ?>',
                    type: 'post',
                    data: 'path=' + encodeURIComponent(path),
                    dataType: 'json',
                    success: function(json) {
                        if (json.success) {
                            var tree = $.tree.focused();
					
                            tree.select_branch(tree.selected);
						
                            alert(json.success);
                        }
					
                        if (json.error) {
                            alert(json.error);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });				
            } else {
                var tree = $.tree.focused();
			
                if (tree.selected) {
                    $.ajax({
                        url: '<?php echo $this->createUrl('/admin/fileManager/delete'); ?>',
                        type: 'post',
                        data: 'path=' + encodeURIComponent($(tree.selected).attr('directory')),
                        dataType: 'json',
                        success: function(json) {
                            if (json.success) {
                                tree.select_branch(tree.parent(tree.selected));
							
                                tree.refresh(tree.selected);
							
                                alert(json.success);
                            } 
						
                            if (json.error) {
                                alert(json.error);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });			
                } else {
                    alert('<?php echo Yii::t('filemanager', 'Warning: Please select a directory or file!'); ?>');
                }			
            }
        });
	
        $('#move').bind('click', function() {
            $('#dialog').remove();
		
            html  = '<div id="dialog">';
            html += '<?php echo Yii::t('filemanager', 'Move'); ?> <select name="to"></select> <input type="button" value="<?php echo Yii::t('filemanager', 'Submit'); ?>" />';
            html += '</div>';

            $('#column-right').prepend(html);
		
            $('#dialog').dialog({
                title: '<?php echo Yii::t('filemanager', 'Move'); ?>',
                resizable: false
            });

            $('#dialog select[name=\'to\']').load('<?php echo $this->createUrl('/admin/fileManager/folders'); ?>');
		
            $('#dialog input[type=\'button\']').bind('click', function() {
                path = $('#column-right a.selected').find('input[name=\'image\']').attr('value');
							 
                if (path) {																
                    $.ajax({
                        url: '<?php echo $this->createUrl('/admin/fileManager/move'); ?>',
                        type: 'post',
                        data: 'from=' + encodeURIComponent(path) + '&to=' + encodeURIComponent($('#dialog select[name=\'to\']').val()),
                        dataType: 'json',
                        success: function(json) {
                            if (json.success) {
                                $('#dialog').remove();
							
                                var tree = $.tree.focused();
							
                                tree.select_branch(tree.selected);
							
                                alert(json.success);
                            }
						
                            if (json.error) {
                                alert(json.error);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                } else {
                    var tree = $.tree.focused();
				
                    $.ajax({
                        url: '<?php echo $this->createUrl('/admin/fileManager/move'); ?>',
                        type: 'post',
                        data: 'from=' + encodeURIComponent($(tree.selected).attr('directory')) + '&to=' + encodeURIComponent($('#dialog select[name=\'to\']').val()),
                        dataType: 'json',
                        success: function(json) {
                            if (json.success) {
                                $('#dialog').remove();
							
                                tree.select_branch('#top');
								
                                tree.refresh(tree.selected);
							
                                alert(json.success);
                            }						
						
                            if (json.error) {
                                alert(json.error);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });				
                }
            });
        });

        $('#copy').bind('click', function() {
            $('#dialog').remove();
		
            html  = '<div id="dialog">';
            html += '<?php echo Yii::t('filemanager', 'Copy'); ?> <input type="text" name="name" value="" /> <input type="button" value="<?php echo Yii::t('filemanager', 'Submit'); ?>" />';
            html += '</div>';

            $('#column-right').prepend(html);
		
            $('#dialog').dialog({
                title: '<?php echo Yii::t('filemanager', 'Copy'); ?>',
                resizable: false
            });
		
            $('#dialog select[name=\'to\']').load('<?php echo $this->createUrl('/admin/fileManager/folders'); ?>');
		
            $('#dialog input[type=\'button\']').bind('click', function() {
                path = $('#column-right a.selected').find('input[name=\'image\']').attr('value');
							 
                if (path) {																
                    $.ajax({
                        url: '<?php echo $this->createUrl('/admin/fileManager/copy'); ?>',
                        type: 'post',
                        data: 'path=' + encodeURIComponent(path) + '&name=' + encodeURIComponent($('#dialog input[name=\'name\']').val()),
                        dataType: 'json',
                        success: function(json) {
                            if (json.success) {
                                $('#dialog').remove();
							
                                var tree = $.tree.focused();
							
                                tree.select_branch(tree.selected);
							
                                alert(json.success);
                            }						
						
                            if (json.error) {
                                alert(json.error);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                } else {
                    var tree = $.tree.focused();
				
                    $.ajax({
                        url: '<?php echo $this->createUrl('/admin/fileManager/copy'); ?>',
                        type: 'post',
                        data: 'path=' + encodeURIComponent($(tree.selected).attr('directory')) + '&name=' + encodeURIComponent($('#dialog input[name=\'name\']').val()),
                        dataType: 'json',
                        success: function(json) {
                            if (json.success) {
                                $('#dialog').remove();
							
                                tree.select_branch(tree.parent(tree.selected));
							
                                tree.refresh(tree.selected);
							
                                alert(json.success);
                            } 						
						
                            if (json.error) {
                                alert(json.error);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });				
                }
            });	
        });
	
        $('#rename').bind('click', function() {
            $('#dialog').remove();
		
            html  = '<div id="dialog">';
            html += '<?php echo Yii::t('filemanager', 'Rename'); ?> <input type="text" name="name" value="" /> <input type="button" value="<?php echo Yii::t('filemanager', 'Submit'); ?>" />';
            html += '</div>';

            $('#column-right').prepend(html);
		
            $('#dialog').dialog({
                title: '<?php echo Yii::t('filemanager', 'Rename'); ?>',
                resizable: false
            });
		
            $('#dialog input[type=\'button\']').bind('click', function() {
                path = $('#column-right a.selected').find('input[name=\'image\']').attr('value');
							 
                if (path) {		
                    $.ajax({
                        url: '<?php echo $this->createUrl('/admin/fileManager/rename'); ?>',
                        type: 'post',
                        data: 'path=' + encodeURIComponent(path) + '&name=' + encodeURIComponent($('#dialog input[name=\'name\']').val()),
                        dataType: 'json',
                        success: function(json) {
                            if (json.success) {
                                $('#dialog').remove();
							
                                var tree = $.tree.focused();
					
                                tree.select_branch(tree.selected);
							
                                alert(json.success);
                            } 
						
                            if (json.error) {
                                alert(json.error);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });			
                } else {
                    var tree = $.tree.focused();
				
                    $.ajax({ 
                        url: '<?php echo $this->createUrl('/admin/fileManager/rename'); ?>',
                        type: 'post',
                        data: 'path=' + encodeURIComponent($(tree.selected).attr('directory')) + '&name=' + encodeURIComponent($('#dialog input[name=\'name\']').val()),
                        dataType: 'json',
                        success: function(json) {
                            if (json.success) {
                                $('#dialog').remove();
								
                                tree.select_branch(tree.parent(tree.selected));
							
                                tree.refresh(tree.selected);
							
                                alert(json.success);
                            } 
						
                            if (json.error) {
                                alert(json.error);
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                        }
                    });
                }
            });		
        });
	
        new AjaxUpload('#upload', {
            action: '<?php echo $this->createUrl('/admin/fileManager/upload'); ?>',
            name: 'image',
            autoSubmit: false,
            responseType: 'json',
            onChange: function(file, extension) {
                var tree = $.tree.focused();
			
                if (tree.selected) {
                    this.setData({'directory': $(tree.selected).attr('directory')});
                } else {
                    this.setData({'directory': ''});
                }
			
                this.submit();
            },
            onSubmit: function(file, extension) {
                $('#upload').append('<i class="icon-spinner loading" style="padding-left: 5px;" />');
            },
            onComplete: function(file, json) {
                if (json.success) {
                    var tree = $.tree.focused();
					
                    tree.select_branch(tree.selected);
				
                    alert(json.success);
                }
			
                if (json.error) {
                    alert(json.error);
                }
			
                $('.loading').remove();	
            }
        });
	
        $('#refresh').bind('click', function() {
            var tree = $.tree.focused();
		
            tree.refresh(tree.selected);
        });	
    });
    //--></script>
    </body>
</html>
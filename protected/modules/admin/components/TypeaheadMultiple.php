<?php

class TypeaheadMultiple extends CInputWidget {

    public $attribute;
    public $htmlOptions;
    public $url;
    
    private $_containerId;
    private $_nameId;

    function run() {
        if ($this->hasModel()) {            
            // required!
            $this->htmlOptions['autocomplete'] = 'off';
            
            echo CHtml::textField($this->attribute, $this->value, $this->htmlOptions);
            echo '<span class="help-block">' . Yii::t('common', '(Autocomplete)') . '</span>';
            CHtml::resolveNameID($this->model, $this->attribute, $this->htmlOptions);
            
            $this->_containerId = $this->htmlOptions['id'] . "_container";
            $this->_nameId = $this->htmlOptions['name'];
            
            echo "<div id='{$this->_containerId}' class='well scrollbox'>";
            if(count($this->model->attributes[$this->attribute]) > 0){
                $elements = $this->model->attributes[$this->attribute];
                foreach($elements as $id => $name)
                    echo "<div>{$name}<i class=\"icon-remove\"></i><input type=\"hidden\" value=\"{$id}\" name=\"{$this->_nameId}[]\"></div>";
            }
            echo "</div>";
            
            $this->registerScript();
        } else {
            // TODO: extend widget to support non-active input
            throw new CException(Yii::t('errors', 'TypeaheadMultiple doesn\'t support non-active records. Please add a model attribute to the widget to use.'));
        }
    }

    function registerScript() {   
        $jsRemove = "$('#{$this->_containerId} > div > i').on('click', function() {
                        $(this).parent().remove();
                    }); ";
        
        $js = "$('#{$this->attribute}').typeahead({
                    source: function(query, process) {
                        objects = [];
                        map = {};
                        $.get('{$this->url}', {query: query}, function(data){
                            for(var i=0; i<data.length; i++){
                                map[data[i].value] = data[i].id;
                                objects.push(data[i].value);
                            }
                            process(objects);
                        }, 'json');                
                    },
                    updater: function(item) {
                        $('#{$this->_containerId}').append('<div>' + item + '<i class=\"icon-remove\"></i><input type=\"hidden\" value=\"' + map[item] + '\" name=\"{$this->_nameId}[]\"></div>');                       
                        
                        {$jsRemove}
                        return null;
                    }
                });{$jsRemove}";
        
        list(,$id)=$this->resolveNameID();                
        Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $id, $js);
    }

}
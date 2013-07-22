<?php

class TypeaheadSingle extends CInputWidget {

    public $attribute;
    public $value;
    public $htmlOptions;
    public $url;

    function run() {
        if ($this->hasModel()) {            
            // required!
            $this->htmlOptions['autocomplete'] = 'off';
            
            echo CHtml::textField($this->attribute, $this->value, $this->htmlOptions);
            echo CHtml::activeHiddenField($this->model, $this->attribute);
            echo '<span class="help-block">' . Yii::t('common', '(Autocomplete)') . '</span>';
            
            $this->registerScript();
        } else {
            // TODO: extend widget to support non-active input
            throw new CException(Yii::t('errors', 'TypeaheadSingle doesn\'t support non-active records. Please add a model attribute to the widget to use.'));
        }
    }

    function registerScript() {
        CHtml::resolveNameID($this->model, $this->attribute, $this->htmlOptions);
        $nameId = $this->htmlOptions['id'];
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
                        $('#{$nameId}').val(map[item]);
                        return item;
                    }
                });";
        
        list(,$id)=$this->resolveNameID();                
        Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $id, $js);
    }

}
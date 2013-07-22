<script>
    $(document).ready(function() {
        $('<?php echo $label; ?>').typeahead({
            source: function(query, process) {
                objects = [];
                map = {};
                $.get('<?php echo $autocompleteUrl; ?>', {query: query}, function(data){
                    for(var i=0; i<data.length; i++){
                        map[data[i].value] = data[i].id;
                        objects.push(data[i].value);
                    }
                    process(objects);
                }, "json");                
            },
            updater: function(item) {
                $('<?php echo $value; ?>').val(map[item]);
                return item;
            }
        });
    });
</script>


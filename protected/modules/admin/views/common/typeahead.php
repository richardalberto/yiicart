<script>
    $(document).ready(function() {
        $('<?php echo $label; ?>').typeahead({
            source: function(query, process) {
                objects = [];
                map = {};
                $.get('<?php echo $autocompleteUrl; ?>', {query: query}, function(data){
                    $.each(data, function(i, object) {
                        map[object.label] = object;
                        objects.push(object.label);
                    });
                    process(objects);
                });                
            },
            updater: function(item) {
                $('<?php echo $value; ?>').val(map[item].id);
                return item;
            }
        });
    });
</script>


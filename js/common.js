$(document).ready(function() {
    $('#checkall').on('click', function(){        
        $("table tr td:nth-child(1) input[type=checkbox]").prop("checked", this.checked);
    });
});
    var max_key = -1;
    var table_footer;
   
    function add_textbox() {
        if(max_key == -1) {
            $.each(values, function(i, val) {
                if(i > max_key) max_key = i;
            });
        }
        max_key++;
        table_footer.before('<tr>' +
                            '<td>' + max_key + '</td>' +
                            '<td>' + '<input name="data[values][' + max_key + ']" type="text">' + '</td>' +
                            '</tr>');
    }
    $(document).ready(function() {
        $('#btn_add').click(add_textbox);
        table_footer = $("#tr_footer");
    });
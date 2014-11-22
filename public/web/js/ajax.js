$(document).foundation();
$(function() {
    $('#term').autocomplete({
        source: '/getdata',
        minLength: 2,
        select:function(e,ui) {
            $('#response').val(ui.item.id);
        }
    });

    $('#check').click(function () {
        var value = $(this).val();
        $.ajax({
            url: '/getstoreroom',
            data: {check: "value"},
            success: function (data) {
                $("#prodlist").html(data);
            }
        });
    });
});
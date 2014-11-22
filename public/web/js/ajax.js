$(document).foundation();
$(function() {
    $('#term').autocomplete({
        source: '/getdata',
        minLength: 2,
        select:function(e,ui) {
            $('#response').val(ui.item.id);
        }
    });

    $('#action').click(function () {
        prodList();
    });

    $('#store').click(function () {
        prodList();
    });

    function prodList() {

        var store = $('#store').is(':checked');
        var action = $('#action').is(':checked');
        var tree = $('#tree').val();
        var dev = $('#dev').val();

        $.ajax({
            method: "GET",
            url: '/getstoreroom',
            data: {store: store, action: action, tree: tree, dev: dev},
            success: function (data) {
                $("#area").html(data);
            }
        });
    }

});
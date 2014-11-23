$(document).foundation();
$(function() {
    $('#term').autocomplete({
        source: '/getdata',
        minLength: 2,
        select:function(e,ui) {
            $('#response').val(ui.item.id);
        }
    });


    $("#prod-sort li").on("click", function (e) {
        e.preventDefault();
        $(this).siblings("li").css("fontWeight", "normal");
        $(this).css("fontWeight", "bold");
    });

    $('#action').click(function () {
        prodList();
    });

    $('#store').click(function () {
        prodList();
    });

    $('#cheap').click(function () {
        prodList('cheap');
    });

    $('#expensive').click(function () {
        prodList('expensive');
    });

    $('#sell').click(function () {
        prodList('sell');
    });

    $('#fresh').click(function () {
        prodList('fresh');
    });

    function prodList(sort) {
        sort = typeof sort !== 'undefined' ? sort : 'cheap';

        var store = $('#store').is(':checked');
        var action = $('#action').is(':checked');
        var tree = $('#tree').val();
        var dev = $('#dev').val();

        $.ajax({
            method: "GET",
            url: '/getstoreroom',
            data: {store: store, action: action, tree: tree, dev: dev, sort: sort},
            success: function (data) {
                $("#area").html(data);
            }
        });
    }

});
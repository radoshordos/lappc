$(document).foundation({});

jQuery('a.gallery').colorbox();

$(function() {
    $('#term').autocomplete({
        source: '/getdata',
        minLength: 2,
        select:function(e,ui) {
            $('#response').val(ui.item.id);
        }
    });

    $("#prod-sort li a").on("click", function (e) {
        e.preventDefault();
        $( "#prod-sort li a" ).removeClass( "active" );
        $( this ).addClass( "active" );
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



    function getUrlParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++)
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam)
            {
                return sParameterName[1];
            }
        }
    }

    function prodList(sort) {

        var term = getUrlParameter('term');
        var store = $('#store').is(':checked');
        var action = $('#action').is(':checked');
        var tree = $('#tree').val();
        var dev = $('#dev').val();

        var hash = [];
        if (store == true) {
            hash.push('store=true');
        }
        if (action == true) {
            hash.push('action=true');
        }
        if (sort) {
            hash.push("sort=" + sort);
        }

        location.hash = hash.join("&");
        var data = {store: store, action: action, tree: tree, dev: dev, sort: sort, term: term };

        $.ajax({
            method: "GET",
            url: '/getstoreroom',
            data: data,
            success: function (data) {
                $("#area").html(data);
            }
        });
    }

});
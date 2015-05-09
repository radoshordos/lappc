$('#transport').click(function () {

    $("#platebni_karta").prop("disabled", false);
    $("#online-platba").prop("disabled", false);
    $("#bankovni-prevod").prop("disabled", false);
    $("#platba-dobirkou").prop("disabled", false);
    $("#osobni-prevzeti").prop("disabled", false);

    if ($("#zasilkovna").is(':checked')) {
        $("#platebni-karta").prop("disabled", false);
        $("#online-platba").prop("disabled", true).prop("checked", false);
        $("#bankovni-prevod").prop("disabled", true).prop("checked", false);
        $("#platba-dobirkou").prop("disabled", true).prop("checked", false);
        $("#osobni-prevzeti").prop("disabled", true).prop("checked", false);
    }

    if ($("#dobirka").is(':checked')) {
        $("#platebni-karta").prop("disabled", false);
        $("#online-platba").prop("disabled", true).prop("checked", false);
        $("#bankovni-prevod").prop("disabled", false);
        $("#platba-dobirkou").prop("disabled", false);
        $("#osobni-prevzeti").prop("disabled", true).prop("checked", false);
    }
});

$(document).foundation({});

jQuery('a.gallery').colorbox();
jQuery.extend(jQuery.colorbox.settings, {
    current: "{current}. obrázek z {total}",
    previous: "Předchozí",
    next: "Následující",
    close: "Zavřít",
    xhrError: "Obsah se nepodařilo načíst.",
    imgError: "Obrázek se nepodařilo načíst.",
    slideshowStart: "Spustit slideshow",
    slideshowStop: "Zastavit slideshow"
});

$('#deliverycheck').click(function () {


    if ($("#deliverycheck").is(':checked')) {
        $("#delivery-address").hide().slideToggle("slow");
    };

});



$(function () {





    $('#term').autocomplete({
        source: '/getdata',
        minLength: 2,
        select: function (e, ui) {
            $('#response').val(ui.item.id);
        }
    });

    $("#prod-sort li a").on("click", function (e) {
        e.preventDefault();
        $("#prod-sort li a").removeClass("active");
        $(this).addClass("active");
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

    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) {
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
        var group = $('#group').val();

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
        var data = {group: group, store: store, action: action, tree: tree, dev: dev, sort: sort, term: term};

        $.ajax({
            method: "GET",
            url: '/ajajtree',
            data: data,
            success: function (data) {
                $("#area").html(data);
            }
        });
    }
});
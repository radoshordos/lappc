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


$('#order-firm-check').click(function () {
    if ($("#order-firm-check").is(':checked')) {
        $("#order-firm-inputs").show("slow");
    } else {
        $("#order-firm-inputs").hide("slow");
        $("#f_company").val('');
        $("#f_ico").val('');
        $("#f_dic").val('');
    }
});

$('#order-delivery-check').click(function () {
    if ($("#order-delivery-check").is(':checked')) {
        $("#order-delivery-inputs").show("slow");
    } else {
        $("#order-delivery-inputs").hide("slow");
        $("#d_firstname").val('');
        $("#d_lastname").val('');
        $("#d_street").val('');
        $("#d_city").val('');
        $("#d_post_code").val('');
    }
});

/*
$(function () {
    $.widget("custom.catcomplete", $.ui.autocomplete, {
        _create: function () {
            this._super();
            this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)")
        }, _renderMenu: function (a, k) {
            var g = this, c = "";
            $.each(k, function (d, e) {
                e.category != c && (a.append("<li class='ui-autocomplete-category'>" + (1 == e.category ? jsLANG[0] : jsLANG[1]) + "</li>"), c = e.category);
                li = g._renderItemData(a, e);
                e.category && li.attr("aria-label", e.category + " : " + e.label)
            })
        }
    });
    $.ui.autocomplete.prototype._renderItem = function (a, k) {
        var g = this.term.split(" ").join("|"), g = new RegExp("(" + g + ")", "gi"), c = k.label.replace(g, "<b>$1</b>");
        if (k.ean)var d = k.ean.replace(g, "<b>$1</b>");
        return 1 == k.category && 0 == k.i ? $("<li></li>").data("item.autocomplete", k).append('<a><span class="img">' + k.img + '</span><span class="item">' + c + "<br><em>" + k.price + "</em>" + (k.ean ? ", ean: " + d : "") + "</span></a>").appendTo(a) : 1 == k.i ? $('<li class="ui-menu-item-2 ui-menu-item-3"></li>').data("item.autocomplete", k).append('<a><span class="item">' + k.label + "</span></a>").appendTo(a) :
            $('<li class="ui-menu-item-2"></li>').data("item.autocomplete", k).append('<a><span class="item">' + c + "</span></a>").appendTo(a)
    };
    plugoAutocomplete($(".ac_source"))
});
*/

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
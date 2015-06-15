<?php
##############################################################################
#
# PHP skript pro demonstraci vytvoreni kontrolniho souctu
# a navazani spojeni do aplikace i-Shop spolecnosti Home Credit.
#
# Skript je napsan v kodovani windows-1250 a mel by proto bez zasadnich
# uprav fungovat na systemech Microsoft Windows. Uprava skriptu pro
# vetsinu UNIXovych systemu by mela spocivat ve zmene hodnoty promenne 
# source_encoding na iso-8859-2. Pro systemy zalozene na UTF8 (Red Hat
# Linux apod.) staci skript prekodovat (napr. pomoci iconv) a odstranit
# radky s prekodovanim.
#
# Autor: David Olszynski <david.olszynski@homecredit.net>
# Datum: 3.7.2006
#
##############################################################################

# povinne udaje pro vstupni bod
$shop_code = '0999';
$order_code = substr('1224589654', 0, 10);
$goods_price = '11678,80';
$client_name = substr('Tomaš', 0, 30);
$client_surname = substr('Mateřídouška', 0, 30);
$goods_name = substr('Lednice na splátky', 0, 60);
$goods_producer = substr('ArdoBeko', 0, 50);
$request_time = date('d.m.Y-H:i:s');
$secret_code = 'w1vsg,tu7q';

# plain text pro kontrolni hash
$plain_text = $shop_code . $order_code . $goods_price . $client_name . $client_surname . $goods_name . $goods_producer . $request_time . $secret_code;

# hash
$checksum = md5($plain_text);

# vstupni bod aplikace Home Credit - i-Shop
$ishop_entry_point = 'https://i-shop-train.homecredit.net/ishop/entry.do';
$our_ishop_home = 'https://guru-naradi.cz';

# nepovinne udaje
$client_title = 'Bc';
$client_phone = '545987654';
$client_mobile = '606123456';
$client_email = 'nas.zakaznik@nekde.cz';
$client_p_street = 'Karla Šlapka';
$client_p_num = '45';
$client_p_city = 'Brno';
$client_p_zip = '61200';
$client_c_street = 'Karla Šlapka';
$client_c_num = '45';
$client_c_city = 'Brno';
$client_c_zip = '612 00';

# vstupni bod aplikace i-Shop se vsemi parametry
$url = $ishop_entry_point .
    '?shop=' . $shop_code .
    '&o_code=' . $order_code .
    '&o_price=' . $goods_price .
    '&c_name=' . urlencode($client_name) .
    '&c_surname=' . urlencode($client_surname) .
    '&g_name=' . urlencode($goods_name) .
    '&g_producer=' . urlencode($goods_producer) .
    '&ret_url=' . urlencode($our_ishop_home) .
    '&time_request=' . $request_time .
    '&sh=' . $checksum .
    '&c_title=' . $client_title .
    '&c_phone=' . $client_phone .
    '&c_mobile=' . $client_mobile .
    '&c_email=' . substr($client_email, 0, 40) .
    '&c_p_street=' . substr(urlencode($client_p_street), 0, 30) .
    '&c_p_num=' . substr(urlencode($client_p_num), 0, 10) .
    '&c_p_city=' . substr(urlencode($client_p_city), 0, 30) .
    '&c_p_zip=' . substr(urlencode($client_p_zip), 0, 6) .
    '&c_c_street=' . substr(urlencode($client_c_street), 0, 30) .
    '&c_c_num=' . substr(urlencode($client_c_num), 0, 10) .
    '&c_c_city=' . substr(urlencode($client_c_city), 0, 30) .
    '&c_c_zip=' . substr(urlencode($client_c_zip), 0, 6);

# misto redirectu je mozne realizovat pripojeni pres html formular
header('Location: ' . $url);

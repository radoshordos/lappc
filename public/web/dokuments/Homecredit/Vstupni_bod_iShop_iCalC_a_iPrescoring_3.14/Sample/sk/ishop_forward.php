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

$source_encoding = 'windows-1250';
$server_encoding = 'utf-8';

# povinne udaje pro vstupni bod
$shop_code      = '9993';
$order_code     = '23432415';
$goods_price    = '11678,80';
$client_name    = 'Pavel';
$client_surname = 'Koneèný';
$goods_name     = 'støešní krytina';
$goods_producer = 'Balexmetal';
$request_time   = date('d.m.Y-H:i:s');
$secret_code    = 'mfrkg/ut73';

# prekodovani
$client_name    = iconv($source_encoding, $server_encoding, $client_name);
$client_surname = iconv($source_encoding, $server_encoding, $client_surname);
$goods_name     = iconv($source_encoding, $server_encoding, $goods_name);
$goods_producer = iconv($source_encoding, $server_encoding, $goods_producer);

# plain text pro kontrolni hash
$plain_text = $shop_code . $order_code . $goods_price . $client_name .
              $client_surname . $goods_name . $goods_producer . $request_time .
              $secret_code;

# hash
$checksum = md5($plain_text);

# vstupni bod aplikace Home Credit - i-Shop
$ishop_entry_point = 'https://i-shopsk-train.homecredit.net/ishop/entry.do';
# url pro navrat
$our_ishop_home    = 'http://nasehomepage.cz';

# nepovinne udaje
$client_title   = 'Bc';
$client_phone   = '545987654';
$client_mobile  = '606123456';
$client_email   = 'nas.zakaznik@nekde.cz';
$client_p_street= 'Karla Èapka';
$client_p_num   = '45';
$client_p_city  = 'Brno';
$client_p_zip   = '61200';
$client_c_street= 'Karla Èapka';
$client_c_num   = '45';
$client_c_city  = 'Brno';
$client_c_zip   = '61200';

# prekodovani
$client_p_city  = iconv($source_encoding, $server_encoding, $client_p_city);
$client_p_street= iconv($source_encoding, $server_encoding, $client_p_street);
$client_c_city  = iconv($source_encoding, $server_encoding, $client_c_city);
$client_c_street= iconv($source_encoding, $server_encoding, $client_c_street);

# vstupni bod aplikace i-Shop se vsemi parametry
$url = $ishop_entry_point . 
       '?shop='         . $shop_code .
       '&o_code='       . $order_code .
       '&o_price='      . $goods_price .
       '&c_name='       . urlencode($client_name) .
       '&c_surname='    . urlencode($client_surname) .
       '&g_name='       . urlencode($goods_name) .
       '&g_producer='   . urlencode($goods_producer) .
       '&ret_url='      . urlencode($our_ishop_home) .
       '&time_request=' . $request_time .
       '&sh='           . $checksum .
       '&c_p_street='   . urlencode($client_p_street) .
       '&c_p_num='      . urlencode($client_p_num) .
       '&c_p_city='     . urlencode($client_p_city) .
       '&c_p_zip='      . urlencode($client_p_zip) .
       '&c_c_street='   . urlencode($client_c_street) .
       '&c_c_num='      . urlencode($client_c_num) .
       '&c_c_city='     . urlencode($client_c_city) .
       '&c_c_zip='      . urlencode($client_c_zip);

# misto redirectu je mozne realizovat pripojeni pres html formular
header('Location: ' . $url);

?>

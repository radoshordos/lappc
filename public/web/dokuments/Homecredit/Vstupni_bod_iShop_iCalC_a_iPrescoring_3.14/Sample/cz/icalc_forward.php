<?php

##############################################################################
#
# PHP skript pro demonstraci vytvoreni kontrolniho souctu
# a navazani spojeni do aplikace i-Calc spolecnosti Home Credit.
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
$shop_code = '0999';
$goods_price = '10000';
$request_time = date('d.m.Y-H:i:s');
$secret_code = 'w1vsg,tu7q';

# plain text pro kontrolni hash
$plain_text = $shop_code . $goods_price . $request_time . $secret_code;

# hash
$checksum = md5($plain_text);

# vstupni bod aplikace Home Credit - i-Shop
$ishop_entry_point = 'https://i-calc-train.homecredit.net/icalc/entry.do';


# vstupni bod aplikace i-Shop se vsemi parametry
$url = $ishop_entry_point .
    '?shop=' . $shop_code .
    '&o_price=' . $goods_price .
    '&time_request=' . $request_time .
    '&sh=' . $checksum;

# misto redirectu je mozne realizovat pripojeni pres html formular
header('Location: ' . $url);

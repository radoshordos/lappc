#!/usr/bin/perl

##############################################################################
#
# Perlovy skript pro demonstraci vytvoreni kontrolniho souctu
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

use strict;
use warnings;

use POSIX qw(strftime);
use Digest::MD5 qw(md5_hex);
use Encode;

my $source_encoding = 'cp1250';
my $server_encoding = 'UTF-8';

# povinne udaje pro vstupni bod
my $shop_code      = '9993';
my $order_code     = '123456789';
my $goods_price    = '11678,80';
my $client_name    = 'Pavel';
my $client_surname = 'Koneèný';
my $goods_name     = 'støešní krytina';
my $goods_producer = 'Balexmetal';
my $request_time   = strftime "%d.%m.%Y-%H:%M:%S", localtime;
my $secret_code    = 'mfrkg/ut73';

# prekodovani
Encode::from_to($client_name, $source_encoding, $server_encoding);
Encode::from_to($client_surname, $source_encoding, $server_encoding);
Encode::from_to($goods_name, $source_encoding, $server_encoding);
Encode::from_to($goods_producer, $source_encoding, $server_encoding);

# plain text pro kontrolni hash
my $plain_text = $shop_code . $order_code . $goods_price . $client_name .
                 $client_surname . $goods_name . $goods_producer .
                 $request_time . $secret_code;

# hash
my $checksum = md5_hex($plain_text);

# vstupni bod aplikace Home Credit - i-Shop
my $ishop_entry_point = 'https://i-shopsk-train.homecredit.net/ishop/entry.do';
# url pro navrat
my $our_ishop_home    = 'http://nasehomepage.cz';

# nepovinne udaje
my $client_title   = 'Bc';
my $client_phone   = '545987654';
my $client_mobile  = '606123456';
my $client_email   = 'nas.zakaznik@nekde.cz';
my $client_p_street= 'Karla Èapka';
my $client_p_num   = '45';
my $client_p_city  = 'Brno';
my $client_p_zip   = '61200';
my $client_c_street= 'Karla Èapka';
my $client_c_num   = '45';
my $client_c_city  = 'Brno';
my $client_c_zip   = '61200';

# prekodovani
Encode::from_to($client_p_city, $source_encoding, $server_encoding);
Encode::from_to($client_p_street, $source_encoding, $server_encoding);
Encode::from_to($client_c_city, $source_encoding, $server_encoding);
Encode::from_to($client_c_street, $source_encoding, $server_encoding);

# vstupni bod aplikace i-Shop se vsemi parametry
my $url = $ishop_entry_point .
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
print "Status: 302\n",
      "Location: $url\n\n";

sub urlencode
{
    my $str = shift;
    $str =~ s/([^A-Za-z0-9])/sprintf("%%%02X", ord($1))/seg;
    return $str;
}

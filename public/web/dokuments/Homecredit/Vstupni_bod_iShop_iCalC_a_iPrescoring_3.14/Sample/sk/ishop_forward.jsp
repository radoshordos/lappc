<%@page
   pageEncoding="UTF-8"
   contentType="text/html; charset=UTF-8"
   errorPage="/error.jsp"
   import="java.security.MessageDigest,java.text.SimpleDateFormat,java.util.Date,java.net.URLEncoder"
%>
<%--
JSP pro demonstraci vytvoreni kontrolniho souctu
a navazani spojeni do aplikace i-Shop spolecnosti Home Credit.

Autor: David Olszynski <david.olszynski@homecredit.net>
Datum: 7.11.2005
--%>
<%!
  /**
   * Konvertuje pole bytu na hex string (base 16).
   */
  public String toHexString(byte[] bytes)
  {
    StringBuffer buf = new StringBuffer();

    for (int i=0; i<bytes.length; i++)
    {
      int j = (int)bytes[i];
      if (j<0) j = 0x100+j;
      if (j<0x10) buf.append('0');
      buf.append( Integer.toHexString(j) );
    }
    return buf.toString();
  }
%>
<%
  StringBuffer sb = new StringBuffer();

  // povinne udaje     
  String shop = "9993";
  String order_code = "123456789";
  String order_price = "11678,80";
  String client_name = "Pavel";
  String client_surname = "Konečný";
  String goods_name = "střešní krytina";
  String goods_producer = "Balexmetal";
  String time_request = new SimpleDateFormat("dd.MM.yyyy-HH:mm:ss").format(new Date());
  String secret_code = "mfrkg/ut73";
  
  // plain text pro kontrolni hash
  String plainText = shop + order_code + order_price + client_name + client_surname + goods_name + 
                     goods_producer + time_request + secret_code;

  // hash
  byte[] wholeBytes = plainText.getBytes("UTF-8");
  MessageDigest md5 = MessageDigest.getInstance("MD5");
  md5.update(wholeBytes);
  byte[] md5Bytes = md5.digest();
  String hash = toHexString(md5Bytes);

  // vstupni bod aplikace Home Credit - i-Shop
  String ishopEntryPoint = "https://i-shopsk-train.homecredit.net/ishop/entry.do";
  // url pro navrat
  String ourIshopHome = "http://nasehomepage.cz";

  // nepovinne udaje
  String client_title   = "Bc";
  String client_phone   = "545987654";
  String client_mobile  = "606123456";
  String client_email   = "nas.zakaznik@nekde.cz";
  String client_p_street= "Karla Čapka";
  String client_p_num   = "45";
  String client_p_city  = "Brno";
  String client_p_zip   = "61200";
  String client_c_street= "Karla Čapka";
  String client_c_num   = "45";
  String client_c_city  = "Brno";
  String client_c_zip   = "61200";
  
  String url = ishopEntryPoint + 
      "?shop=" + shop +
      "&o_code=" + order_code +
      "&o_price=" + order_price +
      "&c_name=" + URLEncoder.encode(client_name) +
      "&c_surname=" + URLEncoder.encode(client_surname) +
      "&g_name=" + URLEncoder.encode(goods_name) +
      "&g_producer=" + URLEncoder.encode(goods_producer) +
      "&ret_url=" + URLEncoder.encode(ourIshopHome) +
      "&time_request=" + time_request +
      "&sh=" + hash +
      "&c_p_street=" + URLEncoder.encode(client_p_street) +
      "&c_p_num=" + client_p_num +
      "&c_p_city=" + URLEncoder.encode(client_p_city) +
      "&c_p_zip=" + client_p_zip +
      "&c_c_street=" + URLEncoder.encode(client_c_street) +
      "&c_c_num=" + client_c_num +
      "&c_c_city=" + URLEncoder.encode(client_c_city) +
      "&c_c_zip=" + client_c_zip;
      
  // misto redirectu je mozne realizovat pripojeni pres html formular
  response.sendRedirect(url);
%>

using System;
using System.Data;
using System.Configuration;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Web.UI.HtmlControls;
using System.Text;
using System.Security.Cryptography;

// Author: Petr Melichar, 13.11.2005

public partial class _Default : System.Web.UI.Page 
{
    String shop = "9993";
    String order_code = "123456789";
    String order_price = "11678,80";
    String client_name = "Pavel";
    String client_surname = "Koneèný";
    String goods_name = "støešní krytina";
    String goods_producer = "Balexmetal";
    String time_request = DateTime.Now.ToString("dd.MM.yyyy-HH:mm:ss");
    String secret_code = "mfrkg/ut73";
    String ishopEntryPoint = "https://i-shopsk-train.homecredit.net/ishop/entry.do";
    String ourIshopHome = "http://localhost/default.aspx";

    String client_title = "Bc";
    String client_phone = "545987654";
    String client_mobile = "606123456";
    String client_email = "nas.zakaznik@nekde.cz";
    String client_p_street = "Karla Èapka";
    String client_p_num = "45";
    String client_p_city = "Brno";
    String client_p_zip = "61200";
    String client_c_street = "Karla Èapka";
    String client_c_num = "45";
    String client_c_city = "Brno";
    String client_c_zip = "61200";
    
    MD5CryptoServiceProvider md5 = new MD5CryptoServiceProvider();


    protected void Page_Load(object sender, EventArgs e)
    {   
        String plainText = shop + order_code + order_price + client_name + client_surname + goods_name +
                     goods_producer + time_request + secret_code;
        byte[] wholeBytes = Encoding.UTF8.GetBytes(plainText);
        byte[] md5Bytes = md5.ComputeHash(wholeBytes);
        StringBuilder sb = new StringBuilder();
        for (int i = 0; i < md5Bytes.Length; i++)
        {
            sb.Append(md5Bytes[i].ToString("x2"));
        }
        String hash = sb.ToString();

        String url = ishopEntryPoint +
      "?shop=" + shop +
      "&o_code=" + order_code +
      "&o_price=" + order_price +
      "&c_name=" + HttpUtility.UrlEncode(client_name) +
      "&c_surname=" + HttpUtility.UrlEncode(client_surname) +
      "&g_name=" + HttpUtility.UrlEncode(goods_name) +
      "&g_producer=" + HttpUtility.UrlEncode(goods_producer) +
      "&ret_url=" + HttpUtility.UrlEncode(ourIshopHome) +
      "&time_request=" + time_request +
      "&sh=" + hash +
      "&c_p_street=" + HttpUtility.UrlEncode(client_p_street) +
      "&c_p_num=" + client_p_num +
      "&c_p_city=" + HttpUtility.UrlEncode(client_p_city) +
      "&c_p_zip=" + client_p_zip +
      "&c_c_street=" + HttpUtility.UrlEncode(client_c_street) +
      "&c_c_num=" + client_c_num +
      "&c_c_city=" + HttpUtility.UrlEncode(client_c_city) +
      "&c_c_zip=" + client_c_zip;

      // misto redirectu je mozne realizovat pripojeni pres html formular
      Response.Redirect(url);


    }
}

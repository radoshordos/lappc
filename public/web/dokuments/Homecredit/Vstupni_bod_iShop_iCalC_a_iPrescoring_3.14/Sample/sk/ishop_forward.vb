Imports System.Security.Cryptography
Imports System.Text

'Visual Basic .NET implementation
'Author:Petr Melichar,14.11.2005

Partial Class _Default
    Inherits System.Web.UI.Page

    Dim shop As String = "9993"
    Dim order_code As String = "123456789"
    Dim order_price As String = "11678,80"
    Dim client_name As String = "Pavel"
    Dim client_surname As String = "Koneèný"
    Dim goods_name As String = "støešní krytina"
    Dim goods_producer As String = "Balexmetal"
    Dim time_request As String = DateTime.Now.ToString("dd.MM.yyyy-HH:mm:ss")
    Dim secret_code As String = "mfrkg/ut73"
    Dim ishopEntryPoint As String = "https://i-shopsk-train.homecredit.net/ishop/entry.do"
    Dim ourIshopHome As String = "http://localhost/default.aspx"

    Dim client_title As String = "Bc"
    Dim client_phone As String = "545987654"
    Dim client_mobile As String = "606123456"
    Dim client_email As String = "nas.zakaznik@nekde.cz"
    Dim client_p_street As String = "Karla Èapka"
    Dim client_p_num As String = "45"
    Dim client_p_city As String = "Brno"
    Dim client_p_zip As String = "61200"
    Dim client_c_street As String = "Karla Èapka"
    Dim client_c_num As String = "45"
    Dim client_c_city As String = "Brno"
    Dim client_c_zip As String = "61200"

    Dim md5 As New MD5CryptoServiceProvider()

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load

        Dim plainText As String = shop + order_code + order_price + client_name + client_surname + goods_name + _
        goods_producer + time_request + secret_code


        Dim wholeBytes() As Byte = Encoding.UTF8.GetBytes(plainText)
        Dim md5Bytes() As Byte = md5.ComputeHash(wholeBytes)
        Dim sb As New StringBuilder()
        For i As Integer = 0 To md5Bytes.Length - 1
            sb.Append(md5Bytes(i).ToString("x2"))
        Next
        Dim hash As String = sb.ToString()

        Dim url As String = ishopEntryPoint & _
              "?shop=" & shop & _
              "&o_code=" & order_code & _
              "&o_price=" & order_price & _
              "&c_name=" & HttpUtility.UrlEncode(client_name) & _
              "&c_surname=" & HttpUtility.UrlEncode(client_surname) & _
              "&g_name=" & HttpUtility.UrlEncode(goods_name) & _
              "&g_producer=" & HttpUtility.UrlEncode(goods_producer) & _
              "&ret_url=" & HttpUtility.UrlEncode(ourIshopHome) & _
              "&time_request=" & time_request & _
              "&sh=" & hash & _
              "&c_p_street=" & HttpUtility.UrlEncode(client_p_street) & _
              "&c_p_num=" & client_p_num & _
              "&c_p_city=" & HttpUtility.UrlEncode(client_p_city) & _
              "&c_p_zip=" & client_p_zip & _
              "&c_c_street=" & HttpUtility.UrlEncode(client_c_street) & _
              "&c_c_num=" & client_c_num & _
              "&c_c_city=" & HttpUtility.UrlEncode(client_c_city) & _
              "&c_c_zip=" & client_c_zip

        ' misto redirectu je mozne realizovat pripojeni pres html formular
        Response.Redirect(url)





    End Sub
End Class

<?php
error_reporting('all');
mysql_connect("localhost","root","") or die ("Ket noi he qtcsdl khong thanh cong.");
mysql_select_db("webbanhang") or die ("Khong ton tai du lieu.");
mysql_query("set names 'utf8'");

?>
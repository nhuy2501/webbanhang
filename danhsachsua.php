<?php 
	require('class/myclass.php');
	$p = new xuli();

 ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<div>
    <a href="them.php">Thêm sữa</a>
</div>
	<h2 align="center">Thông Tin Sữa</h2>
<table width="1000" border="1" align="center">
<tr>
	<td>Mã sữa</td>
    <td>Tên sữa</td>
    <td>Hãng sữa</td>
    <td>Loại sữa</td>
    <td>Trọng lượng</td>
    <td>Đơn giá</td>
    <td>Thành phần dinh dưỡng</td>
    <td>Lợi ích</td>
    <td>Hình ảnh</td> 
<?php
	 $p->getBangSua();

?>
</body>
</html>
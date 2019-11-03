<?php
require('class/myclass.php');
	$p = new xuli();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<div>
    <a href="danhsachsua.php">Danh sách</a>
</div>
<body>
	<form  method="post" name="form1" enctype="multipart/form-data" >
		<table width="400" border="1" align="center">
			<tr>
				<td colspan="2" align="center"> THÔNG TIN SỮA </td>
			</tr>
			
			<tr>
				<td><label for="tensua">Tên sữa</label></td>
				<td>
					
					<input type="text" name="tensua"  id="tensua"></td>
			</tr>
			<tr>
				<td><label for="hangsua">Hãng sữa</label></td>
				<td>
					
					<input type="text" name="hangsua" id="hangsua"></td>
			</tr>
			<tr>
				<td><label for="loaisua">Loại sữa</label></td>
				<td>
					
					<input type="text" name="loaisua"  id="loaisua"></td>
			</tr>
			<tr>
				<td><label for="trongluong">Trọng lượng</label></td>
				<td>
					
					<input type="text" name="trongluong"  id="trongluong"></td>
			</tr>
			<tr>
				<td><label for="donggia">Đơn giá</label></td>
				<td>
					
					<input type="text" name="dongia"  id="donggia"></td>
			</tr>
			<tr>
				<td><label for="thanhphandinhduong">Thành phần dinh dưỡng</label></td>
				<td>
					<textarea name="thanhphandinhduong" id="thanhphandinhduong" cols="30" rows="5"></textarea>

			</tr>
			<tr>
				<td><label for="loiich">Lợi ích</label></td>
				<td>
					
					<textarea name="loiich" id="loiich" cols="30" rows="5"></textarea>

			</tr>
			<tr>
				<td><label for="donggia">Hình ảnh</label></td>
				<td>
					
					<input type="file" name="hinhanh"  id="hinhanh"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="nut" value="Them">
				</td>
			</tr>

		</table>
	</form>
	<?php 
 if(isset($_REQUEST['nut']) ){

 	$sanpham['tensua']=$_REQUEST['tensua'];
 	$sanpham['hangsua']=$_REQUEST['hangsua'];
 	$sanpham['loaisua']=$_REQUEST['loaisua'];
 	$sanpham['trongluong']=$_REQUEST['trongluong'];
 	$sanpham['dongia']=$_REQUEST['dongia'];
 	$sanpham['thanhphandinhduong']=$_REQUEST['thanhphandinhduong'];
 	$sanpham['loiich']=$_REQUEST['loiich'];
 	$sanpham['hinhanh']=$_FILES['hinhanh']['name'];
 	$sanpham['tmp']=$_FILES['hinhanh']['tmp_name'];
 	$sanpham['type']=$_FILES['hinhanh']['type'];
 	if ($p->insert($sanpham)==1){
 		echo'<script>
			alert("Insert thành công.");
			window.location="danhsachsua.php";
		</script>';
 	}else{
 		echo'Insert không thành công.';
 	}
}
 	?>
</body>
</html>
<?php
	require('class/myclass.php');
	$p = new xuli();
	if(isset($_GET['id'])){
		$id=$_GET['id'];

	}
	$sp = $p->getChitietbangsua($id);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

</head>
<body>
	
	<form  method="post" name="form1" enctype="multipart/form-data" >
		<table width="400" border="1" align="center">
			<tr>
				<td colspan="2" align="center"> THÔNG TIN SỮA </td>
			</tr>
			<tr>
				<td><label for="masua">Mã sữa</label></td>
				<td>
					
					<input type="text" name="masua" value="<?= $sp['masua'] ?>" id="masua"></td>
			</tr>
			<tr>
				<td><label for="tensua">Tên sữa</label></td>
				<td>
					
					<input type="text" name="tensua" value="<?= $sp['tensua'] ?>" id="tensua"></td>
			</tr>
			<tr>
				<td><label for="hangsua">Hãng sữa</label></td>
				<td>
					
					<input type="text" name="hangsua" value="<?= $sp['hangsua'] ?>" id="hangsua"></td>
			</tr>
			<tr>
				<td><label for="loaisua">Loại sữa</label></td>
				<td>
					
					<input type="text" name="loaisua" value="<?= $sp['loaisua'] ?>" id="loaisua"></td>
			</tr>
			<tr>
				<td><label for="trongluong">Trọng lượng</label></td>
				<td>
					
					<input type="text" name="trongluong" value="<?= $sp['trongluong'] ?>" id="trongluong"></td>
			</tr>
			<tr>
				<td><label for="donggia">Đơn giá</label></td>
				<td>
					
					<input type="text" name="dongia" value="<?= $sp['dongia'] ?>" id="donggia"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="nut" value="Cập nhập">
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
 	if ($p->update($id, $sanpham)==1){
 		echo'<script>
			alert("Update thành công.");
			window.location="bangsua.php?id='.$id.'";
		</script>';
 	}else
 	echo'Update không thành công.';

 }
 ?>
</body>
</html>
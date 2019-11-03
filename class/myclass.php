<?php 
class xuli
{
	function connect() {
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$database = 'webbanhang';
		$db = mysqli_connect($host, $username, $password, $database);
		if (! $db) {
			die('không kết nối được');
		}
		mysqli_set_charset($db,"utf8");
		return $db;
	}

	function getBangSua() {
		$db = $this->connect();
		$query = "SELECT * FROM thongtinsua";
		$result = mysqli_query($db, $query);
		while($row = mysqli_fetch_array($result)) {
			echo '<tr>
					<td><a href="bangsua.php?id='.$row['id'].'">'.$row['id'].'</a></td>
					<td><a href="bangsua.php?id='.$row['id'].'">'.$row['tensua'].'</a></td>
					<td><a href="bangsua.php?id='.$row['id'].'">'.$row['hangsua'].'</a></td>
					<td><a href="bangsua.php?id='.$row['id'].'">'.$row['loaisua'].'</a></td>
					<td><a href="bangsua.php?id='.$row['id'].'">'.$row['trongluong'].' gram</a></td>
					<td><a href="bangsua.php?id='.$row['id'].'">'.$row['dongia'].' VNĐ</a></td>
					<td><a href="bangsua.php?id='.$row['id'].'">'.$row['thanhphandinhduong'].' </a></td>
					<td><a href="bangsua.php?id='.$row['id'].'">'.$row['loiich'].' </a></td>
					<td><a href="bangsua.php?id='.$row['id'].'">'.$row['hinhanh'].' </a></td>
				</tr>';
		}
		
	}

	/**
	 * 
	 */

	function getChitietbangsua($id){
		$db = $this->connect();
		$query = "SELECT * FROM thongtinsua WHERE id='$id' ";
		$result = mysqli_query($db, $query);
		while ($row = mysqli_fetch_array($result)) {
			$sp['masua']=$row['id'];

			$sp['tensua']=$row['tensua'];

			$sp['hangsua']=$row['hangsua'];

			$sp['loaisua']=$row['loaisua'];
	
			$sp['trongluong']=$row['trongluong'];

			$sp['dongia']=$row['dongia'];

		}
		return $sp;
	}

	function update($id, $sanpham){
		$db=$this->connect();
		$tensua=$sanpham['tensua'];
		$hangsua=$sanpham['hangsua'];
		$loaisua=$sanpham['loaisua'];
		$trongluong=$sanpham['trongluong'];
		$dongia=$sanpham['dongia'];
		$query = "UPDATE thongtinsua 
		          SET tensua='$tensua', 
		              hangsua='$hangsua', 
		              loaisua='$loaisua',
		              trongluong='$trongluong',
		              dongia='$dongia'
		          WHERE id='$id';";
		if(mysqli_query($db, $query)){
			return 1;
		}
		return 0;

	}

	function upload ($name, $tmp, $type){
		if($type=='text/plain'){
			move_uploaded_file($tmp_name,'file/'.$name);

		}else{
			echo" Không đúng định dạng file.";
		}
	}

	function insert($id, $sanpham){
		$db=$this->connect();
		$tensua=$sanpham['tensua'];
		$hangsua=$sanpham['hangsua'];
		$loaisua=$sanpham['loaisua'];
		$trongluong=$sanpham['trongluong'];
		$dongia=$sanpham['dongia'];
		$thanhphandinhduong=$sanpham['thanhphandinhduong'];
		$loiich=$sanpham['loiich'];
		$hinhanh=$sanpham['hinhanh'];
		$query = "INSERT INTO thongtinsua (tensua, hangsua, loaisua, trongluong, dongia, thanhphandinhduong, loiich, hinhanh)
		          VALUES ('$tensua', '$hangsua', '$loaisua', '$trongluong', '$dongia', '$thanhphandinhduong', '$loiich', '$hinhanh')";

		if(mysqli_query($db, $query)){
			return 1;
		}
		return 0;

	}


}
?>
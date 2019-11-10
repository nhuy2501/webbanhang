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
		$num = mysqli_num_rows($result);
		if($num!=0) {
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
					<td><img src="file/'.$row['hinhanh'].'" width="100" ></td>
					<td><form  method="post" action="xoa.php">
					    <input type="hidden" value="'.$row['id'].'" name="idsp">
					    <input type="submit" name="xoa" value="Xóa">
                    </form></td>
				</tr>';
            }
        }

	}


	/**
	 * 
	 */

	function getChitietbangsua($id){
		$db = $this->connect();
		$query = "SELECT * FROM thongtinsua WHERE id='$id' ";
		$result = mysqli_query($db, $query);
		$num = mysqli_num_rows($result);
		if($num!=0) {
            while ($row = mysqli_fetch_array($result)) {
                $sp['masua']=$row['id'];

                $sp['tensua']=$row['tensua'];

                $sp['hangsua']=$row['hangsua'];

                $sp['loaisua']=$row['loaisua'];

                $sp['trongluong']=$row['trongluong'];

                $sp['dongia']=$row['dongia'];
                $sp['thanhphandinhduong'] = $row['thanhphandinhduong'];
                $sp['loiich'] = $row['loiich'];
                $sp['hinhanh'] = $row['hinhanh'];

            }
            return $sp;
        }
		return $sp='';

	}

	function update($id, $sanpham, $hinhanh){
		$db=$this->connect();
		$tensua=$sanpham['tensua'];
		$hangsua=$sanpham['hangsua'];
		$loaisua=$sanpham['loaisua'];
		$trongluong=$sanpham['trongluong'];
		$dongia=$sanpham['dongia'];
		$thanhphandinhduong = $_REQUEST['thanhphandinhduong'];
		$loiich = $_REQUEST['loiich'];
		if($hinhanh=='') {
            $query = "UPDATE thongtinsua 
		          SET tensua='$tensua', 
		              hangsua='$hangsua', 
		              loaisua='$loaisua',
		              trongluong='$trongluong',
		              dongia='$dongia',
		              thanhphandinhduong = '$thanhphandinhduong',
		              loiich = '$loiich'
		          WHERE id='$id';";
        } else {
		    $tenhinh = $hinhanh['hinhanh'];
		    $type = $hinhanh['type'];
		    $tmp = $hinhanh['tmp'];
            $query = "UPDATE thongtinsua 
		          SET tensua='$tensua', 
		              hangsua='$hangsua', 
		              loaisua='$loaisua',
		              trongluong='$trongluong',
		              dongia='$dongia',
		              thanhphandinhduong = '$thanhphandinhduong',
		              loiich = '$loiich',
		              hinhanh = '$tenhinh'
		          WHERE id='$id';";
            $this->upload($tenhinh, $tmp, $type);
        }
		if(mysqli_query($db, $query)){
			return 1;
		}
		return 0;

	}

	function upload ($name, $tmp, $type){
//		if($type!=='text/plain'){
			move_uploaded_file($tmp,'file/'.$name);

//		}else{
//			echo" Không đúng định dạng file.";
//		}
	}

	function insert($sanpham){
		$db=$this->connect();
		$tensua=$sanpham['tensua'];
		$hangsua=$sanpham['hangsua'];
		$loaisua=$sanpham['loaisua'];
		$trongluong=$sanpham['trongluong'];
		$dongia=$sanpham['dongia'];
		$thanhphandinhduong=$sanpham['thanhphandinhduong'];
		$loiich=$sanpham['loiich'];
		$hinhanh=$sanpham['hinhanh'];
		$type = $sanpham['type'];
		$tmp = $sanpham['tmp'];
		$query = "INSERT INTO thongtinsua (tensua, hangsua, loaisua, trongluong, dongia, thanhphandinhduong, loiich, hinhanh)
		          VALUES ('$tensua', '$hangsua', '$loaisua', '$trongluong', '$dongia', '$thanhphandinhduong', '$loiich', '$hinhanh')";

		if(mysqli_query($db, $query)){
		    $this->upload($hinhanh, $tmp, $type);
			return 1;
		}
		return 0;

	}

	function delete($id) {
	    $db = $this->connect();
	    $query = "DELETE FROM thongtinsua 
                  WHERE id = '$id'";
	    if(mysqli_query($db, $query)) {
	        return 1;
        }

	    return 0;
    }



}
?>
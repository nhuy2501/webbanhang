<?php
if($_SERVER['REQUEST_METHOD']!='POST') {
    echo '<script>
              window.location="danhsachsua.php";
        </script>';
} else {
    if(isset($_POST['idsp'])) {
        require('class/myclass.php');
        $p = new xuli();
        $idsp = $_POST['idsp'];
        if($p->delete($idsp)==1) {
            echo '<script>
            alert("Xóa thành công");
             window.location="danhsachsua.php";
        </script>';
        } else {
            echo '<script>
            alert("Xóa không thành công");
              window.location="danhsachsua.php";
        </script>';
        }

    }
}


?>
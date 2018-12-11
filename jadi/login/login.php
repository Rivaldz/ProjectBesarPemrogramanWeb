<?php
// Sesion Di jalankan
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
// membuat koneksi Ke MYSQL dan Database
$koneksi=mysqli_connect("localhost", "root","","abcd");
//include 'koneksi.php';

// mencari password berdasarkan usernam
$query = mysqli_query($koneksi,"SELECT * FROM logins
             WHERE username ='$username'");

$data  = mysqli_fetch_array($query);

if ($data['username'] && $password==$data['password']){

    // jika sesuai, maka buat session
        $_SESSION['username'] = $data['username'];
		$_SESSION['nama'] = $data['nama'];
        $_SESSION['hak_akses'] = $data['hak_akses'];
        if($data['hak_akses']=="Admin"){
            header("location:../home-admin.php");
        }else if($data['hak_akses']=="Member"){
            header("location:../home-member.php");
        }
}
else{
		?>
		<script language="JavaScript">
			alert('Username atau Password tidak sesuai. Silahkan diulang kembali!');
			document.location:'../home-admin.php';
            //document.location='../index.php';
		</script>
		<?php
    }
?>
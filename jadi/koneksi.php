<?php
//buka koneksi ke engine MySQL
	$Open = mysqli_connect("localhost","root","","abcd");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
?>

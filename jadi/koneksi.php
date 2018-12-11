<?php
//buka koneksi ke engine MySQL
	$Open = mysqli_connect("localhost","root","","abcd");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
//koneksi ke database
	// $Koneksi = mysqli_select_db("koperasi_new");
	// 	if (!$Koneksi){
	// 	die ("Koneksi ke Database Gagal !");
	// 	}
?>
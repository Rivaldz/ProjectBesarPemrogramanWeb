<div style="border:0; padding:10px; width:924px; height:auto;">
	<?php
		include "koneksi.php";
		if (isset($_GET['username'])) {
			$conn = mysqli_connect("localhost","root","","abcd");
			$username = $_GET['username'];
			$query   = "SELECT * FROM member WHERE username='$username'";
			$hasil   = mysqli_query($conn,$query);
			$data    = mysqli_fetch_array($hasil);
			$username	= $data['username'];
			$nama	= $data['nama'];
		}
		else {
			die ("Error. Tidak ada USERNAME yang dipilih Silakan cek kembali! ");	
		}
		//cek tabungan
		$cek= "SELECT tabungan FROM member WHERE username='$_GET[username]'";
		$query=mysqli_query($conn,$cek);
		$data=mysqli_fetch_array($query);
		$tabungan=$data['tabungan'];
		if ($tabungan == 0) {
		?>
				<script language="JavaScript">
				alert('Maaf, member ini tidak memiliki tabungan!');
				document.location='home-admin.php?page=list-tabungan';
				</script>
		<?php
		} else { //tampil form cuti
	?>
<form action="home-admin.php?page=ambil-tabungan" method="POST" name="form-ambil-tabungan">
	<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr height="46">
				<td width="10%">&nbsp;</td>
				<td width="25%">&nbsp;</td>
				<td width="65%"><font color="orange" size="2"><b>Form Pengambilan Tabungan</b></font></td>
			</tr>
		<tr>
			<td width="10%">&nbsp;</td>
			<td width="25%"><input type="button" value="Cancel" onclick=location.href="home-admin.php?page=list-tabungan" title="Cancel"><br /><br /></td>
			<td width="65%">&nbsp;</td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Username</td>
			<td><input name="username" type="text" size="25" value="<?=$username?>" disabled="disabled" />
				<input name="username" type="hidden" size="25" value="<?=$username?>" /></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Nama</td>
			<td><input name="nama" type="text" size="25" value="<?=$nama?>" disabled="disabled" />
				<input name="nama" type="hidden" value="<?=$nama?>" /></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Tanggal Ambil</td>
			<td><select name="tgl_ambil">
				<?php
					for ($i=1; $i<=31; $i++) {
						$tg = ($i<10) ? "0$i" : $i;
						echo "<option value='$tg'>$tg</option>";	
					}
				?>
				</select> -
				<select name="bln_ambil">
				<?php
					for($bln=1;$bln<=12;$bln++){
						$nama_bln = array (1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Aug","Sep","Okt","Nov","Des");
						echo "<option value=$bln>$nama_bln[$bln]</option>";
					}
				?>
				</select> - 
				<select name="thn_ambil">
				<?php
					for ($i=2015; $i<=2020; $i++) {
						echo "<option value='$i'>$i</option>";	
					}
				?>
				</select>
			</td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>Jumlah Ambil</td>
			<td><input type="text" name="jml_ambil" size="25" maxlength="10" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="submit" name="Submit" value="Ambil">&nbsp;&nbsp;&nbsp;
				<input type="reset" name="reset" value="Reset"></td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr height="46">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
</form>
<?php
	}
?>
</div>
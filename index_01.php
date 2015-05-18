<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trial PHP</title>
</head>

<body>
<?php
$variable_a="Hello World";
?>
<h2>1. Using Variable with PHP</h2>
<?php
echo $variable_a;
?>



<?php
$tbl_anggota=array(
array("TCID002","Endang",23,"Sunter Jaya","081328436455"),
array("TCID007","Akbar",25,"Ancol Jaya","081336253412"),
array("TCID012","Oce",21,"Depok Begal","081339346255"),
);

$tbl_matkul=array(
array("Kalkulus","TCID002","Kelas 1A"),
array("Metode Numerik","TCID007","Kelas 1B"),
array("Pemrograman lanjut","TCID012","Kelas 2A"),
);
?>

<h2>2. Manipulasi Database Menggunakan Array</h2>
<table border="1">
<tr>
	<td colspan="5" align="center"><b>Table Anggota</b></td>
</tr>
<tr>
	<th>Kode_Anggota</th>
    <th>Nama</th>
    <th>Umur</th>
    <th>Alamat</th>
    <th>No Telp</th>
</tr>
<?php
for($index1=0; $index1<=2; $index1++){
	echo"<tr>";
	for($index2=0; $index2<=4; $index2++)
	{
		echo "<td>".$tbl_anggota[$index1][$index2]."</td>";	
	}
	echo"</tr>";
}
?>
</table>
<table border="1">
<tr>
	<td colspan="3" align="center"><b>Tabel MataKuliah</b></td>
</tr>
<tr>
	<th>Kode_MatKul</th>
    <th>Kode_Anggota</th>
    <th>Kelas</th>
</tr>
<?php
for($index1=0; $index1<=2; $index1++){
	echo"<tr>";
	for($index2=0; $index2<=2; $index2++)
	{
		echo "<td>".$tbl_matkul[$index1][$index2]."</td>";	
	}
	echo"</tr>";
}
?>
</table>


<h2>3. PHP Constans</h2>
<?php
define('admin','honda');
define('user','mazda');
$cars=array(
array("mazda","RX-8"),
array("mazda","RX-7"),
array("honda","NSX"),
array("honda","jazz"),
array("toyota","yaris")
);


if(isset($_POST['kirim'])){
	$pick = $_POST['bilkon'];
foreach($cars as $asik){
echo"<table>";
	if (in_array($pick,$asik)){
		echo "<tr>";
		for($a=0; $a<=1;$a++)
		{
		echo "<td>".$asik[$a]."</td>";
		//echo "<td>".$asik[$a]."</td>";
		
		}
		echo "</tr>";	
		
		/*echo "<tr>";
		echo "<td>".$asik[0]."</td>";
		echo "<td>".$asik[1]."</td>";
		echo "</tr>";*/
	}
	echo"</table>";
}
}

/*$cars=array("mazda","nissan","honda","honda","mazda");


if(isset($_POST['kirim'])){
	if($_POST['bilkon']=="admin")
	{
		for($a=0; $a<5;$a++)
		{
			if(admin==$cars[$a])
			{
			echo $cars[$a]."<br>";	
			}
	
		}
	}
	else
	{
		for($a=0; $a<5;$a++)
		{
			if(user==$cars[$a])
			{
			echo $cars[$a]."<br>";	
			}
		}
	}
}*/
?>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<select name="bilkon">
	<option value=<?php echo admin ?>>admin</option>
    <option value=<?php echo user ?>>user</option>
</select>
</br>
<input type="submit" value="Kirim" name="kirim">
</form>


<h2>4.Page Counter</h2>
<?php
session_start();
if(isset($_SESSION['view']))
{
    $_SESSION['view']=$_SESSION['view']+1;
}
else
{
    $_SESSION['view']=1;
}
echo "Page Counter:".$_SESSION['view'];
?>

<h2>5.Function</h2>
<?php
$hasil="0";
$a=$_POST['bil1'];
$b=$_POST['bil2'];

if(isset($_POST['tambah'])){
		$hasil=$a+$b;
}
if(isset($_POST['kurang'])){
		$hasil=$a-$b;
}
if(isset($_POST['kali'])){
		$hasil=$a*$b;
}
if(isset($_POST['bagi'])){
		$hasil=$a/$b;
}
?>
<table>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
	<tr>
    	<td>bil1</td>
        <td><input type="text" name="bil1"></td>
    </tr>
    <tr>
    	<td>bil2</td>
        <td><input type="text" name="bil2"></td>
    </tr>
    <tr>
    	<td>hasil</td>
        <td><input type="text" name="hasil" disabled value="<?php echo $hasil ?>"></td>
    </tr>
     <tr>
     <td></td>
     <td><input type="submit" value="+" name="tambah"> <input type="submit" value="-" name="kurang"> <input type="submit" value="*" name="kali"> <input type="submit" value="/" name="bagi"></td>
    </tr>
</form>
</table>
</body>
</html>
<?php




session_start();

//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");

nocache;

//nilai
$judul = "cari jenis transport";
$juduli = $judul;



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nilai
$searchTerm = cegah($_GET['term']);


$sql="SELECT * FROM m_jenis_transport ".
		"WHERE nama LIKE '%".$searchTerm."%' ".
		"ORDER BY nama ASC LIMIT 0,5";
$hasil=mysqli_query($koneksi,$sql); 


while ($row = mysqli_fetch_array($hasil)) 
	{
	//user kd
	$namaku = balikin($row['nama']);
	

	$data[] = array("value1"=>$namaku,"label"=>"$namaku");
	}


echo json_encode($data);


exit();
?>
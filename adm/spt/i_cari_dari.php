<?php




session_start();

//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");

nocache;

//nilai
$judul = "cari tujuan";
$juduli = $judul;



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nilai
$searchTerm = cegah($_GET['query']);

$qx = mysqli_query($koneksi, "SELECT * FROM m_kota ".
								"WHERE nama LIKE '%".$searchTerm."%' ".
								"ORDER BY nama ASC");
$rowx = mysqli_fetch_assoc($qx);
$totalx = mysqli_num_rows($qx);

$data = array();


//jika ada
if (!empty($totalx))
	{
	do
		{
	    $i_nama = balikin($rowx["nama"]);
	    $data[] = "$i_nama";
	    }
    while ($rowx = mysqli_fetch_assoc($qx));
	
    echo json_encode($data);
	}


exit();
?>
<?php




session_start();

//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");

nocache;

//nilai
$filenya = "$sumber/adm/peg/i_cari_pegawai.php";
$filenyax = "$sumber/adm/peg/i_cari_pegawai.php";
$judul = "cari nama";
$juduli = $judul;




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nilai
$searchTerm = cegah($_GET['query']);


$query = "SELECT * FROM m_pegawai ".
			"WHERE nip LIKE '%".$searchTerm."%' ".
			"OR nama LIKE '%".$searchTerm."%' ".
			"ORDER BY nama ASC LIMIT 0,5";
$result = mysqli_query($koneksi, $query);

$data = array();


if (mysqli_num_rows($result) > 0)
    {
    while ($row = mysqli_fetch_assoc($result))
	    {
	    $i_nip = balikin($row["nip"]);
	    $i_nama = balikin($row["nama"]);
	    $data[] = "$i_nama NIP.$i_nip";
	    }

    echo json_encode($data);

	}



exit();
?>
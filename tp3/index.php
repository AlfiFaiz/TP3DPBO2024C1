<?php

include('config/db.php');
include('classes/DB.php');
include('classes/jenis_menu.php');
include('classes/bahan.php');
include('classes/menu.php');
include('classes/Template.php');

// buat instance menu
$listmenu = new menu($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listmenu->open();
// tampilkan data menu
$listmenu->getmenuJoin();

// cari menu
if (isset($_POST['btn-cari'])) {
    // methode mencari data menu
    $listmenu->searchmenu($_POST['cari']);
} else {
    // method menampilkan data menu
    $listmenu->getmenuJoin();
}

$data = null;

// ambil data menu
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listmenu->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 menu-thumbnail">
        <a href="detail.php?id=' . $row['id_menu'] . '">
            <div class="row justify-content-center">
            <img src="assets/images/' . $row['gambar'] . '" class="card-img-top" alt="' . $row['gambar'] . '">
            </div>
            <div class="card-body">
                <p class="card-text menu-nama my-0">' . $row['nama_menu'] . '</p>
                <p class="card-text nama-jenis">' . $row['nama_jenis'] . '</p>
                <p class="card-text">' . $row['keterangan'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listmenu->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_MENU', $data);
$home->write();

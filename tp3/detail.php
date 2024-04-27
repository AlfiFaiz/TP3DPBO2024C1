<?php

include('config/db.php');
include('classes/DB.php');
include('classes/jenis_menu.php');
include('classes/bahan.php');
include('classes/menu.php');
include('classes/Template.php');

$menu = new menu($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$menu->open();

$data = nulL;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $menu->getmenuById($id);
        $row = $menu->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['nama_menu'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/images/' . $row['gambar'] . '" class="img-thumbnail" alt="' . $row['gambar'] . '" width="60">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['nama_menu'] . '</td>
                                </tr>
                                <tr>
                                    <td>Jenis Menu</td>
                                    <td>:</td>
                                    <td>' . $row['nama_jenis'] . '</td>
                                </tr>
                                <tr>
                                    <td>Bahan-Bahan</td>
                                    <td>:</td>
                                    <td>' . $row['nama_bahan'] . '</td>
                                </tr>
                                <tr>
                                    <td>keterangan</td>
                                    <td>:</td>
                                    <td>' . $row['keterangan'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
            <a href="?id=' . $row['id_menu'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="detail.php?hapus=' . $row['id_menu'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
            </div>';
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($menu->deleteData($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
        }
    }
}

$menu->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_MENU', $data);
$detail->write();

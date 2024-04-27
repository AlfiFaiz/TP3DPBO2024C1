<?php

include('config/db.php');
include('classes/DB.php');
include('classes/jenis_menu.php');
include('classes/bahan.php');
include('classes/menu.php');
include('classes/Template.php');

$jenis_menu = new jenis_menu($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$jenis_menu->open();

$data = nulL;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $jenis_menu->getjenis_menuById($id);
        $row = $jenis_menu->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['nama_jenis'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['nama_jenis'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
            <a href="jenis_menu.php?id=' . $row['id_jenis'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="detail.php?hapus=' . $row['id_jenis'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
            </div>';
    }
}



$jenis_menu->close();
$detail = new Template('templates/upbahan.html');
$detail->replace('DATA_DETAIL_BAHAN', $data);
$detail->write();

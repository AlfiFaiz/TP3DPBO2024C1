<?php

include('config/db.php');
include('classes/DB.php');
include('classes/jenis_menu.php');
include('classes/bahan.php');
include('classes/menu.php');
include('classes/Template.php');

$bahan = new bahan($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$bahan->open();

$data = nulL;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $bahan->getbahanById($id);
        $row = $bahan->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['nama_bahan'] . '</h3>
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
                                    <td>' . $row['nama_bahan'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
            <a href="bahan.php?id=' . $row['id_bahan'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;<a href="detail.php?hapus=' . $row['id_bahan'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
            </div>';
    }
}



$bahan->close();
$detail = new Template('templates/upbahan.html');
$detail->replace('DATA_DETAIL_BAHAN', $data);
$detail->write();

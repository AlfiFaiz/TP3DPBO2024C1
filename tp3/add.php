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


        $data .= '<div class="card-header text-center">

        <form method="post">
        <div class="card-header text-center">
            Formulir Menu
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><input type="text" name="nama" value=""></td>
                                </tr>
                                <tr>
                                    <td>Jenis Menu</td>
                                    <td>:</td>
                                    <td><select name="jenis_menu">
                                    <option value="">Pilih Jenis Menu</option>
                                    
                                </select></td>
                                </tr>
                                <tr>
                                    <td>Bahan-Bahan</td>
                                    <td>:</td>
                                    <td><select name="jenis_menu">
                                    <option value="">Pilih Bahan Menu</option>
                                    
                                </select></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><textarea name="keterangan"></textarea></td>
                                </tr>
                                <tr>
                                <td>Upload Gambar</td>
                                <td>:</td>
                                <td><input type="file" name="gambar"></td>
                            </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit">Simpan</button>
            </div>
    </form>';



$menu->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_MENU', $data);
$detail->write();

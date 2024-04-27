<?php

class menu extends DB
{
    function getmenuJoin()
    {
        $query = "SELECT * FROM menu JOIN jenis_menu ON menu.jenis_menu=jenis_menu.id_jenis JOIN bahan ON menu.bahan_bahan=bahan.id_bahan ORDER BY menu.id_menu";

        return $this->execute($query);
    }

    function getmenu()
    {
        $query = "SELECT * FROM menu";
        return $this->execute($query);
    }

    function getmenuById($id)
    {
        $query = "SELECT * FROM menu JOIN jenis_menu ON menu.jenis_menu=jenis_menu.id_jenis JOIN bahan ON menu.bahan_bahan=bahan.id_bahan  WHERE id_menu=$id";
        return $this->execute($query);
    }

    function searchmenu($keyword)
    {
        $query = "SELECT * FROM menu JOIN jenis_menu ON menu.jenis_menu=jenis_menu.id_jenis JOIN bahan ON menu.bahan_bahan=bahan.id_bahan  WHERE nama_menu LIKE '%" . $keyword . "%'";
        return $this->execute($query);
    }

    function addData($data, $file)
    {

    }

    function updateData($id, $data, $file)
    {

    }

    function deleteData($id)
    {
        $query = "DELETE FROM menu WHERE id_menu = $id";
        return $this->execute($query);
    }
}

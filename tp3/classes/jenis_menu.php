<?php

class jenis_menu extends DB
{
    function getjenis_menu()
    {
        $query = "SELECT * FROM jenis_menu";
        return $this->execute($query);
    }

    function getjenis_menuById($id)
    {
        $query = "SELECT * FROM jenis_menu WHERE id_jenis=$id";
        return $this->execute($query);
    }

    function addjenis_menu($data)
    {
        $nama = $data['nama_jenis'];
        $query = "INSERT INTO jenis_menu VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updatejenis_menu($id, $data)
    {
        $query = "UPDATE jenis_menu SET nama_jenis = $data WHERE id_jenis = $id";
        return $this->execute($query);
    }

    function deletejenis_menu($id)
    {
        $query = "DELETE FROM jenis_menu WHERE id_jenis = $id";
        return $this->execute($query);
    }
}

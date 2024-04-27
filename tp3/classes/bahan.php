<?php

class bahan extends DB
{
    function getbahan()
    {
        $query = "SELECT * FROM bahan";
        return $this->execute($query);
    }

    function getbahanById($id)
    {
        $query = "SELECT * FROM bahan WHERE id_bahan=$id";
        return $this->execute($query);
    }

    function addbahan($data)
    {
        $nama = $data['nama_bahan'];
        $query = "INSERT INTO bahan VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updatebahan($id, $data)
    {
        $query = "UPDATE bahan SET nama_bahan = $data WHERE id_bahan = $id";
        return $this->execute($query);
    }

    function deletebahan($id)
    {
        $query = "DELETE FROM bahan WHERE id_bahan = $id";
        return $this->execute($query);
    }
}

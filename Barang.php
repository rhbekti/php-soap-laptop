<?php
include 'DB.php';

class Barang
{
    protected $konek;

    public function __construct()
    {
        $this->konek = new DB();
    }

    public function ambilData()
    {
        $hasil = $this->konek->db->query("SELECT * FROM barang");
        $data = [];

        foreach ($hasil as $row) {
            $data[] = [
                'id' => $row['id'],
                'nama' => $row['nama'],
                'harga' => $row['harga'],
            ];
        }

        return json_encode($data);
    }

    public function detailData($id)
    {
        $hasil = $this->konek->db->query("SELECT * FROM barang WHERE id = '$id'");
        $data = mysqli_fetch_assoc($hasil);
        $respon = [
            'id' => $data['id'],
            'nama' => $data['nama'],
            'harga' => $data['harga'],
        ];

        return json_encode($respon);
    }

    public function tambahData($nama, $harga)
    {
        return $this->konek->db->query("INSERT INTO barang(nama,harga) VALUES ('$nama','$harga')");
    }

    public function updateData($id, $nama, $harga)
    {
        return $this->konek->db->query("UPDATE barang SET nama = '$nama',harga = '$harga' WHERE id = '$id'");
    }

    public function deleteData($id)
    {
        return $this->konek->db->query("DELETE FROM barang WHERE id = '$id'");
    }
}

$opt = ["uri" => "http://localhost:8001/"];
$serv = new SoapServer(NULL, $opt);
$serv->setClass('Barang');
$serv->handle();

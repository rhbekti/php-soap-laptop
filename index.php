<?php

$opt = [
    "location" => "http://localhost:8001/Barang.php",
    "uri" => "http://localhost:8001/",
    "trace" => 1
];

$api = new SoapClient(NULL, $opt);

$data = json_decode($api->ambilData());

if (isset($_POST['delete'])) {
    $id = htmlspecialchars($_POST['delete']);

    try {
        $status = $api->deleteData($id);

        if ($status) {
            echo "<script>alert('Data berhasil dihapus');window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus');</script>";
        }
    } catch (SoapFault $e) {
        echo $api->__getLastResponse();
        echo $e->getMessage();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="card shadow border-0 p-4">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title">Data Laptop</h5>
                    <div>
                        <a href="create.php" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            <?php
                            if ($data) :
                                $no = 1;
                                foreach ($data as $barang) :
                            ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $barang->nama ?></td>
                                        <td><?= 'Rp ' . number_format($barang->harga, 0, ',', '.') ?></td>
                                        <td class="d-flex gap-2">
                                            <a href="edit.php?id=<?= $barang->id ?>" class="btn btn-warning">Edit</a>
                                            <form action="" method="post">
                                                <button type="submit" onclick="return confirm('Hapus data?')" name="delete" value="<?= $barang->id ?>" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
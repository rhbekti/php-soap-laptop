<?php

$id = htmlspecialchars($_GET['id']);

try {
    $api = new SoapClient(NULL, [
        "location" => "http://localhost:8001/Barang.php",
        "uri" => "http://localhost:8001/",
        "trace" => 1
    ]);

    $data = json_decode($api->detailData($id));
} catch (SoapFault $e) {
    echo $e->getMessage();
}

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $harga = htmlspecialchars($_POST['harga']);

    $status = $api->updateData($id, $nama, $harga);

    if ($status) {
        echo "<script>window.location.href='index.php';</script>";
        exit;
    }

    echo "<script>alert('data gagal diperbarui');</script>";
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
                    <h5 class="card-title">Edit Data Laptop</h5>
                    <div>
                        <a href="index.php" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
                <hr>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Barang</label>
                        <input type="text" name="nama" id="nama" value="<?= $data->nama ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input type="number" name="harga" id="harga" value="<?= $data->harga ?>" class="form-control">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
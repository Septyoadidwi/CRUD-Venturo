<?php 
    if ( !empty($_POST)) { 
    
        $kode = $_POST['kode'];
        $nama  = $_POST['nama'];
        $qty    = $_POST['qyt'];
        $harga = $_POST['harga'];
      
        $file = file_get_contents('barang.json');
        $data = json_decode($file, true);
        unset($_POST["add"]);
        $data["records"] = array_values($data["records"]);
        array_push($data["records"], $_POST);
        file_put_contents("barang.json", json_encode($data));
        header("Location: index_crudjson.php");
    }
?>
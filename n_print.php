<?php 
    $data = file_get_contents('barang.json');
    $barang = json_decode($data, true);
    $barang = $barang['records']; 

                                        
    function rupiah($angka){
	
        $hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
        return $hasil_rupiah;        
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <title>PRINT</title>
  </head>
  <body>
    
  <div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Item</th>
                                <th>Nama Item</th>
                                <th>QTY</th>
                                <th>Harga</th>
                                <th>Subtotal</th>              
                            </tr>
                        </thead>                                 
                        <tbody>
                            <?php 
                            $no=0;
                            foreach($barang as $index => $row) : $no++;
                            $id= $row['kode'];
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row["kode"]; ?></td>
                                <td class="text-md-left"><?= $row["nama"]; ?></td>
                                <td><?= $row["qty"]; ?></td>
                                <td><?= rupiah($row["harga"]); ?></td>
                                <td><?= rupiah($row["qty"] *= $row["harga"]); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-auto">
       <div class="col">
       <div class="card">
            <div class="card-body">
                <div class="row">
                <div class="col-9">
                <h5 class="card-title">TOTAL BAYAR:</h5>
                <?php 
                     $total = 0;
                     foreach($barang as $row=>$value){
                        $tbayar = $value["harga"] *= $value["qty"];
                        $total += $tbayar;
                     }
                ?>
                <h2 class="card-text"><?= rupiah($total); ?></h2>
                </div>
                <div class="col-3 justify-content-end">                    
                    <button name="" id="printPageButton" class="btn btn-danger btn-lg d-inline" onclick="location.href='index_crudjson.php'" role="button"><i class="fa fa-times" aria-hidden="true"></i> Cancle</button>    
                    <button type="button" id="btnprint" class="btn btn-success btn-lg d-inline" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
                </div>
                </div>
            </div>
        </div>
       </div>
    </div>    
  </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
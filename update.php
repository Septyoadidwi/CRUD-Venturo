<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('barang.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('barang.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    $post["kode"] = isset($_POST["kode"]) ? $_POST["kode"] : "";
    $post["nama"] = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $post["qty"] = isset($_POST["qty"]) ? $_POST["qty"] : "";
    $post["harga"] = isset($_POST["harga"]) ? $_POST["harga"] : "";

    if ($jsonfile) {
        unset($all["records"][$id]);
        $all["records"][$id] = $post;
        $all["records"] = array_values($all["records"]);
        file_put_contents("barang.json", json_encode($all));
    }
    header("Location:index_crudjson.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <h3>UPDATE BARANG</h3>
        </div>
                    
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
        <div class="container">
            <div class="row">
                <?php if (isset($_GET["id"])): ?>
        <form method="POST" action="update.php">
        <div class="col-md-6">
        <input type="hidden" value="<?php echo $id ?>" name="id"/>
        <div class="form-group">
            <label for="inputkode">Kode</label>
            <input type="text" class="form-control-lg" required="required" id="inputkode" value="<?php echo $jsonfile["kode"] ?>" name="kode" placeholder="kode">
            <span class="help-block"></span>
        </div>
        
        <div class="form-group">
            <label for="inputnama">Nama</label>
            <input type="text" class="form-control-lg" required="required" id="inputnama" value="<?php echo $jsonfile["nama"] ?>" name="nama" placeholder="Nama">
            <span class="help-block"></span>
        </div>
        
        <div class="form-group">
            <label for="inputqty">qty</label>
            <input type="number" required="required" class="form-control-lg" id="inputqty" value="<?php echo $jsonfile["qty"] ?>" 
            name="qty" placeholder="qty">
            <span class="help-block"></span>
        </div>
        
        
        <div class="form-group">
        <label for="inputharga">Harga</label>
            <input type="number" required="required" class="form-control-lg" id="inputharga" value="<?php echo $jsonfile["harga"] ?>" 
            name="harga" placeholder="harga">
            <span class="help-block"></span>
        </div>
        
        <div class="form-inline">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn btn-danger" href="index_crudjson.php">Back</a>
        </div>
        </div>
        </form>
        <?php endif; ?>     
            </div> 
           </div> 
         </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
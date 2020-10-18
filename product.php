<?php
require_once 'core/init.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <title>Re-Motorbike</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/productPage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../proto-remotorbike/css/main.css">

</head>
<?php include 'includes/navigation.php';


#GET the id from product page to dynamically load the data
if (isset($_GET['id'])) {
    $id = preg_replace('#[^0-9]#i', "", $_GET['id']);
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $results = $db->query($sql);
    $productCount = mysqli_num_rows($results);

    if ($productCount > 0) {
        $product = mysqli_fetch_assoc($results);
    } else {
        echo "Product does not exist.";
        exit();
    }
} else {
    echo "Data does not exists";
    exit();
}

?>

<body>
    <h1 class="text-info mx-auto">[TODO]</h1>
    <div class="col-md-12 mb-4">
        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                <div class="tab-pane active text-center" id="pic-1"><img src="<?= $product['img']; ?>" style="height: 200px; width: 200px " /></div>
                                <!-- <div class="tab-pane" id="pic-2"><img src="" /></div>
                            <div class="tab-pane" id="pic-3"><img src="" /></div>
                            <div class="tab-pane" id="pic-4"><img src="" /></div>
                            <div class="tab-pane" id="pic-5"><img src="" /></div> -->
                            </div>

                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title text-center"><?= $product['name']; ?></h3>

                            <p class=" font-weight-bold">Description:</p>
                            <p class="product-description"><?= $product['description']; ?></p><br>
                            <h4 class="price">Price per day: <span>₱<?= $product['price']; ?></span></h4><br>



                            <h5 class="sizes">Quantity:</h5>
                            <h5 class="colors">Days:</h5>
                            <div class="action">
                                <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                                <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>
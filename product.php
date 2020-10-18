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
    <!-- main content -->
    <h1 class="text-info mx-auto">[TODO]</h1>
    <div class="col-md-12 mb-4">
        <div class="container">
            <div class="card">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                <div class="tab-pane active text-center" id="pic-1"><img src="<?= $product['img']; ?>" style="height: 200px; width: 200px " /></div>
                                <!-- <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
                            <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
                            <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
                            <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div> -->
                            </div>

                            <!-- <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                            <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                            <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                            <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                            <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                        </ul> -->

                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title text-center"><?= $product['name']; ?></h3>
                            <!-- <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div> -->
                            <p class=" font-weight-bold">Description:</p>
                            <p class="product-description"><?= $product['description']; ?></p><br>
                            <h4 class="price">Price per day: <span>₱<?= $product['price']; ?></span></h4><br>



                            <h5 class="sizes">Quantity:


                                <!-- <span class="size" data-toggle="tooltip" title="small">s</span>
                            <span class="size" data-toggle="tooltip" title="medium">m</span>
                            <span class="size" data-toggle="tooltip" title="large">l</span>
                            <span class="size" data-toggle="tooltip" title="xtra large">xl</span> -->


                            </h5>
                            <h5 class="colors">Days:

                                <!-- <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                            <span class="color green"></span>
                            <span class="color blue"></span>
                             -->
                            </h5>
                            <div class="action">
                                <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                                <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="row">
        
        <div class="col-md-8 fill">
            <img src="<?= $product['img']; ?>" alt="<?= $product['title'] ?>" class="rounded center mx-auto d-block"  style="width:50%">
        </div>

        <div class="col-md-4">
            <h4><?= $product['name'] ?></h4>
            <p><?= $product['description'] ?></p>
            <p><?= $product['price'] ?></p>
        </div> -->

    </div>
    </div>

    <?php
    include 'includes/footer.php';
    ?>
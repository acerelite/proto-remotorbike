<?php
require_once 'core/init.php';

#These files are located in includes folder
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/leftbar.php';

#Page counter logic with database data retrieval
$limit = 9;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$sql = "SELECT * FROM products LIMIT $start,$limit";
$results  = $db->query($sql);

$sql = "SELECT count(id) AS id FROM products";
$countResult  = $db->query($sql);
$countPage = $countResult->fetch_all(MYSQLI_ASSOC);
$total = $countPage[0]['id'];
$pages = ceil($total / $limit);

$previous = $page - 1;
$next = $page + 1;
?>


<!-- Product Card -->
<div class="col">
  <div class="row">

  <!-- Get details per row -->
    <?php while ($product = mysqli_fetch_assoc($results)) : ?>
      <div class="col-12 col-md-6 col-lg-4 mb-3">
        <div class="card">
          <img class="card-img-top img-fluid" src="<?= $product['img']; ?>" alt="<?= $product['title']; ?>">
          <div class="card-body">
            <h4 class="card-title"><a href="product.php?id=<?= $product['id']; ?>" title="View Product"><?= $product['name']; ?></a></h4>

            <!-- Get the brand name -->
            <?php
            $brandId = $product['brand_id'];
            $sql = "SELECT * FROM brands WHERE id = '$brandId'";
            $brandResults  = $db->query($sql);
            $brand = mysqli_fetch_assoc($brandResults);
            ?>

            <p class="card-text">Brand: <?= $brand['name']; ?></p>
            <div class="row">
              <div class="col">
                <h5 class="font-weight-bold text-info">₱<?= $product['price']; ?>/day</h5>
              </div>
              <div class="col">
                <a href="product.php?id=<?= $product['id'] ?>" class="btn btn-info btn-block">View</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    <?php endwhile; ?>
  </div>

  <!-- Page Counter 1,2,3.... -->
  <div class="col-12 d-flex justify-content-center mt-5">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php for ($i = 1; $i <= $pages; $i++) : ?>
          <li class="page-item <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>
      </ul>
    </nav>
  </div>

</div>

<?php
include 'includes/footer.php';
?>
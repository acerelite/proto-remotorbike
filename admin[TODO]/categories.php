<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/remotorbike/core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';

$sql = "SELECT * FROM categories WHERE parent= 0";
$result = $db->query($sql);
$errors = array();

//Delete Category
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $delete_id = (int)$_GET['delete'];
    $delete_id = sanitize($delete_id);
    $delsql =  "DELETE FROM categories WHERE id = '{$delete_id}' OR parent = '{$delete_id}'";
    $db->query($delsql);
    header('Location: categories.php');
}

//Process form
if (isset($_POST) && !empty($_POST)) {
    $parent = sanitize($_POST['parent']);
    $category = sanitize($_POST['category']);
    $sqlform = "SELECT * FROM categories WHERE category = '$category' AND parent = '$parent'";
    $result = $db->query($sqlform);
    $count = mysqli_num_rows($result);
    //if category is blank
    if ($category == '') {
        $errors[] .= "Category cannot be left blank";
    }

    //if exists in the database
    if ($count > 0) {
        $errors[] .= $category . 'already exists';
    }

    //Display errors or update database
    if (!empty($errors)) {
        //display errors
        $display = display_errors($errors); ?>
        <script>
            jQuery('document').ready(function() {
                jQuery('#errors').html('<?= $display; ?>');
            });
        </script>
<?php
    } else {
        //update database
        $sqlupdate = "INSERT INTO categories (category, parent) VALUES ('$category','$parent')";
        $db->query($sqlupdate);
        header('Location: categories.php');
    }
}
?>
<h2 class="text-center">Categories</h2>
<hr>
<div class="row">

    <!-- Form -->
    <div class="col-md-6">
        <form class="form" action="categories.php" method="POST">
            <legend>Add a Category</legend>
            <div id="errors"></div>
            <div class="form-group">
                <label for="parent">Parent</label>
                <select class="form-control" name="parent" id="parent">
                    <option value="0">Parent</option>
                    <?php while ($parent = mysqli_fetch_assoc($result)) : ?>
                        <option value="<?= $parent['id']; ?>"><?= $parent['category']; ?></option>
                    <?php endwhile ?>
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category">
            </div>

            <div class="form-group">
                <input type="submit" value="Add Category" class="btn btn-success">
            </div>
        </form>
    </div>

    <!-- category table -->
    <div class="col-md-6">
        <table class="table table-bordered">
            <thead>
                <th>Category</th>
                <th>Parent</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM categories WHERE parent= 0";
                $result = $db->query($sql);
                while ($parent = mysqli_fetch_assoc($result)) :
                    $parent_id = $parent['id'];
                    $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
                    $childresult = $db->query($sql2); ?>

                    <tr class="bg-primary">
                        <td><?= $parent['category']; ?></td>
                        <td>Parent</td>
                        <td>
                            <a href="categories.php?edit=<?= $parent['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a href="categories.php?delete=<?= $parent['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a>
                        </td>
                    </tr>

                    <?php while ($child = mysqli_fetch_assoc($childresult)) : ?>
                        <tr class="bg-info">
                            <td><?= $child['category']; ?></td>
                            <td><?= $parent['category']; ?></td>
                            <td>
                                <a href="categories.php?edit=<?= $child['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="categories.php?delete=<?= $child['id']; ?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include 'includes/footer.php';
?>
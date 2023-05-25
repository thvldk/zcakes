
<!DOCTYPE html>
<html>

<head>
    <title>Add product</title>
    <!-- Link to Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>Add product</h1>
                <?php
                if(isset($_GET['status'])){?>
                    <div class="alert alert-secondary"><?php echo htmlentities($_GET['status']);?></div>
                <?php }
                ?>

                <form action="insert.php" method="post" enctype="multipart/form-data">

                    <div class="form-group mb-4">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="product_price">Product Price</label>
                        <input type="number" class="form-control" id="product_price" name="product_price" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_desc">Product Description</label>
                        <textarea class="form-control" id="product_desc" name="product_desc" required></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_img">Product Image</label>
                        <input type="file" id="product_img" name="product_img" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="product_cat">Product Category</label>
                        <select name="product_cat" id="product_cat" class="form-control">
                            <?php
                $category = query($conn,"SELECT * FROM `z_category`");
                foreach($category as $cat ){ ?>
                            <option value="<?php echo $cat['category_id'];?>"><?php echo $cat['item_category'];?></option>
                            <?php }
                ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" value="Done" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>


    </div>

    <!-- Link to jQuery -->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>-->
    <!-- Link to Bootstrap JS -->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

</body>

</html>
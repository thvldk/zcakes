<?php
ini_set('display_errors','1');
ini_set('display_startup_errors','1');

error_reporting(E_ALL);
if(isset($_GET['updateitem'])){
    
$product_id = htmlentities($_GET['updateitem']);
$item_details=query($conn, "SELECT * FROM z_products p
                        INNER JOIN z_category c ON p.category_id = c.category_id
                        WHERE p.product_id = '{$product_id}'
                        LIMIT 1
                    "); 
foreach($item_details as $item){ ?>
    
    <!DOCTYPE html>
<html>

<head>
    <title>Update Item</title>
    <!-- Link to Bootstrap CSS -->
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">-->

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <h1>Update Item</h1>
                <?php 
                if(isset($_GET['status'])){?>
                    
                    <div class="alert alert-secondary"><?php echo $_GET['status'];?></div>
                <?php }
                ?>

                <form action="update.php" method="post" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold"  for="product_name">Product Name</label>
                        <input type="hidden" class="form-control" id="product_id" name="product_id" value="<?php echo $z_products['product_id'];?>" >
                        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo ucwords($item['product_name']);?>" readonly="readonly" required>
                    </div>

                    <div class="form-group mb-3">
                        <div class="input-group">
                            <input type="number" class="form-control" id="product_price" name="product_price" value="<?php echo ucwords($z_products['product_price']);?>" required placeholder="Price">                            
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold"  for="item_desc">Item Description</label>
                        <textarea class="form-control" id="item_desc" name="item_desc" required><?php echo ucwords($item['item_desc']);?></textarea>
                    </div>
                    <div class="mb-3 w-25">
                        <img src="../img/<?php echo  $item['item_file'];?>" alt="" class="img-fluid object-fit-lg-contain border rounded">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold"  for="product_photo">Product Image</label>
                        <input type="file" id="product_photo" name="product_photo">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label fw-semibold"  for="item_cat">Product Category</label>
                        <select name="item_cat" id="item_cat" class="form-control">
                            <option value=" <?php echo $z_products['category_id'];?>"> <?php echo ($z_products['cat_desc']);?></option>
                           
                            <?php    $item_cat = $item['category_id'];
                $category = query($conn,"SELECT * FROM `z_category` where category_id <> '$category_name' ;");
                foreach($category as $cat ){ ?>
                            <option value="<?php echo $cat['category_id'];?>"><?php echo $cat['cat_desc'];?></option>
                            <?php }
                ?>
                        </select>
                    </div>

                   

                    <button type="submit" name="submit" value="Done" class="btn btn-lg btn-primary">Submit</button>

                </form>
            </div>
        </div>


    </div>

 
</body>

</html>
<?php } ?>


<?php }
else{
    header("location: index.php");
    
}?>
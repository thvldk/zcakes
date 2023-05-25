
<?php

    // SQL FOR CUSTOMIZATION


    function getCategory($category_id, $conn) {
        $sql = "SELECT * FROM z_category WHERE category_id = $category_id";
        $result = mysqli_query($conn, $sql);

        $category = null;

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $category = array(
                'category_id' => $row['category_id'],
                'item_category' => $row['item_category'],
                'category_photo' => $row['category_photo']
            );
        
        return $category;

        } else {
            return null;
        }
    }

    function getShape($shape_id, $conn) {
        $sql = "SELECT * FROM z_shape WHERE shape_id = '$shape_id'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    
            $shape = array(
                'shape_id' => $row['shape_id'],
                'cake_shape' => $row['cake_shape'],
                'shape_photo' => $row['shape_photo'],
                'shape_price' => $row['shape_price']
            );
    
        return $shape;

        } else {
            return null;
        }
    }

    function getSize($cake_size_id, $conn) {
        $sql = "SELECT * FROM z_size WHERE cake_size_id = '$cake_size_id'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    
            $cake_size = array(
                'cake_size_id' => $row['cake_size_id'],
                'cake_size' => $row['cake_size'],
                'size_price' => $row['size_price']
            );
    
            return $cake_size;
        } else {
            return null;
        }
    }
    
    function getFlavor($flavor_id, $conn) {
        $sql = "SELECT * FROM z_flavor WHERE flavor_id = '$flavor_id'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    
            $cake_flavor = array(
                'flavor_id' => $row['flavor_id'],
                'cake_flavor' => $row['cake_flavor'],
                'flavor_img' => $row['flavor_img'],
                'flavor_price' => $row['flavor_price']
            );
    
            return $cake_flavor;
        } else {
            return null;
        }
    }
    
    function getFrosting($frosting_id, $conn) {
        $sql = "SELECT * FROM z_frosting WHERE frosting_id = '$frosting_id'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    
            $cake_frosting = array(
                'frosting_id' => $row['frosting_id'],
                'cake_frosting' => $row['cake_frosting'],
                'frosting_img' => $row['frosting_img'],
                'frosting_price' => $row['frosting_price']
            );
    
            return $cake_frosting;
        } else {
            return null;
        }
    }    

    function getCcFilling($cc_filling_id, $conn) {
        $sql = "SELECT * FROM z_cc_filling WHERE cc_filing_id = '$cc_filling_id'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    
            $cc_filling = array(
                'cc_filling_id' => $row['cc_filing_id'],
                'cupcake_filling' => $row['cupcake_filling'],
                'cc_filling_img' => $row['cc_filling_img'],
                'filling_price' => $row['filling_price']
            );
    
            return $cc_filling;
        } else {
            return null;
        }
    }
    

    function getCcsize($cc_size_id, $conn) {
        $sql = "SELECT * FROM z_cc_size WHERE cupcake_size_id = '$cc_size_id'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    
            $cc_size = array(
                'cupcake_size_id' => $row['cupcake_size_id'],
                'cupcake_size' => $row['cupcake_size'],
                'cc_size_img' => $row['cc_size_img'],
                'cc_size_price' => $row['cc_size_price']
            );
    
            return $cc_size;
        } else {
            return null;
        }
    }
    
    function getDetails($category_id) {
        $user_id = $_SESSION['user_id'];
    
        $z_details = "SELECT
                    d.details_id AS details_id,
                    d.user_id,
                    d.category_id,
                    d.total_price AS total,
                    s.cake_shape AS shape,
                    sz.cake_size AS size,
                    f.cake_flavor AS flavor,
                    fr.cake_frosting AS frosting,
                    cs.cupcake_size AS cupcake_size,
                    cc.cupcake_filling AS cupcake_filling,
                    d.design_inspo,
                    d.dedication as dedication,
                    d.date_added,
                    f.flavor_price,
                    fr.frosting_price,
                    cs.cc_size_price,
                    cs.cupcake_size AS cc_size,
                    cc.filling_price,
                    cc.cupcake_filling AS cc_filling,
                    sz.size_price,
                    s.shape_price,
                    u.user_id,
                    c.item_category AS cat_name
                  FROM
                    z_details d
                    LEFT JOIN z_category c ON d.category_id = c.category_id
                    LEFT JOIN z_shape s ON d.shape_id = s.shape_id
                    LEFT JOIN z_size sz ON d.cake_size_id = sz.cake_size_id
                    LEFT JOIN z_flavor f ON d.flavor_id = f.flavor_id
                    LEFT JOIN z_frosting fr ON d.frosting_id = fr.frosting_id
                    LEFT JOIN z_cc_size cs ON d.cupcake_size_id = cs.cupcake_size_id
                    LEFT JOIN z_cc_filling cc ON d.cc_filling_id = cc.cc_filing_id
                    LEFT JOIN z_user u ON d.user_id = u.user_id
                  WHERE u.user_id = '$user_id' AND d.category_id = $category_id
                  ORDER BY d.date_added DESC";
        
        return $z_details;
    }
    
    function getImageURLByCategoryID($category_id, $conn) {
        // Prepare and execute the query to retrieve the image URL based on the category ID
        $query = "SELECT category_photo FROM z_category WHERE category_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Fetch the image URL from the result
        if ($row = $result->fetch_assoc()) {
            return $row['category_photo'];
        } else {
            return ''; // Return an empty string if no image URL found
        }
    }
    

?>


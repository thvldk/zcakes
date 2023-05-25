<?php
/**
 * Check if a value exists in a column of a table
 *
 * @param mysqli $conn The database connection object
 * @param string $value The value to check
 * @param string $column The column name to check
 * @param string $table The table name to check
 * @return bool Returns true if the value exists in the column, false otherwise
 */

function is_existing(mysqli $conn, string $value, string $column, string $table): bool
{
    $value = mysqli_real_escape_string($conn, $value);
    $column = mysqli_real_escape_string($conn, $column);
    $table = mysqli_real_escape_string($conn, $table);

    $query = "SELECT COUNT(*) AS count FROM $table WHERE $column = '$value'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return ($row['count'] > 0);
    }

    return false;
}

function count_cart_items($conn, $z_user) {
    $sql = "SELECT COUNT(ORDER_ID) as cart FROM z_orders WHERE order_status='X' and user_id = ? ";
    $res = query($conn, $sql, array($z_user));
    foreach($res as $r){
        return $r['cart'];
    }
}

function admin_retrieve_orders($conn, $sql_1,$sql_2, $status, $mode = 'V'){
    //mode = V = view or E = edit or C = count_order_reference
       if($mode == 'C'){
           return count(query($conn,$sql_1,array($status)));
       }
    else if($mode == 'V'){
     echo "<table class='table table-responsive table-striped table-borderless'>";  
      
            echo "<thead>";   
            echo "<tr>";  
            echo "<th>Ref Number</th>"; 
            echo "<th>Date Ordered</th>";  
            echo "<th>Quantity</th>";
            echo "<th>Amount</th>"; 
            echo "<th>Client Information</th>";   

            echo "</tr>";   
            echo "</thead>";    
            echo "<tbody>";

      $f_orders=query($conn, $sql_1, array($status));
        if(count($f_orders) > 0){
            foreach($f_orders as $ord){ ?>
              <tr class='border border-1' data-bs-toggle="collapse" href="#<?php echo $ord['ref_num']; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $ord['ref_num'];?>">
              <?php 
                                       echo "<td><b>" . $ord['ref_num'] . "<b></td>" ;
                                       echo "<td>" . $ord['date_ordered'] . "</td>" ;
                                       echo "<td>" . $ord['order_count'] . "</td>" ; 
                                       $total_amt=0;
                                      $ref_num =  $ord['ref_num'];
                                      $show_order_item = query($conn, $sql_2, array($status, $ref_num));
                                       foreach($show_order_item as $idet){
                                            $total_amt += $idet['product_price'] * $idet['order_qty'];
                                       }
                                       echo "<td>" . CURRENCY . number_format($total_amt,2) . "</td>" ;  ?>
                                       <td><?php echo strtoupper($ord['firstname']). ucwords($ord['address']) . ", (". $ord['phone'] .")"; ?></td>
              </tr>
              <?php 
            
            // echo "<div id=". $ord['ref_num'] . " class='collapse'>";
              foreach($show_order_item as $idet){
                  $total_amt += $idet['product_price'] * $idet['order_qty']; ?>
              <tr class="collapse" id="<?php echo $ord['ref_num'];?>">
              <?php
                 echo "<td class='float-end'>" . $idet['product_name'] ."</td>";
                 echo "<td class='float-end'>" . $idet['product_price'] . " x " . $idet['order_qty'] ."</td>";
                 echo "<td>" . number_format($idet['product_price'] * $idet['order_qty'],2) ."</td>"; ?>
              </tr>
              <?php }
             // echo "<tr><td colspan='2'>Total Amount</td><td><i class='text-danger'>Php" . number_format($total_amt,2) . "</i></td></tr>";

            //echo "</div>";          
                }
       }
      else{
            echo "<tr><td>No Orders.</td></tr>";
      }
     echo "</table>";
    }
    else if($mode == 'E'){
        echo "<table class='table table-responsive table-striped table-borderless'>";               
      $f_orders=query($conn, $sql_1, array($status));
        if(count($f_orders) > 0){
            echo "<tr>";
                echo "<td></td>";
                echo "<td>Reference No.</td>";
                echo "<td>Total Amount</td>";
                echo "<td>Date Ordered</td>";
                echo "<td>Shipping Details</td>";
            echo "</tr>";
            foreach($f_orders as $ord){ ?>
              <tr>
                 <td>
                   <?php 
                     switch($status){ 
                         case 'P':
                           ?>
                             <a href="process_orders.php?conf_ord=<?php echo $ord['ref_num']; ?>" class="btn btn-primary z-1"> Confirm Order</a>
                            <?php break; ?>
                         <?php 
                         case 'C': ?>
                              <a href="process_orders.php?ship_ord=<?php echo $ord['ref_num']; ?>" class="btn btn-primary z-1"> Ship Order</a>
                            <?php break; ?>
                        <?php 
                         case 'O': ?>
                              <a href="process_orders.php?update_delivery=<?php echo $ord['ref_num']; ?>" class="btn btn-primary z-1"> Delivered Order</a>
                            <?php break; ?>
                        
                        
                     <?php }
                     ?>
                    
                 </td>
                 <td><a data-bs-toggle="collapse" href="#<?php echo $ord['ref_num']; ?>" role="button" aria-expanded="false" aria-controls="<?php echo $ord['ref_num'];?>" ><?php echo $ord['ref_num']; ?></a></td>
                 <td style='text-align:right'>
                     <?php 
                        $ref_num=$ord['ref_num'];
                        $show_order_item = query($conn, $sql_2, array($status, $ref_num));
                        $total_amt=0;
                        foreach($show_order_item as $i){
                           $total_amt += $i['product_price'] * $i['order_qty'];
                        }
                     echo CURRENCY . number_format($total_amt,2);
                     ?>
                 </td>
                  <td><?php echo $ord['date_ordered']; ?></td>
                  <td><?php echo strtoupper($ord['name']) . ucwords($ord['address']) . ", (". $ord['phone'] .")"; ?></td>
              </tr>
              <?php 
             
            // echo "<div id=". $ord['ref_num'] . " class='collapse'>";
              foreach($show_order_item as $idet){
                 ?>
              <tr class="collapse fade align-items-center" id="<?php echo $ord['ref_num'];?>">
                  <td><img style="width:100px" src="../img/<?php echo $idet['item_file'];?>" alt="" class="img-thumbnail"></td>
              <?php
                 echo "<td style='text-align:right'>" . $idet['product_name'] ."</td>";
                 echo "<td>" . $idet['product_price'] . " x " . $idet['item_qty'] ."</td>";
                 echo "<td style='text-align:right'>" . CURRENCY . number_format($idet['product_price'] * $idet['order_qty'],2) ."</td>"; ?>
              </tr>
              <?php }
             // echo "<tr><td colspan='2'>Total Amount</td><td><i class='text-danger'>Php" . number_format($total_amt,2) . "</i></td></tr>";

            //echo "</div>";          
                }
       }
      else{
            echo "<tr><td>No Orders.</td></tr>";
      }
     echo "</table>";
    }
}

//this is to check if the user is logged. if not, it will be redirected to specific $location.
//@param $usertype = array('A','D')
function session_check($usertype, $loc){
    if(isset($_SESSION['user']['user_type'] )){
        if(!in_array($_SESSION['user']['user_type'], $usertype) ){
           header("location: $loc ");
        //   exit();
        }
    }
    else{
          header("location: $loc");
          // exit();
    }
}

function gen_ref_num($len){
    $alpha_num=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
    $key="";
    for ($i = 0; $i <= $len; $i++){
        if($i%2 == 0 && $i > 0){
           $key .= $alpha_num[rand(0,25)];
        }
        else{
             $key .= $alpha_num[rand(26,sizeof($alpha_num)-1)];
        }
     }
    return $key;
    
}

function getSalesReportByDay($conn, $date) {
    
    // Perform the SQL query to retrieve items sold on the given day
    $query = "SELECT p.product_name, o.pickup_date, SUM(o.order_qty) as total_qty, SUM(p.product_price*o.order_qty) as total_sales
                FROM z_orders o
                INNER JOIN z_products p ON o.product_id = p.product_id
                WHERE o.order_status = 'D' AND DATE(o.pickup_date) = '$date'
                GROUP BY p.product_name, o.pickup_date";
    $result = mysqli_query($conn, $query);

    // Perform the SQL query to retrieve the overall total sales for the given day
    $query2 = "SELECT SUM(o.order_qty * p.product_price) as overall_total_sales
                FROM z_orders o
                JOIN z_products p ON o.product_id = p.product_id
                WHERE o.order_status = 'D' AND DATE(o.pickup_date) = '$date'";
               
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $overall_total_sales = $row2['overall_total_sales'];

    // Display the result in a table format
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h3 class='text-center display-6'>SALES ON <strong>" . date('F j, Y', strtotime($date)) . "</strong></h3>";

        echo "<table class='table table-bordered bg-transparent blur'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Date Delivered</th>";
        echo "<th>Total Quantity Sold</th>";
        echo "<th>Total Sales</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['pickup_date'] . "</td>";
            echo "<td>" . $row['total_qty'] . "</td>";
            echo "<td>" . $row['total_sales'] . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='2'>Overall Total Sales:</td>";
        echo "<td>" . $overall_total_sales . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    } else {
        // If there is no data, display a message
        echo "No sales data found for this day.";
    }
    // Close the database connection
    mysqli_close($conn);
}


function getSalesReportByRange($conn, $start_date, $end_date) {
    // Perform the SQL query to retrieve items sold within the given date range
    $query = "SELECT p.product_name, o.pickup_date, SUM(o.order_qty) as total_qty, SUM(p.product_price*o.order_qty) as total_sales
                FROM z_orders o
                INNER JOIN z_products p ON o.product_id = p.product_id
                WHERE o.order_status = 'D' AND o.pickup_date >= '$start_date' AND o.pickup_date <= '$end_date'
                GROUP BY p.product_name";
    $result = mysqli_query($conn, $query);

    // Perform the SQL query to retrieve the overall total sales for the given date range
    $query2 = "SELECT SUM(o.order_qty * p.product_price) as overall_total_sales
                FROM z_orders o
                JOIN z_products p ON o.product_id = p.product_id
                WHERE o.order_status = 'D' AND o.pickup_date >= '$start_date' AND o.pickup_date <= '$end_date'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $overall_total_sales = $row2['overall_total_sales'];

    // Display the result in a table format
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h4 class='text-center display-6 mb-3'>SALES BETWEEN <strong>" . date('M j, Y', strtotime($start_date)) . "</strong> to <strong>" . date('M j, Y', strtotime($end_date)) . "</strong></h4>";
        
        echo "<table class='table table-bordered bg-transparent blur'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Date Delivered</th>";
        echo "<th>Total Quantity Sold</th>";
        echo "<th>Total Sales</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['pickup_date'] . "</td>";
            echo "<td>" . $row['total_qty'] . "</td>";
            echo "<td>" . $row['total_sales'] . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='2'>Overall Total Sales:</td>";
        echo "<td>" . $overall_total_sales . "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    } else {
        // If there is no data, display a message
        echo "No sales data found for this date range.";
    }
    // Close the database connection
    mysqli_close($conn);
}

function DeliveredByDay($conn, $date, $courierId) {

    // Query the database
    $sql = "SELECT o.courier_user_id, o.ref_num, o.pickup_date, u.user_id, u.name, p.product_name, o.order_qty
        FROM z_orders o
        JOIN z_user u ON o.user_id = u.user_id
        JOIN z_products p ON o.product_id = p.product_id
        WHERE o.order_status = 'D' AND o.courier_user_id = '{$courierId}' AND DATE(o.pickup_date) = '{$date}'
        ORDER BY o.courier_user_id, o.pickup_date";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h3 class='text-center display-6'>DELIVERED ON <strong>" . date('F j, Y', strtotime($date)) . "</strong></h3>";

        echo "<table class='table table-bordered bg-transparent blur'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Courier ID</th>";
        echo "<th>Reference Number</th>";
        echo "<th>Client</th>";
        echo "<th>Item Name</th>";
        echo "<th>Quantity</th>";
        echo "<th>Date Delivered</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['courier_user_id'] . "</td>";
            echo "<td>" . $row['ref_num'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['item_qty'] . "</td>";
            echo "<td>" . $row['pickup_date'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No delivered orders found for today.";
    }
}

function DeliveredByDateRange($conn, $courierId, $start_date, $end_date) {
    // Query the database
    $sql = "SELECT o.courier_user_id, o.ref_num, o.pickup_date, u.user_id, u.name, p.product_name, o.order_qty
        FROM z_orders o
        JOIN z_user u ON o.user_id = u.user_id
        JOIN z_products p ON o.product_id = p.product_id
        WHERE o.order_status = 'D' AND o.courier_user_id = '{$courierId}' AND DATE(o.pickup_date) BETWEEN '{$start_date}' AND '{$end_date}'
        ORDER BY o.courier_user_id, o.pickup_date";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h4 class='text-center display-6 mb-3'>DELIVERED BETWEEN <strong>" . date('M j, Y', strtotime($start_date)) . "</strong> to <strong>" . date('M j, Y', strtotime($end_date)) . "</strong></h4>";
        
        echo "<table class='table table-bordered bg-transparent blur'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Courier ID</th>";
        echo "<th>Reference Number</th>";
        echo "<th>Client</th>";
        echo "<th>Item Name</th>";
        echo "<th>Quantity</th>";
        echo "<th>Date Delivered</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['courier_user_id'] . "</td>";
            echo "<td>" . $row['ref_num'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['order_qty'] . "</td>";
            echo "<td>" . $row['pickup_date'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "No delivered orders found within the specified date range.";
    }
}

// for displaying the tracking of order status in the client side

function displayOrdersByStatus($conn, $order_status)
{
    // Retrieve user ID to use in the query
    if (isset($_SESSION['user_id'])) {
        // User is logged in, retrieve user ID from session
        $user_id = $_SESSION['user_id'];
    } else {
        // User is not logged in, redirect to login page
        header("Location: index.php");
        exit;
    }

    // Perform the join query
    $query = "SELECT o.order_id
                , p.product_name
                , o.order_qty
                , (o.order_qty * p.product_price) AS amount
                , o.date_ordered
                , o.pickup_date
                , o.ref_num
                , o.order_status
              FROM z_orders o
              JOIN z_products p ON p.product_id = o.product_id
              WHERE o.user_id = $user_id
              AND o.order_status = '$order_status'
              ORDER BY o.order_id DESC";

    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        // Display the order list
        echo "<table class='table table-bordered' style=''>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='white-text'>Product Name</th>";
        echo "<th class='white-text'>Quantity</th>";
        echo "<th class='white-text'>Subtotal</th>";
        echo "<th class='white-text'>Date Ordered</th>";
        echo "<th class='white-text'>Pickup Date</th>";
        echo "<th class='white-text'>Order Reference</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
           
            echo "<td class='white-text'>" . $row['product_name'] . "</td>";
            echo "<td class='white-text'>" . $row['order_qty'] . "</td>";
            echo "<td class='white-text'>Php " . $row['amount'] . "</td>";
            echo "<td class='white-text'>" . $row['date_ordered'] . "</td>";
            echo "<td class='white-text'>" . $row['pickup_date'] . "</td>";
            echo "<td class='white-text'>" . $row['ref_num'] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        // If the query was empty, display a message
        echo "<br>" . "PROCESS IS EMPTY" . "<br>" . "<br>";
    }
}
<?php
$username = $_SESSION['username'];
$get_user = "select * from `user_table` where username = '$username'";
$result = mysqli_query($con,$get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];

?>

<h3>All orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
    <th>Serial No</th>
    <th>Amount Due</th>
    <th>Total products</th>
    <th>Invoice number</th>
    <th>Date</th>
    <th>Complete/Incomplete</th>
    <th>Status</th>
</tr>
</thead>
<tbody>

<?php
$get_order_details = "select * from `user_order` where user_id = $user_id";
$result_order = mysqli_query($con,$get_order_details);
$number =1;
while($row_orders = mysqli_fetch_assoc($result_order)){
    $order_id = $row_orders['order_id'];
    $amount_due = $row_orders['amount_due'];
    $total_products = $row_orders['total_products'];
    $invoice_number = $row_orders['invoice_number'];
    $order_status = $row_orders['order_status'];
    if($order_status=='pending'){
        $order_status='Incomplete';
    }
    else{
        $order_status='Complete';
    }
    $order_date = $row_orders['order_date'];
    echo "<tr>
    <td>$number</td>
    <td>$amount_due</td>
    <td>$total_products</td>
    <td>$invoice_number</td>
    <td>$order_date </td>
    <td>$order_status</td>";
    ?>
    <?php
    if($order_status == 'Complete'){
        echo "<td>Paid</td>";
    }
    else{
        echo "<td><a href = 'confirm_payment.php?order_id=$order_id ' class = 'text-dark'>Confirm</a></td>
        </tr>";
    }

$number++;
}
?>
</tbody>
</table>
<?php
require_once 'inc/header.php';

if (session::get('cust_login') == false) {
    echo "<script>window.location = 'home.php'</script>";
}

$rows = mysqli_num_rows($cust->getOrders());
if ($rows == 0) {
    echo '<script>window.location = "home.php"</script>';
}

?>

    <div class="container">
        <h1 class="text-center card-header text-secondary font-italic">Orders</h1>
        <div class="card-body">

            <table class="table font-italic text-center">
<?php
    if (isset($_GET['pro_confirm_id'])){
        $cust->cust_order_confirm($_GET['pro_confirm_id']);
        echo "<meta http-equiv='refresh' content=\"0;URL=?id=live\">";
        echo "<script>window.location = 'purchase_report.php'</script>";
    }
?>
                <tr>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                </tr>
                <?php
                $orders = $cust->getOrders();
                if ($orders) {
                    $sub_total = 0;
                    while ($order = $orders->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $order['pro_name']; ?></td>
                            <td>
                                <img src="<?php echo $order['image']; ?>" height="60" alt="">
                            </td>
                            <td><?php echo $order['price']; ?></td>
                            <td><?php echo $order['quantity']; ?></td>
                            <td><?php 
                                $total = $order['price'] * $order['quantity'];
                                echo $total; 
                                $sub_total += $total;
                            ?></td>
                            <td><?php echo $fm->dateFormat($order['order_date']); ?></td>
                        </tr>
                    <?php }
                } ?>
            </table>

            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="card-body border">
                        <h6>Sub Total : <?php echo $sub_total; ?></h6>
                        <h6>
                            pajak(10%) :
                            <?php
                            $vat = ($sub_total * 10) / 100;
                            echo $vat;
                            ?>
                        </h6>
                        <h6>Total : <?php echo $sub_total + $vat; ?></h6>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="float-right">
                    <?php
                    $ci = $cust->getOrders();
                    $status = $ci->fetch_assoc();
                    if ($status['status']==0){
                        echo "<span style='font-size: 35px' class='text-danger font-weight-bold font-italic'>Pending</span>";
                    }elseif ($status['status']==1){
                        echo "<a href='?pro_confirm_id={$status['cmr_id']}' class='btn btn-warning font-italic btn-lg'>Confirm</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <br><br>
<?php require_once 'inc/footer.php'; ?>
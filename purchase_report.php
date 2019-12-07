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
    <div id="print_data" class="card-body">
        <div class="row card-body">
            <div class="col-md-9">
                <h3 style="color: green;">KadoMoe</h3>
                
            </div>
            <div class="col-md-3">
                <img src="images/e1.png"> <br>
                <span>
                    Invoice date : 
                    <?php echo date("D-d-m-Y "); ?>
                </span>
                <span>
                    Invoice Time :
                    <?php echo date("h:i:s a"); ?>
                </span>
            </div>
        </div>
        <h3 class="text-center">Bayar Produk</h3><br>
        <div>
            <table class="table text-center table-striped">
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
        </div>

        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="card-body border">
                    <h6>Total sebelum pajak : <?php echo $sub_total; ?></h6>
                    <h6>
                        Pajak(10%) :
                        <?php
                        $vat = ($sub_total * 10) / 100;
                        echo $vat;
                        ?>
                    </h6>
                    <h6>Total : <?php echo $sub_total + $vat; ?></h6>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="text-center">
        <button onclick="report_print('print_data')" class="btn btn-dark">Cetak</button>
    </div>

    <script type="text/javascript">
        function report_print(el) {
            var printContent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printContent;
            window.print();
        }
    </script>
</div>

<br><br>
<?php require_once 'inc/footer.php'; ?>
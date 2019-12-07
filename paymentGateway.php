<?php
require_once 'inc/header.php';
?>

    <div class="container">
        <div class="card">
            <h2 class="text-center card-header text-secondary">Pilih Metode Pembayaran</h2>
            
            <div class="card-body">
                <h5 class="text-center font-italic text-danger">KadoMoe mendukung 2 alternatif Pembayaran <br> Kamu bisa memilih metode Pembayaran terbaik bagi kamu. <br> jika kamu orang luar negara kamu dapat mengambil metode pembayaran paypal.</h5><hr>

                <div class="row card-body">
                    <div class="col-md-4"></div>
                    <div class="col-md-5">
                        <a href="order.php" class="btn btn-warning font-weight-bold" style="margin: 5px;">Offline Payment</a>
                        <a href="" class="btn btn-warning font-weight-bold" style="margin: 5px;">Paypal Payment Service</a>
                    </div>
                    <div class="col-md-3"></div>
                </div>
        <?php 
            $sub_total = 0;
            $co = $cust->getOrders();
            while ($cos = $co->fetch_assoc()) {
                $total = $cos['price'] * $cos['quantity'];
                $sub_total += $total;
            }
            $vat = ($sub_total * 10) / 100;
            $grand_total = $sub_total + $vat;
         ?>
                <div class="card-body bg-dark">
                    <h5 class="text-center text-warning">Total harga yang harus di bayar dengan pajak 10% : Rp. <?php echo $grand_total; ?> /-</h5>
                </div><hr>

                <h5 class="text-center font-italic text-success">Kamu tinggal di BandarLampung ? <br> Kamu dapat memilih offline payment service <br> kamu bisa melakukan cash on delivery.</h5>
            </div>
        </div>
    </div>

<?php require_once 'inc/footer.php'; ?>
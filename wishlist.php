<?php
include 'inc/header.php';
if (session::get('cust_login') == false) {
    echo "<script>window.location = 'home.php'</script>";
}
?>

<?php
if (isset($_GET['wl_del_id'])) {
    $wl->wlProDelete($_GET['wl_del_id']);
    echo "<meta http-equiv='refresh' content=\"0;URL=?id=live\">";
}

if (isset($_GET['pro_id'])){
    $quantity = $wl->productTransferToCart($_GET['wl_id']);
    $cart->add_to_cart($_GET['pro_id'], $quantity);
    $wl->wlProDelete($_GET['wl_id']);
    echo "<meta http-equiv='refresh' content=\"0;URL=?id=live\">";
}
?>
    <div class="container">
        <div class="card-body">
            <h1 class="text-center card-header text-secondary">My Wishlist</h1>
            <br>
            <table class="table text-center">

                <?php
                $result = $wl->getWishlistProducts();
                $rc = $result->num_rows;
                if ($rc > 0) {
                    ?>
                    <tr>
                        <th>Seri</th>
                        <th>Nama Produk</th>
                        <th>Gambar</th>
                        <th>Harga </th>
                        <th>Quantity</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </tr>
                <?php
                    $i = 0;
                    while ($val = $result->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $val['pro_name']; ?></td>
                            <td><img src="<?php echo $val['pro_image']; ?>" width="80" height="60" alt=""></td>
                            <td><?php echo $val['pro_price']; ?></td>
                            <td><?php echo $val['pro_quantity']; ?></td>
                            <td><?php echo $val['pro_price'] * $val['pro_quantity']; ?></td>
                            <td>
                                <a href="?pro_id=<?php echo $val['pro_id']; ?>&wl_id=<?php echo $val['id']; ?>" class="btn btn-warning">Add to cart</a>
                                <a href="?wl_del_id=<?php echo $val['id']; ?>"
                                   onclick="return confirm('Are you sure to remove this product ?')"
                                   class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="7">
                            <h4 class="text-center text-danger">Produk tidak tersedia di whistlist !</h4>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <br>
        </div>
        <div class="card-body">
            <a href="home.php" class="btn btn-outline-secondary">Lanjutkan Belanja</a>
        </div>
    </div>

<?php include 'inc/footer.php'; ?>
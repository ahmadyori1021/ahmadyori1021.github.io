<?php
include "inc/header.php";

?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include "inc/brands.php";?>
            </div>
            <!-- /.col-lg-3 -->

            <div class="col-md-9">
                <br>
                <h1 class="font-italic text-center">
                    <?php
                    if (isset($_GET['brand_id'])){
                    $brand_id = $_GET['brand_id'];

                    $brand_name = $br->getBrandById($brand_id);
                    if ($brand_name){
                        echo "Products Of " . $brand_name['brand_name']."<hr>";
                    }
                    ?>
                </h1>

                <div class="row">
                    <?php
                    $pros = $product->getProductsByBrand($brand_id);
                    $pro_rows = mysqli_num_rows($pros);
                    if ($pro_rows > 0) {
                        while ($pro = $pros->fetch_assoc()) {

                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                                <div class="card-body border">
                                    <a href="details.php?pro_id=<?php echo $pro['pro_id']; ?>"><img
                                            class="card-img-top" src="<?php echo $pro['image']; ?>" height="200"
                                            alt=""></a>
                                    <h4 class="card-title">
                                        <a href="details.php?pro_id=<?php echo $pro['pro_id']; ?>"><?php echo $pro['pro_name']; ?></a>
                                    </h4>
                                    <h5>$ <?php echo $pro['price']; ?></h5>
                                    <p class="card-text"><?php echo $fm->textShorten($pro['description'], 80); ?></p>

                                    <a href="details.php?pro_id=<?php echo $pro['pro_id']; ?>"
                                       class="btn btn-danger text-light btn-block">Beli Sekarang</a>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="col"></div>
                        <div class="col-md-6 text-center">
                            <pre style="font-size: 25px; color: red">Tidak Ditemukan !</pre>
                        </div>
                        <div class="col"></div>
                    <?php }
                    } else { ?>
                        <script>window.location = 'home.php'</script>
                    <?php } ?>
                </div>
            </div>
            <!-- /.col-lg-9 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <br>

<?php
include "inc/footer.php";
?>
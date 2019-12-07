<?php
include "inc/header.php";

if (session::get('cust_login')==false){
echo "<script>window.location = 'home.php'</script>";
}
?>

<div class="container">
<div class="card-body">
<?php
if (isset($_GET['action']) and $_GET['action'] == 'update') {
    echo '<h2 class="font-italic text-center">Update your profile</h2>';
} else {
    echo '<h2 class="font-italic text-center">Your profile</h2>';
}
?>

<div class="card-body">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?php
            $value = $cust->profile();

            if (isset($_POST['update'])){
                $cust->updateProfile($_POST);
                echo "<script>window.location = 'profile.php'</script>";
            }
            ?>

            <?php
            if (isset($_GET['action']) and $_GET['action'] == 'update') {
                ?>
                <form action="" method="post">
                    <table class="table font-italic text-center">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><input type="text" name="name" value="<?php echo $value['customer_name']; ?>"
                                       class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="email" name="email" value="<?php echo $value['customer_email']; ?>"
                                       class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td><input type="tel" name="phone" value="<?php echo $value['customer_phone']; ?>"
                                       class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>
                            <textarea name="address"
                                      class="form-control"><?php echo $value['customer_address']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" name="update" value="Update" class="btn btn-success"></td>
                        </tr>
                    </table>
                </form>
                <?php
            } else {
                ?>
                <table class="table font-italic text-center">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $value['customer_name']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $value['customer_email']; ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?php echo $value['customer_phone']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>
                            <?php echo $value['customer_address']; ?>
                        </td>
                    </tr>
                </table>
                <h5><a href="?action=update" class="float-right font-italic nav-link">Update Profilmu</a></h5>
                <br><br>
                <h6><a href="changePassword.php" class="float-right font-italic nav-link text-danger">ganti password</a></h6>
            <?php } ?>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</div>
</div>

<?php
include "inc/footer.php";
?>

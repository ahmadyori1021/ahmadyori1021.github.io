<?php
include 'inc/header.php';

if (session::get('cust_login')==true){
    echo "<script>window.location = 'home.php'</script>";
}
?>

<div class="container">
<div class="card">
    <h1 class="text-secondary text-center card-header">Registrasi</h1>
    <div class="card-body">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['submit'])) {
            $reg = $cust->customerRegistration($_POST);
        }

        if (isset($reg)) {
            echo $reg;
        }
        ?>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="fullName">Nama Lengkap</label>
                        <input type="text" name="name" id="fullName" class="form-control"
                               placeholder="Full name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                               placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm password</label>
                        <input type="password" name="Cpassword" id="cpassword" class="form-control"
                               placeholder="Confirm password">
                    </div>
                </div>

                <div class="col-md-2"></div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label><br>
                        <textarea name="address" id="address" rows="7" class="form-control"
                                  placeholder="Write your full address"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col"></div>
                <div class="col-md-6 form-group">
                    <input type="submit" name="submit" value="Sign Up"
                           class="btn btn-outline-success btn-block">
                </div>
                <div class="col"></div>
            </div>
        </form>
    </div>
</div>
</div>

<?php include 'inc/footer.php'; ?>
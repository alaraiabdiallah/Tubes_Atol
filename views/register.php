<?php require_once "partials/header.php" ?>
<div class="col-4" style="margin: 10% auto;">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center">Register your account</h3>
            <hr>
            <form action="<?php echo getCurrentUrl() ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" required class="form-control" name="name" id="name" aria-describedby="name" placeholder="Your name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" required class="form-control" name="email" id="email" aria-describedby="email" placeholder="Your email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" required class="form-control" name="password" id="password" placeholder="*******">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
            </form>
            <hr>
            <div class="text-center">
                <a href="login.php">Already have account</a>
            </div>
        </div>
    </div>
</div>

<?php require_once "partials/footer.php" ?>
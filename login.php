<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once(ROOT_PATH . '/includes/login.php') ?>

<body style="background-color: #f2f2f2;">
    <!-- navbar -->
    <?php include(ROOT_PATH . '/includes/navbar.php') ?>
    <!-- //navbar -->
    <div style="width: 350px; margin: 20px auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-family: 'YourCustomFont', sans-serif; text-align: center;">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php
        if (!empty($login_err)) {
            echo '<div style="color: red;">' . $login_err . '</div>';
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="margin-top: 10px;">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Username</label>
                <input type="text" name="username" style="width: 80%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; font-family: 'YourCustomFont', sans-serif;" value="<?php echo $username; ?>">
                <span style="color: red;"><?php echo $username_err; ?></span>
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;">Password</label>
                <input type="password" name="password" style="width: 80%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; font-family: 'YourCustomFont', sans-serif;">
                <span style="color: red;"><?php echo $password_err; ?></span>
            </div>
            <div style="margin-bottom: 15px;">
                <input type="submit" value="Login" style="background-color: #0066CC; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-family: 'YourCustomFont', sans-serif;">
            </div>
            <span style="color: #0066CC; font-family: 'YourCustomFont', sans-serif;">Don't have an account? </span>
            <a href="register.php" style="font-family: 'YourCustomFont', sans-serif; color: black;">Sign up now</a>.
        </form>
    </div>
</body>

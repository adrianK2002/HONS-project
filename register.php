<?php require_once('config.php') ?>
<?php require_once(ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once(ROOT_PATH . '/includes/register.php') ?>

<body>
    <!-- navbar -->
    <?php include(ROOT_PATH . '/includes/navbar.php') ?>
    <!-- //navbar -->

    <div style="width: 50%; margin: auto; background-color: #ffffff; padding: 20px; margin-top: 50px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-family: 'Averia Serif Libre', sans-serif;">

        <style>
            body {
                font-family: 'Averia Serif Libre', sans-serif;
                background-color: #f2f2f2; /* Fixed the background color */
            }

            h2,
            p {
                text-align: center;
                color: #0066CC;
            }

            .form {
                margin-bottom: 20px;
            }

            .form-control {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .invalid-feedback {
                color: red;
            }

            .checkbox {
                margin-bottom: 15px;
            }

            .checkbox label {
                font-weight: normal;
            }

            .btn-primary,
            .btn-secondary {
                background-color: #0066CC;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }

            .btn-secondary:hover {
                background-color: #ddd;
            }

            a {
                color: black;
                font-family: 'Averia Serif Libre';
            }
        </style>

        <div>
            <h2 style="color:black;">Sign Up</h2>
            <p style="color:black;">Please fill this form to create an account.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div>
                    <input type="text" name="username" placeholder="User Name *" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password *" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                <div>
                <input type="password" name="confirm_password" placeholder="Confirm Password *" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
              
          <div class="form-group checkbox">
                    <label><input type="checkbox"> I accept terms & conditions</label>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" value="Submit" style="background-color: #0066CC; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-family: 'YourCustomFont', sans-serif;">
                    <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </div>
                <span style="color: black; display: block; text-align: center; font-family: 'YourCustomFont', sans-serif;">Already have an account? </span>
                <a href="login.php" style="font-family: 'YourCustomFont', sans-serif; color: black; text-align: center; display: block;color:blue;" >Login here</a>.
            </form>
        </div>

    </div>

</body>
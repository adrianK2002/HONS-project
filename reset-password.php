<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>

<?php require_once( ROOT_PATH . '/includes/reset-password.php') ?>
 <body>
	<!-- navbar -->
	<?php include( ROOT_PATH . '/includes/navbar_logged_in.php') ?>
	<!-- //navbar -->
    <style>
  .facebook-reset-password-form {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    font-family: 'Helvetica', sans-serif;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-family: 'Helvetica', sans-serif;
}

.error-message {
    color: #d9534f;
    font-size: 12px;
    margin-top: 5px;
    font-family: 'Helvetica', sans-serif;
}

.btn {
    display: inline-block;
    padding: 8px 12px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    border-radius: 4px;
    font-family: 'Helvetica', sans-serif;
}

.btn-primary {
    color: #fff;
    background-color: #337ab7;
    border: 1px solid #2e6da4;
}

.btn-link {
    color: #337ab7;
    text-decoration: none;
}
</style>
    <p>
    <div class="facebook-reset-password-form">
    <h2>Reset Password</h2>
    <p>Please fill out this form to reset your password.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" id="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
            <span class="error-message"><?php echo $new_password_err; ?></span>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
            <span class="error-message"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <a class="btn btn-link" href="dashboard.php">Cancel</a>
        </div>
    </form>
</div> 
<div style="text-align: center;">
    <button onclick="goBack()" class="back-btn" style="text-align:center;padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Previous Page</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</div>
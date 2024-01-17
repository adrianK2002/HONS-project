<?php
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/check_user.php');
require_once(ROOT_PATH . '/includes/retrieve_data.php');
?>


<style>


        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 2px solid #3498db;
            border-radius: 4px;
            font-size: 14px;
        }

        .button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
            font-size: 16px;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php'); ?>
    
    <br>
    <form action="includes/post_portfolio_name.php" method="POST">
        <fieldset>
            <div>
                <label>Please enter the name of your portfolio:</label>
                <input type="text" name="name" id="name" placeholder="Enter portfolio name" required>
                <input type="hidden" name="created_at" id="created_at">
                <input type="hidden" name="createdBy" value="<?= $_SESSION['id']; ?>">
            </div>
            
            <div class="button">
                <input type="submit" class="button" value="Publish">
            </div>
        </fieldset>
    </form>
    <script>
        // JavaScript code to set the current date and time
        document.getElementById("created_at").value = new Date().toISOString().slice(0, 19).replace("T", " ");
    </script>
</body>
</html>

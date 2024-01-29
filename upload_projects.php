<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/head_section.php') ?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>
<?php require_once( ROOT_PATH . '/includes/retrieve_data.php') ?>
<?php require_once( ROOT_PATH . '/includes/del_port.php') ?>
<?php

?>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-form {
        text-align: center;
    }

    h2 {
        color: #4CAF50;
    }

    .file-tile {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .file-input {
        flex: 0 0 calc(48% - 10px);
        margin-bottom: 20px;
    }

    .file-input label {
        display: block;
        font-size: 18px;
        margin-bottom: 10px;
    }

    .upload-btn {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }

    .upload-btn:hover {
        background-color: #45a049;
    }

    /* Styling for the Remove button */
    .remove-btn {
        background-color: #ff5555; /* Red color */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }

    .remove-btn:hover {
        background-color: #cc0000; /* Darker red on hover */
    }
</style>
<body>
    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //Navbar -->

    <?php
    // Define the number of projects
    $numProjects = 4;

    // Loop to create containers for each project
    for ($i = 1; $i <= $numProjects; $i++) {
    ?>
    <div class="container">
        <div class="profile-form">
            <h2>Project <?php echo $i; ?></h2>

            <div class="file-tile">
                <!-- File Input for Project <?php echo $i; ?> -->
                <div class="file-input">
                    <label for="project<?php echo $i; ?>">Project <?php echo $i; ?>:</label>
                    <input type="file" id="project<?php echo $i; ?>" name="project<?php echo $i; ?>" class="upload-btn">
                </div>

                <!-- Add box for Project <?php echo $i; ?> information -->
                <div class="file-input">
                    <label for="project<?php echo $i; ?>-info">Project <?php echo $i; ?> Information:</label>
                    <textarea id="project<?php echo $i; ?>-info" name="project<?php echo $i; ?>-info"></textarea>
                </div>

                <!-- Remove button for Project <?php echo $i; ?> -->
               
                <button type="submit" class="upload-btn">Submit</button>
                <!-- Submit button for Project <?php echo $i; ?> -->
                <br>
                <button type="button" class="upload-btn remove-btn" onclick="removeProject(<?php echo $i; ?>)">Remove</button>
            </div>
        </div>
    </div>
    <?php } ?>

    <script>
        // Function to remove the project container
        function removeProject(projectNumber) {
            var projectContainer = document.querySelector('.container:nth-child(' + projectNumber + ')');
            if (projectContainer) {
                projectContainer.remove();
            }
        }
    </script>
</body>


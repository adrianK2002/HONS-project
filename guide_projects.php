<?php
// Include the configuration file and any other necessary files
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/rate_profile.php');
?>
<?php require_once(ROOT_PATH . '/includes/check_user.php') ?>
<?php require_once(ROOT_PATH . '/includes/retrieve_data.php') ?>

<!-- Add a link to your CSS file -->
<link rel="stylesheet" type="text/css" href="styles.css">
<style>
    /* Add your existing styles here if needed */

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    /* Add more styles as needed */

    .project-info {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        line-height: 1.6;
    }
</style>
<body>
    <!-- Navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //Navbar -->

    <!-- Project Information Section -->
    <div class="project-info">
    <h1 style="color: black;">First Option</h1>
    <p>Discover two distinctive approaches to showcase your projects on our platform, each offering unique advantages. The primary method is to feature projects within your user profile. In this section, you have the flexibility to share project links and provide comprehensive descriptions or instructions.</p>

    <p>This feature is seamlessly integrated into the portfolio creation process, accessible through the 'Skills' section (Section 6) of your profile. Once your portfolio is established, project links can be effortlessly updated by navigating to 'View My Portfolios' and selecting the 'Update' option.</p>

    <h1 style="color: black;">Second Option</h1>
    <p>Alternatively, you can utilize the 'Manage My Projects' feature. This allows you to upload various project files directly to our database. These files, accompanied by short project descriptions and file types, are made accessible to the entire community through the 'View Projects' section within the 'Search Developers' category.</p>

    <p>This provides a centralized location for users to explore and download diverse projects shared by the community, fostering collaboration and knowledge exchange.</p>
</div>
<div style="text-align: center;">
    <button onclick="goBack()" class="back-btn" style="text-align:center;padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Previous Page</button>

<script>
    function goBack() {
        window.history.back();
    }
</script>
</div>
</body>

</html>

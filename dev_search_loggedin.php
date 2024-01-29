<?php
// Include the configuration file and any other necessary files
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');

?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>
<?php require_once( ROOT_PATH . '/includes/retrieve_data.php') ?>

<!-- Add a link to your CSS file -->
<link rel="stylesheet" type="text/css" href="styles.css">
<style>
    /* Resetting default margin and padding for better consistency */
    body, h1, h2, h3, p, ul, li {
      margin: 0;
      padding: 0;
    }

    /* Body styling */
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
    }

    /* Header styling */
    header {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    /* Main section styling */
    section {
      margin: 20px;
    }

    /* Search container styling */
    #search-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    /* Search bar styling */
    #search-bar {
      flex-grow: 1;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    /* Search button styling */
    #search-button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    /* Page content styling */
    #page-content {
      padding: 20px;
      background-color: #fff;
    }

    /* Bottom page styling */
    #bottom-page {
      height: 300px; /* Adjust the height as needed */
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 20px;
    }

    /* Dropdown list styling */
    #search-filter {
      width: 150px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    /* Styled table for search results */
    .styled-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .styled-table th, .styled-table td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: left;
    }

    .styled-table th {
      background-color: #007bff;
      color: #fff;
    }

    .styled-table tbody tr:hover {
      background-color: #f5f5f5;
    }

    /* Styled button for View, Contact, Write Review, Rate */
    .view-btn {
      background-color: #4caf50;
      color: #fff;
      padding: 8px 12px;
      text-decoration: none;
      border-radius: 5px;
      display: inline-block;
      margin-right: 5px; /* Provide some space between buttons */
    }

    .view-btn:hover {
      background-color: #45a049;
    }
  </style>
<body>
    <!-- navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //navbar -->

    <div class="container">
        <h2>Search Page</h2>

        <!-- Single form with all filter options -->
        <form action="index.php" method="get" class="search-form">
            <div class="filter-section">
                <label>Select Programming Languages:</label><br>
                <input type="checkbox" name="languages[]" value="javascript"> JavaScript<br>
                <input type="checkbox" name="languages[]" value="python"> Python<br>
                <input type="checkbox" name="languages[]" value="java"> Java<br>
                <input type="checkbox" name="languages[]" value="csharp"> C#<br>
                <input type="checkbox" name="languages[]" value="php"> PHP<br>
                <input type="checkbox" name="languages[]" value="ruby"> Ruby<br>
                <input type="checkbox" name="languages[]" value="swift"> Swift<br>
                <input type="checkbox" name="languages[]" value="go"> Go<br>
                <input type="checkbox" name="languages[]" value="typescript"> TypeScript<br>
                <input type="checkbox" name="languages[]" value="htmlcss"> HTML/CSS<br>
            </div>

            <div class="filter-section">
                <label>Select Software Tools:</label><br>
                <input type="checkbox" name="tools[]" value="git"> Git<br>
                <input type="checkbox" name="tools[]" value="docker"> Docker<br>
                <input type="checkbox" name="tools[]" value="vscode"> Visual Studio Code<br>
                <input type="checkbox" name="tools[]" value="intellij"> IntelliJ IDEA<br>
                <input type="checkbox" name="tools[]" value="eclipse"> Eclipse<br>
            </div>

            <div class="filter-section">
                <label>Select Experience Level:</label><br>
                <label><input type="radio" name="experience" value="1-2"> 1-2 years</label>
                <label><input type="radio" name="experience" value="3-5"> 3-5 years</label>
                <label><input type="radio" name="experience" value="6-10"> 6-10 years</label>
                <label><input type="radio" name="experience" value="11-15"> 11-15 years</label>
                <label><input type="radio" name="experience" value="15+"> 15+ years</label>
            </div>

            <br>

            <input type="submit" value="Search" style="padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">

        </form>

     
        <h2>(Test, only for presentation purposes)Search Results</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Profile Name</th>
                </tr>
            </thead>
            <?php
$query1 = "
SELECT portfolio_name.createdBy, portfolio_info.firstname, portfolio_info.lastname, portfolio_name.selected_portfolio
FROM portfolio_name
JOIN portfolio_info ON portfolio_name.createdBy = portfolio_info.createdBy
WHERE portfolio_name.selected_portfolio = 1";


$users = mysqli_query($link, $query1);

if ($users) {
    ?>
    <h1 style="color: black">Software Develoeprs</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>View Resume</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($users)) {
            // Process each row
            // $row['firstname'], $row['lastname'] to access column values
            ?>
            <tr>
            <td><?php echo $row['firstname'] . ' ' . $row['lastname']. ' ' . $row['createdBy']; ?></td>
       
              <td>
                
                        
                    </td>
         
            </tr>
            <?php
        }
        mysqli_free_result($users);
        ?>
    </table>
    <?php
} else {
    echo "Error: " . mysqli_error($link);
}

// Close the connection
mysqli_close($link);
?>

            </tbody>
        </table>
    </div>
</body>

</html>

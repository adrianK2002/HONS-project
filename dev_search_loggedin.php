<?php
// Include the configuration file and any other necessary files
require_once('config.php');
require_once(ROOT_PATH . '/includes/head_section.php');
require_once(ROOT_PATH . '/includes/rate_profile.php');
?>
<?php require_once( ROOT_PATH . '/includes/check_user.php') ?>
<?php require_once( ROOT_PATH . '/includes/retrieve_data.php') ?>

<!-- Add a link to your CSS file -->
<link rel="stylesheet" type="text/css" href="styles.css">
<style>


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
    #search-container {
    display: none;
    /* Other styles... */
}
  </style>
<body>
    <!-- navbar -->
    <?php include(ROOT_PATH . '/includes/navbar_logged_in.php') ?>
    <!-- //navbar -->

    <div class="container" style="text-align: center">
        <h2>Filter Develoeprs</h2>
        <button type="button" id="reveal-options-button">Reveal Options</button>
<div id="search-container">
    <form method="GET" action="">
        <select name="language" id="search-filter">
            <option value="">Select Language</option>
            <!-- Add options dynamically based on available languages in your database -->
            <option value="None">None</option>
            <option value="JavaSctipt">JavaSctipt</option>
            <option value="Python">Python</option>
            <option value="Java">Java</option>
            <option value="C#">C#</option>
            <option value="PHP">PHP</option>
            <option value="Ruby">Ruby</option>
            <option value="Swift">Swift</option>
            <option value="Go">Go</option>
            <option value="TypeScript">TypeScript</option>
            <option value="HTML/CSS">HTML/CSS</option>
        </select>

        <select name="tool" id="search-filter">
            <option value="">Select Tool</option>
            <!-- Add options dynamically based on available tools in your database -->
            <option value="None">None</option>
            <option value="Git">Git</option>
            <option value="Docker">Docker</option>
            <option value="Visual Studio Code">Visual Studio Code</option>
            <option value="IntelliK IDEA">IntelliK IDEA</option>
            <option value="Eclipse">Eclipse</option>
        </select>

        <select name="experience" id="search-filter">
            <option value="">Select Experience</option>
            <!-- Add options dynamically based on available experience levels in your database -->
            <option value="None">None</option>
            <option value="1-2">1-2 years</option>
            <option value="3-5">3-5 years</option>
            <option value="6-10">6-10 years</option>
            <option value="11-15">11-15 years</option>
            <option value="15+">15+ years</option>
    
        </select>
        <select name="rating" id="search-filter">
            <option value="">Select Rating</option>
            <!-- Add options dynamically based on available experience levels in your database -->
            <option value="5">5</option>
            <option value="4+">4+</option>
            <option value="3+">3+</option>
            <option value="2+">2+</option>
            <option value="1+">1+</option>
            <option value="0+">0+</option>
    
        </select>

        <button type="submit" id="search-button">Filter</button>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get references to the button and search container
        var revealButton = document.getElementById("reveal-options-button");
        var searchContainer = document.getElementById("search-container");

        // Add a click event listener to the button
        revealButton.addEventListener("click", function () {
            // Toggle the display property of the search container
            searchContainer.style.display = (searchContainer.style.display === "none" || searchContainer.style.display === "") ? "block" : "none";
        });
    });
</script>
        <?php
        
// Assuming you have established a database connection ($link) before this point
$results1 = mysqli_query($link, "
    SELECT * 
    FROM portfolio_name 
    WHERE selected_portfolio = 1
");

$search_results = mysqli_query($link, "
    SELECT portfolio_name.*, 
           portfolio_info.firstname,
           portfolio_info.lastname
    FROM portfolio_name
    
    JOIN portfolio_info ON portfolio_name.createdBy = portfolio_info.createdBy
    WHERE portfolio_name.selected_portfolio = 1
    GROUP BY portfolio_name.createdBy
");

        // Constructing the WHERE clause
        $where_clause = !empty($where_conditions) ? "WHERE " . implode(' AND ', $where_conditions) : '';

        // Adding the WHERE clause to the SQL query
        $search_results = mysqli_query($link, "
            SELECT portfolio_name.*, 
                   portfolio_info.firstname,
                   portfolio_info.lastname
            FROM portfolio_name
            
            JOIN portfolio_info ON portfolio_name.createdBy = portfolio_info.createdBy
            $where_clause
            GROUP BY portfolio_name.createdBy
        ");

  if ($search_results) {
    ?>
    <h1 style="color: black; font-family: Helvetica, Arial, sans-serif;text-align: center">Software Developers</h1>

    <table class="styled-table">
        <thead>
            <tr>
                <th>Developer's Full Name</th>
                <th>Skills</th>
                <th>Experience</th>
                <th>Rating</th>
                <th>Reviews</th>
                <!-- <th>View Full Profile (not working yet)</th> -->
                <th>View Portfolio</th>                
                <th>View User Projects (not working yet)</th>
                <th>Review and Rate Developer</th>
                <th>Contact Developer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($portfolio = mysqli_fetch_assoc($search_results)) {
                // Fetch skills for the current user from the user_preferences table
                $query_skills = "SELECT language, tool, experience FROM user_preferences WHERE createdBy = ?";
                $stmt_skills = mysqli_prepare($link, $query_skills);

                if ($stmt_skills) {
                    mysqli_stmt_bind_param($stmt_skills, 'i', $portfolio['createdBy']);
                    mysqli_stmt_execute($stmt_skills);
                    mysqli_stmt_bind_result($stmt_skills, $language, $tool, $experience);

                    // Check if skills are found
                    if (mysqli_stmt_fetch($stmt_skills)) {
                        $skills_html = "<strong>Languages:</strong> $language<br>";
                        $skills_html .= "<strong>Tools:</strong> $tool<br>";

                        // Check if experience is set
                        $experience_html = isset($experience) ? "<strong>Experience:</strong> $experience years" : "No experience specified";
                    } else {
                        $skills_html = "No skills found";
                        $experience_html = "No experience specified";
                    }

                    // Close the skills statement
                    mysqli_stmt_close($stmt_skills);
                } else {
                    $skills_html = "Error fetching skills";
                    $experience_html = "Error fetching experience";
                }
                ?>
                <?php
                  // Calculate the average rating
          // Retrieve ratings for the specific portfolio_id from the database
          $portfolio_id = $portfolio['id'];
          $sql = "SELECT rating FROM ratings WHERE portfolio_id = $portfolio_id";
          $result = mysqli_query($link, $sql);

          $ratings = [];

          if ($result->num_rows > 0) {
              // Fetch ratings from the result set
              while ($row = $result->fetch_assoc()) {
                  $ratings[] = (int)$row['rating'];
              }
          }

          // Calculate the average rating
          $averageRating = empty($ratings) ? 0 : array_sum($ratings) / count($ratings);
          ?>
          <!-- Displaying search results -->
          <tr>
              <td><?php echo $portfolio['firstname'] . ' ' . $portfolio['lastname']; ?></td>
              <td><?php echo $skills_html; ?></td>
              <td><?php echo $experience_html; ?></td>
              <td><?php echo number_format($averageRating, 1); ?></td>
              <td><a href="reviews.php?exercise_id=<?php echo $portfolio['id']; ?>" class="view-btn">View</a></td>
              <!-- <td></td> -->
              <td>
                  <a href="view_portfolio1.php?exercise_id=<?php echo $portfolio['id']?>" class="view-btn">View</a>
              </td>
              <td><a href="#" class="view-btn">View</a></td>
              <td><a href="rate_profile.php?exercise_id=<?php echo $portfolio['id']; ?>" class="view-btn">Rate and Review Profile</a></td>
              <td></td>
          </tr>
                <?php
            }
            mysqli_free_result($search_results);
            ?>
        </tbody>
    </table>
    <?php
} else {
    echo "Error: " . mysqli_error($link);
}

// Close the connection
mysqli_close($link);
?>
<!-- Your existing JavaScript code for handling AJAX -->

</body>

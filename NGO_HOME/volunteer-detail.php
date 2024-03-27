<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Volunteer Management</title>
    <link rel="stylesheet" href="userlist.css" />
</head>
<style>
    #searchBar {
    margin-bottom: 20px;
}

#searchForm {
    display: flex;
    align-items: center;
}

#searchForm label {
    margin-right: 10px;
}

#searchForm input[type="text"] {
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

#searchForm button {
    padding: 8px 12px;
    font-size: 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#searchForm button:hover {
    background-color: #0056b3;
}

</style>
<body>
    <h2>Volunteer Management</h2>
    <hr class="horizontal-line" />

    <div class="user-operations">
        <button id="deactivateUserButton"><a href="admin-dash.php"> Profile</a></button>
    </div>

    <div id="searchBar">
        <form id="searchForm" method="GET">
            <label for="searchTerm">Search Volunteer:</label>
            <input type="text" id="searchTerm" name="searchTerm" placeholder="Enter name..." />
            <button type="submit">Search</button>
        </form>
    </div>

    <div id="userList">
        <table id="userTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Work</th>
                    <th>Date Joined</th>
                </tr>
            </thead>
            <tbody>
                <!-- User list will be populated here -->
                <?php
                // Include database connection
                include 'config.php';

                // Fetch volunteer data from the database based on search term
                $searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
                $query = "SELECT * FROM volunteer";
                if (!empty($searchTerm)) {
                    $query .= " WHERE name LIKE '%$searchTerm%'";
                }
                $result = mysqli_query($conn, $query) or die('Query failed');
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['work'] . "</td>";
                        echo "<td>" . $row['date_joined'] . "</td>";
                       
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No volunteers found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div id="messageBox"></div>
    </div>

</body>
</html>

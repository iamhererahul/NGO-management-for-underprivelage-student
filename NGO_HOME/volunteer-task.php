<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Tasks</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Volunteer Tasks</h2>
    <table>
        <thead>
            <tr>
                <th>Volunteer Name</th>
                <th>Mentoring</th>
                <th>Tutoring</th>
                <th>Fundraising</th>
                <th>Organizing Events</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include database connection
            include 'config.php';

            // Fetch tasks data from the database
            $result = mysqli_query($conn, "SELECT * FROM volunteer_tasks") or die('Query failed');

            // Display fetched tasks data
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['volunteer_name'] . "</td>";
                    echo "<td>" . ($row['mentoring'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>" . ($row['tutoring'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>" . ($row['fundraising'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>" . ($row['organizing_events'] ? 'Yes' : 'No') . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No tasks found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>

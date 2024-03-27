<?php
// Include database connection
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $volunteerName = $_POST['volunteerName'];
    $mentoring = isset($_POST['mentoring']) ? 1 : 0;
    $tutoring = isset($_POST['tutoring']) ? 1 : 0;
    $fundraising = isset($_POST['fundraising']) ? 1 : 0;
    $organizingEvents = isset($_POST['organizingEvents']) ? 1 : 0;
    $description = $_POST['description'];

    // Insert into database
    $query = "INSERT INTO volunteer_tasks (volunteer_name, mentoring, tutoring, fundraising, organizing_events, description) 
              VALUES ('$volunteerName', $mentoring, $tutoring, $fundraising, $organizingEvents, '$description')";

    if (mysqli_query($conn, $query)) {
        echo "Task assigned successfully.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

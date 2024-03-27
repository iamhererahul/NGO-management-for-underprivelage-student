<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Program</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.program {
    display: flex;
    flex-direction: row;
}

.program .container {
    width: 450px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-left: 50px;
}

.program .container1 {
    width: 880px;
    margin: 20px auto;
    background-color: black;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-right: 50px;
}

.container1 h1 {
    text-align: center;
    color: white;
}

h1 {
    text-align: center;
    color: black;
}

form {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input,
.form-group textarea {
    width: 98%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.form-group textarea {
    resize: vertical;
}

.btn {
    display: block;
    width: 25%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    text-align: center;
    margin-left: 235px;
}

.btn:hover {
    background-color: #0056b3;
}

.program-card {
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 15px;
    margin-top: 20px;
    flex-basis: calc(50% - 20px);
    width: calc(50% - 30px); 
    margin-right: 20px; 
    margin-bottom: 20px; 
    box-sizing: border-box; 
}

.program-card:nth-child(odd) {
    clear: both; 
}

.program-card:last-child {
    margin-right: 0;
}


.program-card h2 {
    margin-top: 0;
}

.program-card p {
    margin-bottom: 10px;
}

.program-cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    /* Adjust alignment for side by side display */
}


    </style>
</head>

<body>


    <section class="program">
    <div class="container">
        <h1>Create Program</h1>
        <form id="addProgramForm" method="POST" action="">
            <div class="form-group">
                <label for="programName">Program Name</label>
                <input type="text" id="programName" name="programName" placeholder="Enter program name" required>
            </div>
            <div class="form-group">
                <label for="programDescription">Program Description</label>
                <textarea id="programDescription" name="programDescription" placeholder="Enter program description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="programCategory">Program Category</label>
                <input type="text" id="programCategory" name="programCategory" placeholder="Enter program category" required>
            </div>
            <div class="form-group">
                <label for="programDate">Program Date</label>
                <input type="date" id="programDate" name="programDate" required>
            </div>
            <div class="form-group">
                <label for="programTimeFrom">Program Time From</label>
                <input type="time" id="programTimeFrom" name="programTimeFrom" required>
            </div>
            <div class="form-group">
                <label for="programTimeTo">Program Time To</label>
                <input type="time" id="programTimeTo" name="programTimeTo" required>
            </div>
            <div class="form-group">
    <label for="mode">Mode</label>
    <select id="mode" name="mode">
        <option value="online">Online</option>
        <option value="offline">Offline</option>
    </select>
</div>


            <button type="submit" class="btn">Add Program</button>
        </form>
    </div>

        <div class="container1">
            <h1>Programs</h1>
            <div class="program-cards" id="programList">
                <?php
                // Include database connection
                include 'config.php';

                // Fetch program data from the database
                $result = mysqli_query($conn, "SELECT * FROM programs") or die('Query failed');

                // Display fetched program data
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='program-card'>";
                        echo "<h2>" . $row['programName'] . "</h2>";
                        echo "<p><strong>Description:</strong> " . $row['programDescription'] . "</p>";
                        echo "<p><strong>Category:</strong> " . $row['programCategory'] . "</p>";
                        echo "<p><strong>Date:</strong> " . $row['programDate'] . "</p>";
                        echo "<p><strong>Program Time From:</strong> " . $row['programTimeFrom'] . "</p>";
                        echo "<p><strong>Program Time To:</strong> " . $row['programTimeTo'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No programs found.</p>";
                }
                ?>
            </div>
        </div>
    </section>

   <script>
    document.addEventListener('DOMContentLoaded', function() {
    const addProgramForm = document.getElementById('addProgramForm');
    const programList = document.getElementById('programList');

    addProgramForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const programName = document.getElementById('programName').value;
        const programDescription = document.getElementById('programDescription').value;
        const programCategory = document.getElementById('programCategory').value;
        const programDate = document.getElementById('programDate').value;
        const programTimeFrom = document.getElementById('programTimeFrom').value;
        const programTimeTo = document.getElementById('programTimeTo').value;

        const programCard = document.createElement('div');
        programCard.classList.add('program-card');
        programCard.innerHTML = `
        <h2>${programName}</h2>
        <p><strong>Description:</strong> ${programDescription}</p>
        <p><strong>Category:</strong> ${programCategory}</p>
        <p><strong>Date:</strong> ${programDate}</p>
        <p><strong>Program Time From:</strong> ${programTimeFrom}</p>
        <p><strong>Program Time To:</strong> ${programTimeTo}</p>
        <p><strong>MODE: </strong>ONLINE</p>
    `;

        programList.appendChild(programCard);

        addProgramForm.reset();
    });
});

   </script>
</body>

</html>
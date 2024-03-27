<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
        }
        
        .container {
            width: 45%;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
    
        }
        
        h2 {
            margin-bottom: 20px;
        }
        
        input[type="text"],
        input[type="number"],
        select,
        input[type="tel"],
        input[type="email"] {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #0056b3;
        }
        
        ul {
            list-style-type: none;
            padding: 0;
        }
        
        li {
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th,
        td {
            padding: 8px;
            border-bottom: 1px solid #ccc;
        }
        
        th {
            background-color: #007bff;
            color: #fff;
        }
        /* Animation */
        
        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        /* Additional styling */
        
        .container {
            animation: fade-in 0.5s ease;
        }
        
        form {
            animation: fade-in 1s ease;
        }
        
        table {
            animation: fade-in 1s ease;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Student Registration</h2>
        <form id="studentForm" method="post" action="register_student.php">
            <label for="name">Name:</label>
            <input type="text" id="name" required>

            <label for="age">Age:</label>
            <input type="number" id="age" required>

            <label for="gender">Gender:</label>
            <select id="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>

            <label for="address">Address:</label>
            <input type="text" id="address" required>

            <label for="aadhar">Aadhar Card:</label>
            <input type="text" id="aadhar" required>

            <label for="pan">PAN Card:</label>
            <input type="text" id="pan" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email">

            <label for="institute">Institute:</label>
            <input type="text" id="institute" required>

            <button type="submit">Register</button>
        </form>
    </div>

    <div class="container">
        <h2>Registered Students</h2>
        <table id="studentList">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Aadhar Card</th>
                <th>PAN Card</th>
                <th>Phone Number</th>
                <th>Email Address</th>
                <th>Institute</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['age'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['aadhar'] . "</td>";
                    echo "<td>" . $row['pan'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . ($row['email'] ? $row['email'] : 'N/A') . "</td>";
                    echo "<td>" . $row['institute'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No registered students.</td></tr>";
            }
            ?>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const studentForm = document.getElementById('studentForm');
            const studentList = document.getElementById('studentList');

            studentForm.addEventListener('submit', function(event) {
                event.preventDefault();

                // Get form values
                const name = document.getElementById('name').value;
                const age = document.getElementById('age').value;
                const gender = document.getElementById('gender').value;
                const address = document.getElementById('address').value;
                const aadhar = document.getElementById('aadhar').value;
                const pan = document.getElementById('pan').value;
                const phone = document.getElementById('phone').value;
                const email = document.getElementById('email').value;
                const institute = document.getElementById('institute').value;

                // Create student object
                const student = {
                    name,
                    age,
                    gender,
                    address,
                    aadhar,
                    pan,
                    phone,
                    email,
                    institute
                };

                // Add student to the list
                addStudentToList(student);

                // Reset the form
                studentForm.reset();
            });

            function addStudentToList(student) {
                const table = document.getElementById('studentList');
                const row = table.insertRow(-1);
                const cellName = row.insertCell(0);
                const cellAge = row.insertCell(1);
                const cellGender = row.insertCell(2);
                const cellAddress = row.insertCell(3);
                const cellAadhar = row.insertCell(4);
                const cellPan = row.insertCell(5);
                const cellPhone = row.insertCell(6);
                const cellEmail = row.insertCell(7);
                const cellInstitute = row.insertCell(8);

                cellName.innerHTML = student.name;
                cellAge.innerHTML = student.age;
                cellGender.innerHTML = student.gender;
                cellAddress.innerHTML = student.address;
                cellAadhar.innerHTML = student.aadhar;
                cellPan.innerHTML = student.pan;
                cellPhone.innerHTML = student.phone;
                cellEmail.innerHTML = student.email ? student.email : 'N/A'; // Display "N/A" if email is not provided
                cellInstitute.innerHTML = student.institute;
            }
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Volunteer-Dashboard</title>
    <link rel="stylesheet" href="volu-dash.css" />
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        .feedback {
            text-align: center;
            padding-top: 20px;
        }
        
        .feedback-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            height: 90vh;
            overflow-y: auto;
        }
        
        .feedback-box {
            width: 500px;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background: linear-gradient(to right, aqua, white);
            box-shadow: 10px 10px 40px black, -10px -10px 40px #ffffff;
        }
        
        .feedback-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .feedback-form label {
            margin-bottom: 10px;
        }
        
        .feedback-form .options {
            gap: 10px;
            margin-bottom: 10px;
            color: black;
        }
        
        .feedback-form textarea {
            width: 100%;
            margin-bottom: 10px;
            resize: vertical;
        }
        
        .feedback-form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .student-details {
            margin-bottom: 10px;
        }
        
        .options input[type="radio"] {
            display: none;
        }
        
        .options label {
            background-color: white;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .options input[type="radio"]:checked+label {
            background-color: #007bff;
            color: black;
        }
        
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .profile-details {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .profile-picture {
            width: 200px;
            /* Adjust size as needed */
            height: 200px;
            /* Adjust size as needed */
            border-radius: 50%;
            margin-bottom: 20px;
        }
        
        .profile-info {
            display: flex;
            width: 80%;
            /* Adjust width as needed */
            max-width: 800px;
            /* Adjust max-width as needed */
        }
        
        .profile-data-left {
            width: 50%;
            /* Adjust width as needed */
        }
        
        .profile-data-right {
            width: 50%;
            /* Adjust width as needed */
        }
        
        .profile-data-left p,
        .profile-data-right p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="#" class="logo">
                        <img src="logo.png" alt="logo" />
                        <span class="nav-item">Dashboard</span>
                    </a>
                </li>
                <li><a href="#" id="home1"><i class="fas fa-home"></i><span class="nav-item">Home</span></a></li>
                <li><a href="#" id="profile"><i class="fas fa-user"></i><span class="nav-item">Profile</span></a></li>
                <li><a href="#" id="students"><i class="fas fa-users"></i><span class="nav-item">Students</span></a></li>
                <li><a href="#" id="analytics"><i class="fas fa-chart-bar"></i><span class="nav-item">Assignment</span></a></li>
                <li><a href="#" id="tasks"><i class="fas fa-tasks"></i><span class="nav-item">Tasks</span></a></li>
                <li><a href="#" id="feedback"><i class="fas fa-users"></i><span class="nav-item">Feedback</span></a></li>
                <li><a href="#" id="settings"><i class="fas fa-cog"></i><span class="nav-item">Student Stats</span></a></li>
                <li><a href="#" id="help"><i class="fas fa-question-circle"></i><span class="nav-item">community Forum</span></a></li>
                <li><a href="landing.html" id="logout" class="logout"><i class="fas fa-sign-out-alt"></i><span class="nav-item">Log out</span></a></li>
            </ul>
        </nav>


        <section class="main">
            <div class="main-top">
                <h1 id="section-title">Skills</h1>
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="main-skills">
                <div class="card">
                    <img src="online-learning.png" alt="" width="90px" height="90px">
                    <h3>Passion for the Cause</h3>
                    <p>A strong belief in and commitment to the organization's mission and values.</p>
                    <button>Learn More</button>
                </div>
                <div class="card">
                    <img src="multitasking.png" alt="" width="90px" height="90px">
                    <h3>Technology Skills</h3>
                    <p>Proficiency in using technology for communication, research, and project management.</p>
                    <button>Learn More</button>
                </div>
                <div class="card">
                    <img src="networking.png" alt="" width="90px" height="90px">
                    <h3>Networking Skills</h3>
                    <p>Ability to build and maintain relationships with stakeholders, donors, and partners.</p>
                    <button>Learn More</button>
                </div>
                <div class="card">
                    <img src="satisfaction.png" alt="" width="90px" height="90px">
                    <h3>Problem-Solving Skills</h3>
                    <p> Ability to identify issues, analyze problems, and develop and implement solutions.</p>
                    <button>Learn More</button>
                </div>
            </div>


            <section class="main-course">
                <h1>Our Student</h1>
                <div class="course-box">
                    <ul>
                        <li class="active">STUDENT STATS</li>
                    </ul>
                    <div class="course">
                        <div class="box">
                            <div>
                                <h3>Siddhesh Vaishya</h3>
                                <p>SSC : 98%</p>
                                <p>HSC : 89%</p>
                                <p>currently CET</p>

                            </div>
                            <div>
                                <img src="rahul.png" alt="" width="100px" height="100px">
                            </div>
                        </div>
                        <div class="box">
                            <div>
                                <h3>Sonal Gupta</h3>
                                <p>SSC : 96%</p>
                                <p>HSC : 92%</p>
                                <p>currently JEE</p>

                            </div>
                            <div>
                                <img src="sonal1.png" alt="" width="100px" height="100px">
                            </div>
                        </div>
                        <div class="box">
                            <div>
                                <h3>Shivam shukla</h3>
                                <p>SSC : 89%</p>
                                <p>HSC : 71%</p>
                                <p>currently CET</p>

                            </div>
                            <div>
                                <img src="avnit.png" alt="" width="100px" height="100px">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>

    <script src="dash.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const profileLink = document.getElementById("profile");
            const tasksLink = document.getElementById("tasks");
            const settingsLink = document.getElementById("settings");
            const feedbackLink = document.getElementById("feedback");
            const helpLink = document.getElementById("help");
            const homeLink = document.querySelector("#home1");
            const mainContent = document.querySelector(".main");

            // Event listener for profile link
            profileLink.addEventListener("click", function(event) {
                event.preventDefault();
                loadProfile();
            });

            // Event listener for tasks link
            tasksLink.addEventListener("click", function(event) {
                event.preventDefault();
                loadTasks();
            });

            // Event listener for settings link
            settingsLink.addEventListener("click", function(event) {
                event.preventDefault();
                loadSettings();
            });

            // Event listener for feedback link
            feedbackLink.addEventListener("click", function(event) {
                event.preventDefault();
                loadFeedback();
            });

            // Event listener for help link
            helpLink.addEventListener("click", function(event) {
                event.preventDefault();
                loadHelp();
            });

            // Event listener for home link
            homeLink.addEventListener("click", function(event) {
                event.preventDefault();
                loadHome(); // Call the function to load home content
            });

            // Function to load profile content
            function loadProfile() {
                fetch("fetch_profile.php") // Assuming this PHP script fetches user profile data from the database
                    .then((response) => response.text())
                    .then((data) => {
                        mainContent.innerHTML = data;
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                    });
            }

            // Function to load tasks content
            function loadTasks() {
                mainContent.innerHTML = `
          <div class="tasks">
            <h1>Tasks</h1>
            <form id="taskForm">
              <h2>Volunteer Monitoring</h2>
              <ul>
                <li><input type="checkbox" id="task1" name="volunteerTask"><label for="task1">Regularly check in with assigned students to assess their progress and well-being.</label></li>
                <li><input type="checkbox" id="task2" name="volunteerTask"><label for="task2">Document student attendance and participation in educational activities.</label></li>
                <li><input type="checkbox" id="task3" name="volunteerTask"><label for="task3">Provide feedback and support to students based on their performance and needs.</label></li>
                <li><input type="checkbox" id="task4" name="volunteerTask"><label for="task4">Collaborate with teachers and staff to identify students who require additional assistance.</label></li>
              </ul>

              <h2>Student Development</h2>
              <ul>
                <li><input type="checkbox" id="task5" name="studentTask"><label for="task5">Organize tutoring sessions for students who need academic support in specific subjects.</label></li>
                <li><input type="checkbox" id="task6" name="studentTask"><label for="task6">Conduct mentorship programs to guide students in setting academic and personal goals.</label></li>
                <li><input type="checkbox" id="task7" name="studentTask"><label for="task7">Facilitate skill-building workshops on topics such as communication, problem-solving, and time management.</label></li>
                <li><input type="checkbox" id="task8" name="studentTask"><label for="task8">Arrange career counseling sessions to help students explore career options and plan their future.</label></li>
              </ul>

              <div class="task-details">
                <h2>Task Details</h2>
                <label for="task-location">Location:</label>
                <input type="text" id="task-location" name="taskLocation"><br>
                <label for="task-deadline">Deadline:</label>
                <input type="date" id="task-deadline" name="taskDeadline"><br>
                <label for="task-apology">Apology if task is forgotten:</label>
                <textarea id="task-apology" name="taskApology" rows="4" cols="50"></textarea>
              </div>

              <button type="submit" id="submitTasks">Submit Tasks</button>
            </form>
          </div>
        `;
            }

            // Function to load settings content
            function loadSettings() {
                mainContent.innerHTML = `
                <button>STUDENT STATUS<a href="studentgraph.html">HERE</a></button>
                
        `;
            }

            // Function to load feedback content
            function loadFeedback() {
                // Sample array of assigned students
                const assignedStudents = [{
                    id: 1,
                    name: "Rahul Suresh Soni"
                }, {
                    id: 2,
                    name: "Akhil Kedarnath Varma"
                }, {
                    id: 3,
                    name: "Avnit Jai Singh"
                }, {
                    id: 4,
                    name: "Sonal Niraj Singh"
                }, {
                    id: 5,
                    name: "Isha Rajesh Tiwari"
                }, {
                    id: 6,
                    name: "Anuj Rajesh Tiwari"
                }, ];

                // Generate feedback forms for all assigned students
                const feedbackForms = assignedStudents.map((student, index) => {
                    return `
            <div class="feedback-box">
              <div class="student-details">
                <h2>${student.name}</h2>
              </div>
              <form id="feedbackForm${index}" class="feedback-form">
                <label>Question 1: Did the student actively participate in class?</label>
                <div class="options">
                  <input type="radio" id="excellent${index}" name="question1${index}" value="excellent">
                  <label for="excellent${index}">Excellent</label>
                  <input type="radio" id="good${index}" name="question1${index}" value="good">
                  <label for="good${index}">Good</label>
                  <input type="radio" id="poor${index}" name="question1${index}" value="poor">
                  <label for="poor${index}">Poor</label>
                </div>

                <label>Question 2: Was the student attentive during lessons?</label>
                <div class="options">
                  <input type="radio" id="excellent${index}" name="question2${index}" value="excellent">
                  <label for="excellent${index}">Excellent</label>
                  <input type="radio" id="good${index}" name="question2${index}" value="good">
                  <label for="good${index}">Good</label>
                  <input type="radio" id="poor${index}" name="question2${index}" value="poor">
                  <label for="poor${index}">Poor</label>
                </div>

                <label>Question 3: Did the student complete assigned tasks on time?</label>
                <div class="options">
                  <input type="radio" id="excellent${index}" name="question3${index}" value="excellent">
                  <label for="excellent${index}">Excellent</label>
                  <input type="radio" id="good${index}" name="question3${index}" value="good">
                  <label for="good${index}">Good</label>
                  <input type="radio" id="poor${index}" name="question3${index}" value="poor">
                  <label for="poor${index}">Poor</label>
                </div>

                <label>Question 4: Did the student ask questions when they needed help?</label>
                <div class="options">
                  <input type="radio" id="excellent${index}" name="question4${index}" value="excellent">
                  <label for="excellent${index}">Excellent</label>
                  <input type="radio" id="good${index}" name="question4${index}" value="good">
                  <label for="good${index}">Good</label>
                  <input type="radio" id="poor${index}" name="question4${index}" value="poor">
                  <label for="poor${index}">Poor</label>
                </div>

                <label>Question 5: Was the student respectful towards others?</label>
                <div class="options">
                  <input type="radio" id="excellent${index}" name="question5${index}" value="excellent">
                  <label for="excellent${index}">Excellent</label>
                  <input type="radio" id="good${index}" name="question5${index}" value="good">
                  <label for="good${index}">Good</label>
                  <input type="radio" id="poor${index}" name="question5${index}" value="poor">
                  <label for="poor${index}">Poor</label>
                </div>

                <label for="feedbackContent${index}">Additional Feedback:</label>
                <textarea id="feedbackContent${index}" name="feedbackContent" rows="4" required></textarea>
                <button type="submit">Submit Feedback</button>
              </form>
            </div>
          `;
                });

                // Display the feedback forms in the main content
                mainContent.innerHTML = `
          <div class="feedback">
            <h1>Feedback</h1>
            <div class="feedback-container">
              ${feedbackForms.join("")}
            </div>
          </div>
        `;
            }

            // Function to load help content
            function loadHelp() {
                mainContent.innerHTML = `
                <a href="volunteer_chat.html"> chat here</a>
      `;
            }

            // Function to load home content
            function loadHome() {
                mainContent.innerHTML = `
          <div class="home">
            <h1>Welcome to your Dashboard</h1>
            <p>Explore and manage your dashboard features here.</p>
          </div>
        `;
            }
        });
    </script>
</body>

</html>
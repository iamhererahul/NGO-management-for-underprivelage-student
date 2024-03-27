document.addEventListener("DOMContentLoaded", function () {
  const studentsLink = document.getElementById("students");
  const analyticsLink = document.getElementById("analytics");
  const homeLink = document.querySelector(".logo");
  const mainContent = document.querySelector(".main");

  // Event listener for students link
  studentsLink.addEventListener("click", function (event) {
    event.preventDefault();
    loadStudents();
  });

  // Event listener for analytics link
  analyticsLink.addEventListener("click", function (event) {
    event.preventDefault();
    loadAnalytics();
  });

  // Event listener for home link
  homeLink.addEventListener("click", function (event) {
    event.preventDefault();
    location.reload(); // Reload the page
  });

  // Function to load students list
  function loadStudents() {
    mainContent.innerHTML = `
              <div class="students-list">
                  <h1>Students List</h1>
                  <table>
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Age</th>
                              <th>Gender</th>
                              <th>Locality</th>
                              <th>Verified</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>Akhil Kedarnath Varma</td>
                              <td>19</td>
                              <td>Male</td>
                              <td>Dahisar</td>
                              <td><input type="checkbox"></td>
                          </tr>
                          <tr>
                              <td>Rahul Suresh Soni</td>
                              <td>20</td>
                              <td>Male</td>
                              <td>Mahim</td>
                              <td><input type="checkbox"></td>
                          </tr>
                          <tr>
                              <td>Avnit Jai Singh</td>
                              <td>22</td>
                              <td>Male</td>
                              <td>Naigaon</td>
                              <td><input type="checkbox"></td>
                          </tr>
                          <tr>
                              <td>Sonal Niraj Singh</td>
                              <td>30</td>
                              <td>Female</td>
                              <td>Virar</td>
                              <td><input type="checkbox"></td>
                          </tr>
                          <tr>
                              <td>Isha Rajesh Tiwari</td>
                              <td>21</td>
                              <td>Female</td>
                              <td>Nallasopara</td>
                              <td><input type="checkbox"></td>
                          </tr>
                      </tbody>
                  </table>
                  <button>Submit</button>
              </div>
            `;
  }

  // Function to load analytics content
  function loadAnalytics() {
    mainContent.innerHTML = `
              <div class="head1">
                  <h1>STUDENT ASSIGNMENTS</h1>
              </div>
              <div class="split-container">
                  <div class="students-list">
                      <table>
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Assignment</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td><span>Akhil Kedarnath Varma</span></td>
                                  <td><button class="view-assignments-btn" data-student="Akhil Kedarnath Varma">View Assignments</button></td>
                              </tr>
                              <tr>
                                  <td>Rahul Suresh Soni</td>
                                  <td><button class="view-assignments-btn" data-student="Rahul Suresh Soni">View Assignments</button></td>
                              </tr>
                              <tr>
                                  <td>Sonal Niraj Singh</td>
                                  <td><button class="view-assignments-btn" data-student="Sonal Niraj Singh">View Assignments</button></td>
                              </tr>
                              <tr>
                                  <td>Avnit Jai Singh</td>
                                  <td><button class="view-assignments-btn" data-student="Avnit Jai Singh">View Assignments</button></td>
                              </tr>
                              <tr>
                                  <td>Isha Rajesh Tiwari</td>
                                  <td><button class="view-assignments-btn" data-student="Isha Rajesh Tiwari">View Assignments</button></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="assignment-details">
                      <h1>SELECT STUDENT  FOR REMAINING ASSIGNMENTS</h1>
                      <!-- Assignment details will be dynamically loaded here -->
                  </div>
              </div>`;

    // Add event listeners to view student assignments
    const viewAssignmentsBtns = document.querySelectorAll(
      ".view-assignments-btn"
    );
    viewAssignmentsBtns.forEach((btn) => {
      btn.addEventListener("click", function () {
        const studentName = this.getAttribute("data-student");
        loadStudentAssignments(studentName);
      });
    });
  }

  // Function to load student assignments
  function loadStudentAssignments(studentName) {
    // Define assignments for each student
    const studentAssignments = {
      "Akhil Kedarnath Varma": [
        {
          title: "Homework Help Sessions",
          status: "Pending",
          deadline: "2024-04-01",
        },
        {
          title: "STEM Exploration Workshops",
          status: "Submitted",
          deadline: "2024-04-15",
        },
        // Add more assignments for this student as needed
      ],
      "Rahul Suresh Soni": [
        {
          title: "Financial Literacy Seminar",
          status: "Submitted",
          deadline: "2024-04-05",
        },
        {
          title: "Career Exploration Fair",
          status: "Pending",
          deadline: "2024-04-20",
        },
        // Add more assignments for this student as needed
      ],
      "Sonal Niraj Singh": [
        {
          title: "Literacy Enhancement Program",
          status: "Pending",
          deadline: "2024-04-10",
        },
        {
          title: "Artistic Expression Workshop",
          status: "Submitted",
          deadline: "2024-04-25",
        },
        // Add more assignments for this student as needed
      ],
      "Avnit Jai Singh": [
        {
          title: "Health and Hygiene Awareness Campaign",
          status: "Pending",
          deadline: "2024-04-15",
        },
        {
          title: "Environmental Conservation Project",
          status: "Submitted",
          deadline: "2024-05-01",
        },
        // Add more assignments for this student as needed
      ],
      "Isha Rajesh Tiwari": [
        {
          title: "Community Service Initiative",
          status: "Pending",
          deadline: "2024-04-20",
        },
        {
          title: "Social Justice Forum",
          status: "Submitted",
          deadline: "2024-05-05",
        },
        // Add more assignments for this student as needed
      ],
    };

    let assignmentsHtml = "<h2>Assignments for " + studentName + "</h2>";
    assignmentsHtml += "<ul>";

    // Retrieve assignments for the selected student
    const assignments = studentAssignments[studentName];
    if (assignments) {
      assignments.forEach((assignment) => {
        assignmentsHtml += `
                      <li>
                          <span>${assignment.title}</span><br>
                          <span>Status: ${assignment.status}</span><br>
                          <span>Deadline: ${assignment.deadline}</span>
                      </li>
                      <br>
                  `;
      });
    } else {
      assignmentsHtml += "<li>No assignments found for this student.</li>";
    }

    assignmentsHtml += "</ul>";

    const assignmentDetailsContainer = document.querySelector(
      ".assignment-details"
    );
    assignmentDetailsContainer.innerHTML = assignmentsHtml;
  }
});

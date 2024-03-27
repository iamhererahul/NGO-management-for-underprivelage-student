document.getElementById('recommendation-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var volunteerName = document.getElementById('volunteer-name').value;
    if (volunteerName.trim() === '') {
      alert('Please enter the volunteer\'s name.');
      return;
    }
   
    document.getElementById('volunteer-name-output').textContent = volunteerName;
    document.getElementById('letter-content').style.display = 'block';
    var today = new Date();
var date = today.toLocaleDateString('en-US');
document.getElementById("certificate-date").textContent = date;
  });
  
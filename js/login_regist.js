function showAlert(message) {
  var alertDiv = document.getElementById("alert");
  var messageDiv = document.getElementById("alert-message");
  messageDiv.innerText = message;
  alertDiv.style.display = "block";
  setTimeout(function () {
    alertDiv.style.display = "none";
  }, 5000); // Adjust the timeout as needed (e.g., 5000 milliseconds for 5 seconds)
}

function closeAlert() {
  var alertDiv = document.getElementById("alert");
  alertDiv.style.display = "none";
}

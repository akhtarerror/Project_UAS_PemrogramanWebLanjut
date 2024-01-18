// dashboard.js

// Function to update Mahasiswa and Dosen count
function updateCounts() {
  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Specify the request method and URL
  xhr.open("GET", "get_counts.php", true);

  // Set the callback function to handle the response
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Parse the JSON response
      var counts = JSON.parse(xhr.responseText);

      // Update Mahasiswa and Dosen counts in the DOM
      document.getElementById("mahasiswaCount").innerText =
        counts.mahasiswaCount;
      document.getElementById("dosenCount").innerText = counts.dosenCount;
    }
  };

  // Send the request
  xhr.send();
}

// Call the updateCounts function initially
updateCounts();

// Set an interval to update counts every 5 seconds (adjust as needed)
setInterval(updateCounts, 5000);

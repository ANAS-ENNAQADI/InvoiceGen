function appearx(){
    var input = document.getElementById("searchInput");
    var clear = document.getElementById("clearButton");

    if (input.value !== ""){
        clear.style.display="block";
    }else{
        clear.style.display ="none";
    }
  }
 
  function clearx() {
    var clear = document.getElementById("clearButton");
    var input = document.getElementById("searchInput");
  
    if (input.value == "") {
      // If the input is already empty, do nothing
      return;
    }
  
    input.value = "";
    clear.style.display = "none";
  
    var table = document.querySelector(".data-table");
    var tr = table.getElementsByTagName("tr");
  
    for (var i = 0; i < tr.length; i++) {
      tr[i].style.display = "";
    }
    var pElement = document.getElementById("p");
  
      pElement.style.display = "none";
  
    // Reset the "main" element's height to its original value
    var main1 = document.getElementById("main");
    main1.style.height = originalMainHeight + "px";
  }
  
  
  // JavaScript (script.js)
// export.js
// export.js
document.addEventListener('DOMContentLoaded', function() {
  const exportBtn = document.getElementById('export');
  
  exportBtn.addEventListener('click', function() {
    fetch('history1.php')
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.blob();
      })
      .then(blob => {
        // Create a temporary link and trigger the download
        const url = window.URL.createObjectURL(new Blob([blob]));
        const a = document.createElement('a');
        a.href = url;
        a.download = 'invoices_export.csv';
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
      })
      .catch(error => {
        console.error('Fetch error:', error);
      });
  });
});
function openPage() {
  var targetUrl = "/backend/body.php";

  // Attempt to navigate to the target URL
  try {
    window.location.replace(targetUrl);
  } catch (error) {
    // Log any errors to the console
    console.error("Error navigating to " + targetUrl + ": ", error);

    // You can also display an error message to the user on the page
    // For example:
    // var errorMessage = "An error occurred while loading the page.";
    // document.body.innerHTML = errorMessage;
  }
}

// script.js
// script.js
// your_script.js
document.addEventListener('DOMContentLoaded', function () {
  fetchData();
});

var originalMainHeight = 0; // Define a global variable to store the original height of the "main" element

function fetchData() {
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Handle the response from the server
        const data = JSON.parse(xhr.responseText);

        // Check if data is available before populating the table
        if (data && data.length > 0) {
          populateTable(data);

          // Get the initial height of the "main" element and store it in a variable
          const main1 = document.getElementById("main");
          originalMainHeight = parseInt(main1.offsetHeight); // Store the original height in the global variable
        } else {
          console.log('No data available to populate the table.');
        }
      } else {
        // Handle error if the request fails
        console.error('Error while fetching data');
      }
    }
  };

  xhr.open('GET', '/backend/history2.php', true);
  xhr.send();
}


function populateTable(data) {
  const tableBody = document.querySelector('.data-table tbody');
  tableBody.innerHTML = '';

  data.forEach((row) => {
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
          <td>${row.customer ?? ''}</td>
          <td>${row.bill_to ?? ''}</td>
          <td>${row.total ?? ''}</td>
          <td>${row.typee ?? ''}</td>
          <td>${row.da_te ?? ''}</td>
          
          <td><button class="delete-button" data-rowid="${row.id_Inv}">Delete</button></td>
      `;
      tableBody.appendChild(newRow);
  });

  // Attach event listeners to delete buttons
  const deleteButtons = document.querySelectorAll('.delete-button');
  deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
      const rowId = button.getAttribute('data-rowid');
      deleteRow(rowId, button); // Pass the button reference
    });
  });

  

  adjustElementHeights(data.length);
 

  // Adjust the heights and margins when data is present
  
}







// ... Your existing code ...




var main = 0 ;
var down = 0;
var footer = 0;

function adjustElementHeights(rowCount) {
  // Adjust the main element's height based on the number of rows added
   main = document.getElementById("main");
  if (main) {
    main.style.height = (430 + rowCount * 25) + "px";
  }

  // Adjust the down element's top position based on the number of rows added
   down = document.getElementById("down");
  if (down) {
    down.style.top = (1 + rowCount ) + "px";
  }

  // Adjust the footer element's top position based on the number of rows added
   footer = document.getElementById("foot");
  if (footer) {
    footer.style.marginTop = (50 + rowCount * 20) + "px";
  }
}



function deleteRow(rowId, deleteButton) {

  fetch(`/backend/history1.php?id_Inv=${rowId}`, {
    method: "GET",
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      alert(data.message);

      // Remove the deleted row from the table
      const row = deleteButton.closest('tr');
      row.parentNode.removeChild(row);
      const newRowcount = document.querySelectorAll('.data-table tbody tr').length;

      // Adjust element heights after deleting a row
      adjustElementHeights1(newRowcount);
    } else {
      console.error("Error deleting row:", data.error);
    }
  })
  .catch(error => {
    console.error("Error deleting row:", error);
  });
}


function adjustElementHeights1(rowCount) {
  // Adjust the main element's height based on the new row count
  const main1 = document.getElementById("main");
  if (main1) {
    const originalHeight = parseFloat(originalMainHeight);
    main1.style.height = (originalHeight - rowCount *3) + "px";
  }

  // Adjust the down element's top position based on the new row count
  const down1 = document.getElementById("down");
  if (down1) {
    const originalTop = parseFloat(down1.style.marginTop);
    down1.style.top = (originalTop - rowCount) + "px";
  }

  // Adjust the footer element's top position based on the new row count
  const footer1 = document.getElementById("foot");
  if (footer1) {
    const originalMarginTop = parseFloat(originalFooterMarginTop);
    footer1.style.marginTop = (originalMarginTop - rowCount * 20) + "px";
  }
}


function searchTable() {
  var input, filter, table, tr, td, i, txtValue, matchFound;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.querySelector(".data-table");
  tr = table.getElementsByTagName("tr");
  matchFound = false; // Initialize matchFound to false

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1]; // Assuming the name is in the second column (index 1)
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        matchFound = true; // Set matchFound to true if a match is found
      } else {
        tr[i].style.display = "none";
      }
    }
  }

  // Display or hide the "p" element based on matchFound
  var pElement = document.getElementById("p");
  if (matchFound) {
    pElement.style.display = "none";
  } else {
    pElement.style.display = "block";
  }

  // Adjust the height of the "main" element based on the number of rows displayed
  var main1 = document.getElementById("main");
  var rowCount = 0;

  for (i = 0; i < tr.length; i++) {
    if (tr[i].style.display !== "none") {
      rowCount++;
    }
  }

  main1.style.height = rowCount * 17 + 430 + "px";
}







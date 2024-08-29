 // Get the current date
 var today = new Date();

 // Format the date as needed (e.g., MM/DD/YYYY)
 var formattedDate = (today.getMonth() + 1) + '/' + today.getDate() + '/' + today.getFullYear();

 // Display the date in the <p> element
 document.getElementById('date').innerText = formattedDate;
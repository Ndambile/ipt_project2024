document.addEventListener("DOMContentLoaded", function () {
  // Get the button element
  const showFormButton = document.getElementById("respondButton");

  // Add event listener to the button to replace the content with the form when clicked
  showFormButton.addEventListener("click", function () {
    // Replace the entire content inside the 'content' div with the form HTML, including the Bootstrap CSS link
    document.getElementById("proBanner").innerHTML = `
    <div style="width:70%;color:black;display:flex;text-align:center">
      <div class="container">
        <form action="student_submit_assign.php" method="post" enctype="multipart/form-data"  style="background-color:#ffffff;box-shadow:1px 0 10px 1px #000;">
          <h3 class="mb-4 font-weight-bold" style="color:grey;font-size:38px">Fill Out This Form</h3>        
          <div class="form-group" style="width:80%;justified-content:center">
            <label for="stdnt-assign-file" style="font-size:16px" class=" p-3">Upload File (PDF Only):</label>
            <input type="file" class="form-control-file text-center j" id="stdnt-assign-file" name="stdntAssignFile" accept=".pdf" style="margin-left:35%" required>
          </div>
          <button type="submit" name="submit" value="submit" class="btn btn-primary mt-3 mb-3 ">Submit</button>
        </form>
      </div>
    </div>
    `;
  });
});

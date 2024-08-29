document.getElementById("createAssignmentForm").onsubmit = function () {
  const textInput = document.getElementById("assignText").value.trim();
  const fileInput = document.getElementById("assignFile").value;
  const errorMessage = document.getElementById("error-message");

  if ((textInput && fileInput) || (!textInput && !fileInput)) {
    errorMessage.textContent =
      "Please either fill the text area or upload a file, not both.";
    return false; // Prevent form submission
  }

  errorMessage.textContent = ""; // Clear any previous error message
  return true; // Allow form submission
};

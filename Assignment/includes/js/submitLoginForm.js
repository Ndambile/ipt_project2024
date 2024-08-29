document.addEventListener("DOMContentLoaded", function () {
  //Get the submit button by its ID
  const submitButton = document.getElementById("submitButton");

  //Add a click event listener to the submit button
  submitButton.addEventListener("click", function () {
    //Get the form by its ID
    const form = document.getElementById("loginForm");

    //Submit form
    form.submit();
  });
});

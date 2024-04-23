<script>
    function checkForErrors() {
      <?php if (isset($_SESSION['errors'])) : ?>
        const errors = <?php echo json_encode($_SESSION['errors']); ?>;
        // Display errors on the frontend (explained later)
        displayErrors(errors);
        <?php unset($_SESSION['errors']); // Clear errors after displaying ?>
      <?php endif; ?>
    }

    function displayErrors(errors) {
        alert(errors)
    //   const errorList = document.getElementById("error-messages");
    //   errorList.innerHTML = ""; // Clear previous errors
    //   errors.forEach(error => {
    //     alert(error);
    //     // const errorElement = document.createElement("li");
    //     // errorElement.textContent = error;
    //     // errorList.appendChild(errorElement);

    //   });
    }

    function checkForSuccess() {
      <?php if (isset($_SESSION['success'])) : ?>
        const success = <?php echo json_encode($_SESSION['success']); ?>;
        // Display errors on the frontend (explained later)
        displaySuccess(success);
        <?php unset($_SESSION['success']); // Clear errors after displaying ?>
      <?php endif; ?>
    }

    function displaySuccess(success) {
        alert(success)
    //   const errorList = document.getElementById("error-messages");
    //   errorList.innerHTML = ""; // Clear previous errors
    //   errors.forEach(error => {
    //     alert(error);
    //     // const errorElement = document.createElement("li");
    //     // errorElement.textContent = error;
    //     // errorList.appendChild(errorElement);

    //   });
    }


    window.onload = checkForSuccess; // Call checkForErrors on page load
    window.onload = checkForErrors; // Call checkForErrors on page load
</script>
// Get all input elements with the "input-number-only" class
const numberInputs = document.querySelectorAll('.input-number-only');
     
numberInputs.forEach(input => {
     input.addEventListener('input', function () {
          // Remove any non-numeric characters using a regular expression
          this.value = this.value.replace(/[^0-9]/g, '');
     });
});
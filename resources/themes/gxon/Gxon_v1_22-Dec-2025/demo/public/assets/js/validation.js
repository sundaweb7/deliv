(() => {
  'use strict'

  // Select all forms with class 'needs-validation'
  const forms = document.querySelectorAll('.needs-validation')

  // Loop through each form
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      
      // Check if form is valid
      if (!form.checkValidity()) {
        event.preventDefault()   // Prevent form submission
        event.stopPropagation()  // Stop further event bubbling
      }

      // Add Bootstrap class to show validation feedback
      form.classList.add('was-validated')
    }, false)
  })
})()

/*
Template Name: Lexa - Admin & Dashboard Template
Author: Themesdesign
Website: https://Themesdesign.com/
Contact: Themesdesign@gmail.com
File: Form validation
*/


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            Array.from(form.elements).forEach(function(field) {
                field.addEventListener('input', function(event) {
                    if (field.checkValidity()) {
                        field.classList.add('is-valid');
                        field.classList.remove('is-invalid');
                    } else {
                        field.classList.add('is-invalid');
                        field.classList.remove('is-valid');
                    }
                });
            });

            form.addEventListener('submit', function(event) {
                Array.from(form.elements).forEach(function(field) {
                    if (field.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
            }, false);
        });
    }, false);
})();


// parsley validation
$(document).ready(function() {
	$('.custom-validation').parsley();
});
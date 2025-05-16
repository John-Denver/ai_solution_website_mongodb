// Form validation
document.addEventListener('DOMContentLoaded', function() {
    // Fetch the form element
    const form = document.getElementById('contactForm');
    
    if (form) {
        // Add submit event listener
        form.addEventListener('submit', function(event) {
            // Prevent form submission
            event.preventDefault();
            event.stopPropagation();
            
            // Validate form
            if (validateForm()) {
                // Form is valid - you would typically submit to server here
                alert('Form submitted successfully!');
                form.reset();
                form.classList.remove('was-validated');
            } else {
                // Form is invalid
                form.classList.add('was-validated');
            }
        });
        
        // Add real-time validation on blur
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });
        });
    }
    
    function validateForm() {
        let isValid = true;
        const form = document.getElementById('contactForm');
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
        
        inputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });
        
        return isValid;
    }
    
    function validateField(field) {
        if (field.required && !field.value.trim()) {
            field.classList.add('is-invalid');
            return false;
        }
        
        // Email validation
        if (field.type === 'email' && field.value.trim()) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(field.value)) {
                field.classList.add('is-invalid');
                field.nextElementSibling.textContent = 'Please enter a valid email address.';
                return false;
            }
        }
        
        // Phone validation
        if (field.type === 'tel' && field.value.trim()) {
            const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
            if (!phoneRegex.test(field.value)) {
                field.classList.add('is-invalid');
                field.nextElementSibling.textContent = 'Please enter a valid phone number.';
                return false;
            }
        }
        
        // If all validations pass
        field.classList.remove('is-invalid');
        return true;
    }
});
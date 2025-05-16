document.addEventListener('DOMContentLoaded', function() {
    // Check if user is already logged in
    if (localStorage.getItem('adminToken')) {
        window.location.href = 'admin-dashboard.html';
    }

    // Login form submission
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // In a real app, you would make an API call to your backend
            // This is just a simulation for demonstration
            if (username === 'admin' && password === 'admin123') {
                // Simulate getting a token from the server
                const fakeToken = 'fake-jwt-token-' + Math.random().toString(36).substr(2);
                
                // Store token in localStorage
                localStorage.setItem('adminToken', fakeToken);
                localStorage.setItem('adminUsername', 'Administrator');
                
                // Redirect to dashboard
                window.location.href = 'admin-dashboard.html';
            } else {
                alert('Invalid username or password');
            }
        });
    }

    // Logout functionality
    const logoutButtons = document.querySelectorAll('#logoutBtn, #logoutBtnTop');
    logoutButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            localStorage.removeItem('adminToken');
            localStorage.removeItem('adminUsername');
            window.location.href = 'admin-login.html';
        });
    });
});
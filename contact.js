document.addEventListener("DOMContentLoaded", function() {
        // Get references to the login and register containers
        const loginContainer = document.getElementById("login-container");
        const registerContainer = document.getElementById("register-container");

        // Get references to the register button and back to login button
        const registerBtn = document.getElementById("registerBtn");
        const backToLoginBtn = document.getElementById("backToLoginBtn");

        // Add event listener to the register button
        registerBtn.addEventListener("click", function() {
            // Toggle the visibility of the login and register containers
            loginContainer.style.display = "none";
            registerContainer.style.display = "block";
        });

        // Add event listener to the back to login button
        backToLoginBtn.addEventListener("click", function() {
            // Toggle the visibility of the login and register containers in reverse
            loginContainer.style.display = "block";
            registerContainer.style.display = "none";
        });
    });

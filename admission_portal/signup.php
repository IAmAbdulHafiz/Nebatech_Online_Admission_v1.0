<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nebatech Admission Portal - Sign Up</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            color: #1a73e8;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: #666;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #444;
        }

        input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #1a73e8;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .error {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }

        button {
            background-color: #1a73e8;
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1557b0;
        }

        .required::after {
            content: "*";
            color: #dc3545;
            margin-left: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nebatech Admission Portal</h1>
            <p>Create your account to begin the application process</p>
        </div>

        <form id="signupForm" onsubmit="return validateForm(event)">
            <div class="form-row">
                <div class="form-group">
                    <label for="serialNumber" class="required">Serial Number</label>
                    <input type="text" id="serialNumber" name="serialNumber" required>
                    <div class="error" id="serialNumberError"></div>
                </div>

                <div class="form-group">
                    <label for="pin" class="required">PIN</label>
                    <input type="text" id="pin" name="pin" required>
                    <div class="error" id="pinError"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="firstName" class="required">First Name</label>
                    <input type="text" id="firstName" name="firstName" required>
                    <div class="error" id="firstNameError"></div>
                </div>

                <div class="form-group">
                    <label for="surname" class="required">Surname</label>
                    <input type="text" id="surname" name="surname" required>
                    <div class="error" id="surnameError"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="otherName">Other Name</label>
                <input type="text" id="otherName" name="otherName">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="email" class="required">Email Address</label>
                    <input type="email" id="email" name="email" required>
                    <div class="error" id="emailError"></div>
                </div>

                <div class="form-group">
                    <label for="phone" class="required">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>
                    <div class="error" id="phoneError"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password" class="required">Password</label>
                    <input type="password" id="password" name="password" required>
                    <div class="error" id="passwordError"></div>
                </div>

                <div class="form-group">
                    <label for="confirmPassword" class="required">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                    <div class="error" id="confirmPasswordError"></div>
                </div>
            </div>

            <button type="submit">Create Account</button>
        </form>
    </div>

    <script>
        function validateForm(event) {
            event.preventDefault();
            let isValid = true;
            
            // Reset errors
            const errors = document.querySelectorAll('.error');
            errors.forEach(error => error.style.display = 'none');

            // Validate Serial Number
            const serialNumber = document.getElementById('serialNumber').value;
            if (serialNumber.length !== 10) {
                showError('serialNumberError', 'Serial Number must be 10 characters long');
                isValid = false;
            }

            // Validate PIN
            const pin = document.getElementById('pin').value;
            if (pin.length !== 6) {
                showError('pinError', 'PIN must be 6 characters long');
                isValid = false;
            }

            // Validate Email
            const email = document.getElementById('email').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showError('emailError', 'Please enter a valid email address');
                isValid = false;
            }

            // Validate Phone Number
            const phone = document.getElementById('phone').value;
            const phoneRegex = /^\d{11}$/;
            if (!phoneRegex.test(phone)) {
                showError('phoneError', 'Please enter a valid 11-digit phone number');
                isValid = false;
            }

            // Validate Password
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password.length < 8) {
                showError('passwordError', 'Password must be at least 8 characters long');
                isValid = false;
            }

            if (password !== confirmPassword) {
                showError('confirmPasswordError', 'Passwords do not match');
                isValid = false;
            }

            if (isValid) {
                // Here you would typically submit the form to your backend
                alert('Form submitted successfully!');
                // Uncomment the line below to submit the form to a backend
                // document.getElementById('signupForm').submit();
            }

            return false;
        }

        function showError(elementId, message) {
            const errorElement = document.getElementById(elementId);
            errorElement.textContent = message;
            errorElement.style.display = 'block';
        }
    </script>
</body>
</html>
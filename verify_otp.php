<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <style>
        /* Container for centering the form and heading */
        .container {
            max-width: 500px;
            margin: 150px auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Centered heading */
        .container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Input field styling */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Button styling */
        button {
            width: 100%;
            padding: 10px;
            background-color: #fd7e14;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        button:hover {
            background-color: black;
        }

        /* Message box styling */
        .message {
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            display: none;
        }

        .message-success {
            background-color: #d4edda;
            color: #155724;
        }

        .message-error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="container">
    <h2  style="font-size:28px;">Verify OTP and Change Password</h2>
    <form id="verifyOtpForm">
        <label for="otp"  style="float:left;font-size:16px; font-weight:bold;">Enter OTP:</label>
        <input type="text" id="otp" name="otp" required>
        <label for="new_password"  style="float:left;font-size:16px; font-weight:bold;">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <button type="submit">Submit</button>
    </form>
    <div id="message" class="message"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#verifyOtpForm').on('submit', function(e) {
            e.preventDefault();

            // Validate inputs
            const otp = $('#otp').val().trim();
            const newPassword = $('#new_password').val().trim();
            let isValid = true;

            // Check if OTP is provided
            if (otp === '') {
                $('#otp').css('border-color', 'red');
                isValid = false;
            } else {
                $('#otp').css('border-color', '#ccc');
            }

            // Check if new password is provided
            if (newPassword === '') {
                $('#new_password').css('border-color', 'red');
                isValid = false;
            } else {
                $('#new_password').css('border-color', '#ccc');
            }

            if (!isValid) {
                return; // Prevent form submission if validation fails
            }

            $.ajax({
                url: 'controller/userController.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    action: 'verifyOTP',
                    otp: otp,
                    new_password: newPassword
                }),
                success: function(response) {
                   
                    let messageBox = $('#message');

                    if (response.status) {
                        messageBox.removeClass('message-error').addClass('message-success')
                                  .html('<strong>Success!</strong> ' + response.message)
                                  .show();
                        setTimeout(function() {
                            messageBox.fadeOut('slow', function() {
                                
                            });
                        }, 3000);
                    } else {
                        messageBox.removeClass('message-success').addClass('message-error')
                                  .html('<strong>Error!</strong> ' + response.message)
                                  .show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", status, error);
                    $('#message').removeClass('message-success').addClass('message-error')
                                 .html('<strong>Error!</strong> An error occurred. Please try again.')
                                 .show();
                }
            });
        });
    });
</script>
</body>
</html>

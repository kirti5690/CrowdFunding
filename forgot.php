<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
       
        .container {
            max-width: 400px;
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
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="email"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .error-message {
            color: red;
            font-size: 14px;
            font-weight: bold;
            display: none; 
            margin-bottom: 20px;
            float:left;
        }

        .error-message.show {
            display: block;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #fd7e14;
            color: white;
            border: none;
            border-radius:5px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: black;
        }

        .message {
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            margin-top: 20px;
            
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
    <h2 style="font-size:28px;">Forgot Password</h2>
    <form id="forgotOtpForm">
        <label for="email" style="float:left;font-size:16px; font-weight:bold;">Enter your email:</label>
        <input type="email" id="email" name="email" required>
        <span id="emailError" class="error-message"></span>
        <button type="submit">Send OTP</button>
    </form>
    <div id="message" class="message"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const emailInput = $('#email');
        const emailError = $('#emailError');
        const messageDiv = $('#message');

        emailInput.on('focus', function() {
            emailError.text('*Please write your email').addClass('show');
        });

        emailInput.on('blur', function() {
            if ($(this).val().trim() !== '') {
                emailError.removeClass('show');
            } else {
                emailError.text('*Please write your email').addClass('show');
            }
        });

        $('#forgotOtpForm').on('submit', function(e) {
            e.preventDefault();
            
            if (emailInput.val().trim() === '') {
                emailError.text('*Please write your email').addClass('show');
                return;
            }

            $.ajax({
                url: 'controller/userController.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    action: 'sendOTP',
                    email: emailInput.val()
                }),
                
                success: function(response) {
                   
                    messageDiv.removeClass('message-success message-error');
                    
                    if (response.status) {
                        messageDiv.addClass('message-success').html('<strong>Success!</strong> ' + response.message).show();
                        setTimeout(function() {
                            window.location.href = 'verify_otp';
                        }, 2000); 
                    } else {
                        messageDiv.addClass('message-error').html('<strong>Error!</strong> ' + response.message).show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error:", status, error);
                    messageDiv.removeClass('message-success').addClass('message-error')
                             .html('<strong>Error!</strong> An error occurred. Please try again.').show();
                }
            });
        });
    });
</script>

</body>
</html>

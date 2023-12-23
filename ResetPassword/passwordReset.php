<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Reset Password </title>
    <link rel="icon" href="images/favicon.PNG" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/resetPage.css" /> 
    <link rel="stylesheet" href="../assets/css/style.css" /> 
  
</head>
<body>
    <div class="form-container">
    <form method="post" action="send-password-reset.php">
        <h2 class="title">Reset Password</h2> 
        <div class="input-field"> 
            <i class="fas fa-user"></i> 
            <input type="text" placeholder="Enter your email" name="email" id="reset-email" class="email"/> 
        </div> 
        <!-- <input type="submit" value="Send Password Reset Link" class="button" name="send" id="signin-btn" /> -->
        <button class="button">Send</button> 
        </div> 
    </form> 
    </div>
</body>
</html>
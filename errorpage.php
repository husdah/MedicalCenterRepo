<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/errorpage.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/dropdown.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <!--awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Page not found</title>
</head>
<body>
    <?php
        //include('header.php');
    ?>

    <section id="error" class="error-section">
        <div class="error-container">
            <div class="column-left">
                <span class="span-text">404 </span>
                <h3>Page Not Found</h3>
                <p> Sorry, we didn't find anything according to your request. It might have been removed, renamed, or did not exist in the first place.</p>
                <button type="button" class="btn error" id="error_btn" name="btn">Go To Home</button>
            </div>
            <div class="column-right">
                <img src="images/error-removebg-preview.png" class="error-image" alt="Error-Page-Image">
            </div>
        </div>
    </section>

    <?php 
        include('includes/footer.php');
    ?>
    
    <script src="assets/js/nav.js"></script>
    <script src="assets/js/errorpage.js"></script>

</body>
</html>
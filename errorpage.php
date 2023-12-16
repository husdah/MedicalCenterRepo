
    <?php
        include('includes/header.php');
        include('selectData.php');

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
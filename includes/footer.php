
    <footer class="footer">
        <div class="grid-container">
            <div class="footer-column1">
                <a href="home.php"><img src="./images/HealthHubLogo-removebg-preview.png" alt="HealthHubLogo" class="logo"></a>
                <p class="text-justify">Welcome to Health Hub, where compassionate care and medical excellence meet. To prioritize your well-being with state-of-the-art facilities and a patient-focused approach at every stage of your healthcare journey.</p>
            </div>

            <div class="footer-column2">
                <h4 class="footer-heading">Quick Link</h4>
                <hr>
                <ul class="footer-links">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="home.php#aboutSection">About Us</a></li>
                    <li><a href="home.php#serviceSection">Services</a></li>
                    <li><a href="home.php#doctorSection">Doctors</a></li>
                    <li><a href="clinics.php">Clinics</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-column3">
                <h4 class="footer-heading">Opening Hours</h4>
                <hr>
                <ul class="opening-hour">
                    <?php
                        $openHour = getOpeningHour();
                        $rowcount = mysqli_num_rows($openHour);
                        if($rowcount == 0){
                            echo '<script>alert("No record found")</script>';  
                        }else{
                            while($selectdata = mysqli_fetch_array($openHour)){
                    ?>
                            <li><?php echo $selectdata['shortDay']; ?>: <span class="<?php echo $selectdata['shortDay']; ?>">
                            <?php 
                                $fromHourDB = $selectdata['fromHour'];
                                $toHourDB   = $selectdata['toHour'];

                                $fromHour = date("h A", strtotime($fromHourDB));
                                $toHour   = date("h A", strtotime($toHourDB));
                                if($selectdata['closed'] == 0){
                                    echo $fromHour. " - " .$toHour;
                                }
                                else{
                                    echo "closed"; 
                                }
                            ?>
                            </span></li>
                    <?php
                            }
                        }
                    ?>
                </ul>
            </div>
            <div class="footer-column4">
                <h4 class="footer-heading">Contact Info</h4>
                <hr>
                <div class="footer-links">
                    <ul>
                        <li><a href="https://www.google.com/maps/place/Beyrouth/@33.8892114,35.4630826,13z/data=!3m1!4b1!4m6!3m5!1s0x151f17215880a78f:0x729182bae99836b4!8m2!3d33.8937913!4d35.5017767!16zL20vMDlianY?entry=ttu" target="_blank"><i class="fa-solid fa-location-dot"></i>Beirut, Lebanon</a></li></br>
                        <li><a href="tel:0096178960304"><i class="fa-solid fa-phone"></i>+ 961 78960304</a></li></br>
                        <li><a href="mailto:hijazizeinab5@gmail.com"><i class="fa-regular fa-envelope"></i>info@gmail.com</a></li></br>
                    </ul>
                </div>
                <ul class="social-icons mt">
                    <li><a class="facebook" href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a class="instagram" href="#"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a class="linkdin" href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </footer> 

    <div class="box-copyright">
        <div class="container-copyright">    
            <p class="copyright-text">&copy; 2023 Health Hub Medical Center. All Rights Reserved.</p>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script src="assets/js/donation.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/counters.js"></script>
    <!-- <script src="assets/js/scrollSection.js"></script> -->
    <!-- <script src="assets/js/navbar.js"></script> -->
    <script src="../assets/js/nav.js"></script>
    <!--<script src="assets/js/donationFormValidation.js"></script> -->
    <!--<script src="assets/js/formValidationContact.js"></script>-->
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/errorpage.js"></script>

</body>
</html>
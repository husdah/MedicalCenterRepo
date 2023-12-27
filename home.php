
    <?php
        session_start();
        include('functions/selectData.php');
        require('middleware/homeMiddleware.php');
        include('includes/header.php');

        $doctorCount  = getRowCount('doctor');
        $patientCount = getRowCount('patient');
        $clinicCount  = getRowCount('clinic');
        $donorCount   = getRowCount('donor');                
    ?>                
    
    <!-- Section Banner -->
    <section id="banner" class="banner">
        <div class="banner-container">
            <h1>Welcome to </h1>
            <h1 class="bannerHeading-mt">Health Hub Medical Center</h1>
            <h2>Your Health, Our Priority: Where Compassion Meets Care at Health Hub.</h2>
        </div>
        <div class="why-us-container">
            <div class="why-us-grid-col1 col1-content">
                <h3>Why Choose Health Hub?</h3>
                <ul>
                    <li>- Compassionate Care</li>
                    <li>- Medical Excellence</li>
                    <li>- Innovation</li>
                </ul>
            </div>
    
            <div class="why-us-grid-col2">
                <div class="icon-box">
                    <i class="fa-solid fa-user-doctor"></i>
                    <h4>Medical Team</h4>
                    <p>With a shared commitment to your well-being, our physicians bring a wealth of experience and expertise to every patient interaction. </p>
                </div>
            </div>
    
            <div class="why-us-grid-col2">
                <div class="icon-box">
                    <i class="fa-solid fa-calendar-days"></i>
                    <h4>Stay Informed</h4>
                    <p>Stay updated on upcoming health check-ups, special events, and wellness programs tailored just for you.</p>
                </div>
            </div>
    
            <div class="why-us-grid-col2">
                <div class="icon-box">
                    <i class="fa-solid fa-language"></i>
                    <h4>Accessible Language</h4>
                    <p>Experience healthcare that speaks your language – because your well-being knows no linguistic boundaries.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Book Appointment -->
    <div class="button-app">
        <a href="clinics.php"><i class="fa-solid fa-plus"></i></a>
    </div>

    <!-- Section About Us -->
    <section id="aboutSection" class="about">
        <div class="about-container">
            <div class="about-col1">
                <img id="aboutImage" src="images/about-home.jpg" alt="about-home">
            </div>
            <div class="about-col2">
                <h3>Health Hub Medical Center</h3>
                <p>A leading healthcare institution dedicated to providing exceptional medical services with a focus on compassion, innovation, and excellence.</p>
  
                <div class="icon-box">
                    <div class="icon">
                        <i class="fa-solid fa-eye-low-vision"></i>
                    </div>
                    <div class="title-description">
                        <h4 class="title">Our Mission</h4>
                        <p class="description">To enhance the well-being of our community by delivering comprehensive and personalized healthcare. Our team of highly skilled and compassionate healthcare professionals is committed to ensuring that every patient receives the highest standard of care in a supportive and healing environment.</p>
                    </div>
                </div>
                <div class="icon-box">
                    <div class="icon">
                        <i class='bx bx-target-lock'></i>
                    </div>
                    <div class="title-description">
                        <h4 class="title">Our Vision</h4>
                        <p class="description">To be a beacon of health and wellness in our community, providing accessible, patient-centered care that empowers individuals to lead healthier lives</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Section Counts -->
     <section id="countsID" class="counts">
        <div class="Counts-container">
            <div class="count-sub-container">
                <div class="count-box">
                    <i class="fas fa-user-md"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo $doctorCount-1; ?>" data-purecounter-duration="0" class="count">0</span>
                    <p>Doctors</p> 
                </div>
                <div class="count-box">
                    <i class="bx bx-group"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo $patientCount-1; ?>" data-purecounter-duration="0" class="count">0</span>
                    <p>Patients</p>
                </div>
                <div class="count-box">
                    <i class="bx bx-clinic"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo $clinicCount-1; ?>" data-purecounter-duration="0" class="count">0</span>
                    <p>Clinics</p>
                </div>
                <div class="count-box">
                    <i class="bx bx-donate-blood"></i>
                    <span data-purecounter-start="0" data-purecounter-end="<?php echo $donorCount-1; ?>" data-purecounter-duration="0" class="count">0</span>
                    <p>Donors</p>
                </div>
            </div>
        </div>
    </section>

    <section id="serviceSection" class="service-heading">
        <div class="section-title">
            <h2>Services</h2>
            <p>Your Well-Being, Our Priority: A Spectrum of Specialized Services</p>
        </div>
    </section>

    <!-- Section Services -->
    <section id="service" class="service">
        <div class="service-container">
            <div class="col col-1">
                <div class="service-column">
                    <i class='bx bxs-injection'></i>
                    <h1>Primary Care</h1>
                    <p>Routine check-ups, Preventive care and Vaccinations</p>
                </div>
    
                <div class="service-column">
                    <i class='bx bxs-camera-plus'></i>
                    <h1>Diagnostic services</h1>
                    <p class="padding-on-ipad">Radiology(X-rays, CT scans, MRIs) and Laboratory tests</p>
                </div>
            </div>
            <div class="col col-2">
                <div class="service-center">
                    <img src="images/services-home.jpg" class="service-image" width="150" height="150">
                </div>
            </div>
            <div class="col col-3">
                <div class="service-column">
                    <i class='bx bxs-shield-plus'></i>
                    <h1>Emergency Care</h1>
                    <p>Urgent medical attention and Emergency room services</p>
                </div>
                <div class="service-column">
                    <i class='bx bxs-user-voice'></i>
                    <h1>Mental Health</h1>
                    <p>Psychiatery, Conseling and therapy services</p>
                </div>
            </div>
        </div>
    </section>

    <section id="doctorSection" class="doctor-heading">
        <div class="section-title">
            <h2>Examples of Our Doctors</h2>
            <p>Dedicated to Your Health: Our Esteemed Team of Physicians</p>
        </div>
    </section>

    <section id="doctor" class = "doctor" >
        <div class="doctor-container">
        <?php
            $doctors  = getDoctors();
            $rowcount = mysqli_num_rows($doctors);
            //echo $rowcount;
            $max = 0;
            if($rowcount > 0){
                /*while($selectdata = mysqli_fetch_array($result)){*/
                for($i=0; $i < $rowcount ; $i++){
                    $max++;
                    if($max > 4){
                        break;
                    }
                    $selectdata = mysqli_fetch_array($doctors);
                    $profilePic = "docImgPlaceholder.jpg";
                    if($selectdata['doctorPhoto'] != null){
                        $profilePic = $selectdata['doctorPhoto'];
                    }   
            ?>
            <div class="doctor-column<?php echo $i; ?>">
                <div class="team__item">
                    <img src="uploads/<?php echo $profilePic; ?>" alt="">
                    <h5>Dr. <?php echo $selectdata['FullName']; ?></h5>
                    <span><?php echo $selectdata['clinicName']; ?></span>
                    <div class="team__item__social">
                        <a href="<?= $selectdata['facebook']  != "" ?  $selectdata['facebook']  : "#" ?>"><i class="fa-brands fa-facebook"></i></a>
                        <a href="<?= $selectdata['instagram'] != "" ?  $selectdata['instagram'] : "#" ?>"><i class="fa-brands  fa-instagram"></i></a>
                        <a href="<?= $selectdata['linkedin']  != "" ?  $selectdata['linkedin']  : "#" ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        <?php
                }
            }
        ?>
        </div> 
    </section>

    <section id="clinic-heading" class="clinic-heading">
        <div class="section-title">
            <h2>Clinics</h2>
            <p>A Haven of Healing: Discover Our Clinic's Comprehensive Services</p>
        </div>
    </section>
    
    <!-- Section Clinics -->
    <section id="clinics" class="clinics">
        <div class="clinic-container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                <?php
                    $clinics  = getClinics();
                    $rowcount = mysqli_num_rows($clinics);
                    //echo $rowcount;
                    $max = 0;
                    if($rowcount > 0){
                        for($i=0; $i < $rowcount; $i++){
                            $max++;
                            if($max > 10){
                                break;
                            }
                            $selectdata = mysqli_fetch_assoc($clinics);
                    ?>
                            <div class="swiper-slide item">
                                <div class="clinic-img">
                                    <img src="uploads/<?php echo $selectdata['photo']; ?>" class="w-80" alt="<?php echo $selectdata['name']; ?> clinic">
                                </div>
                                <div class="clinic-info">
                                    <h3><?php echo $selectdata['name']; ?></h3>
                                    <p><?php echo $selectdata['description']; ?></p>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>  
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Section Donation -->
     <section id="donation" class="donation">
        <div id="donatPanel" class="donation-panel">
            <h1><i class='bx bxs-quote-alt-left'></i>people live when people give<i class='bx bxs-quote-alt-right'></i></h1>
            <img src="images/donate-bg1-removebg-preview.png" alt="">
            <button id="btn-donate" class="click-to-donate"><span class="clickHere">Donate</span></button>
        </div>
        <div id="donateForm" class="donation-form">
            <h1><i class='bx bxs-quote-alt-left'></i>people live when people give<i class='bx bxs-quote-alt-right'></i></h1>
            <div class="donation-content">
                <i class="fa-solid fa-xmark"></i>
                <div class="sectionOne">
                    <img src="images/donate-bg2-removebg-preview.png">
                </div>
                <p>Please, Fill Out This Information:</p>
                <form id = "donateform" method="post" enctype="multipart/form-data">    
                    <div class="email-input">  
                        <input type="text" id="email" name="email-phone" class="donation-input" placeholder="Enter Email or Phone Number">
                        <span id="errorInput"></span>
                    </div>
                    <div class="blood-group"> 
                        <label for="mySelect">Select your blood group:</label> 
                        <select id="mySelect" name="mySelect"> 
                            <option value="Blood-Type">Blood Type</option> 
                            <option value="A+">A+</option> 
                            <option value="B+">B+</option> 
                            <option value="O+">O+</option> 
                            <option value="AB+">AB+</option> 
                            <option value="A-">A-</option> 
                            <option value="B-">B-</option> 
                            <option value="O-">O-</option> 
                            <option value="AB-">AB-</option> 
                        </select>
                    </div> 
                    <button id="click_donate" name="btn_send" type="button" class="btn-send"> Donate </button>
                </form>
            </div>
        </div>
    </section> 

<?php 
    include('includes/footer.php'); 
?>

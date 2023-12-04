<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== REMIXICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="icon" href="images/favicon.PNG" type="image/x-icon">
        
        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/doctorcss.css">
        <link rel="stylesheet" href="assets/css/doctorcss2.css">

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Profile card ui design - Bedimcode</title>
    </head>
    <body>

        <div class="sidebar" id="sidebar">
            <div class="logo">
                <!-- <i class="fa-solid fa-clinic-medical"></i> -->
                <i id="sideMenu" class="fa-solid fa-list"></i>
                <span>Clinics</span>
            </div>
            <ul class="menu">
                <li>
                    <a href="#">
                        <i class="fa-solid fa-heart-pulse"></i>
                        <span>Cardiology</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-brain"></i>
                        <span>Neurology</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-regular fa-eye"></i>
                        <span>Ophtalmology</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-heart-pulse"></i>
                        <span>Cardiology</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-solid fa-brain"></i>
                        <span>Neurology</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa-regular fa-eye"></i>
                        <span>Ophtalmology</span>
                    </a>
                </li>
                <div class="back">
                <li>
                    <a href="clinics.php">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Back</span>
                    </a>
                </li>   
            </div>               
            </ul>   
        </div>


        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <span style="color:#0051A1">Doctors of</span>
                    <h2>Cardiology</h2>
                </div>
                <div class="user--info">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="search" id="search">
                    </div>
                </div>
            </div>


        <div class="container">
            <div class="card">
                <div class="card__border">
                    <img src="images/doctorapp.jpg" alt="card image" class="card__img">
                </div>

                <h3 class="card__name">Dr Salem Hachem</h3>
                <span class="card__profession">Cardiology/electrophysiology</span>

                <div class="card__social" id="card-social">
                    <div class="card__social-control">
                        <!-- Toggle button -->
                        <div class="card__social-toggle" id="card-toggle">
                            <i class="ri-add-line"></i>
                        </div>
    
                        <a href="doctorpage.php"><span class="card__social-text">Book Appointment</span></a>
    
                        <!-- Card social -->
                        <ul class="card__social-list">
                            <a href="https://www.facebook.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
    
                            <a href="https://www.instagram.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
    
                            <a href="https://twitter.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card__border">
                    <img src="images/doctorapp.jpg" alt="card image" class="card__img">
                </div>

                <h3 class="card__name">Dr Hassan Hachem</h3>
                <span class="card__profession">Cardiology/electrophysiology</span>

                <div class="card__social" id="card-social">
                    <div class="card__social-control">
                        <!-- Toggle button -->
                        <div class="card__social-toggle" id="card-toggle">
                            <i class="ri-add-line"></i>
                        </div>
    
                        <a href="doctorpage.php"><span class="card__social-text">Book Appointment</span></a>
    
                        <!-- Card social -->
                        <ul class="card__social-list">
                            <a href="https://www.facebook.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
    
                            <a href="https://www.instagram.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
    
                            <a href="https://twitter.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card__border">
                    <img src="images/doctorapp.jpg" alt="card image" class="card__img">
                </div>

                <h3 class="card__name">Dr Salem Hachem</h3>
                <span class="card__profession">Cardiology/electrophysiology</span>

                <div class="card__social" id="card-social">
                    <div class="card__social-control">
                        <!-- Toggle button -->
                        <div class="card__social-toggle" id="card-toggle">
                            <i class="ri-add-line"></i>
                        </div>
                        
                        <a href="doctorpage.php"><span class="card__social-text">Book Appointment</span></a>
    
                        <!-- Card social -->
                        <ul class="card__social-list">
                            <a href="https://www.facebook.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
    
                            <a href="https://www.instagram.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
    
                            <a href="https://twitter.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card__border">
                    <img src="images/doctorapp.jpg" alt="card image" class="card__img">
                </div>

                <h3 class="card__name">Dr Salem Hachem</h3>
                <span class="card__profession">Cardiology/electrophysiology</span>

                <div class="card__social" id="card-social">
                    <div class="card__social-control">
                        <!-- Toggle button -->
                        <div class="card__social-toggle" id="card-toggle">
                            <i class="ri-add-line"></i>
                        </div>
    
                        <a href="doctorpage.php"><span class="card__social-text">Book Appointment</span></a>
    
                        <!-- Card social -->
                        <ul class="card__social-list">
                            <a href="https://www.facebook.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
    
                            <a href="https://www.instagram.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
    
                            <a href="https://twitter.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card__border">
                    <img src="images/doctorapp.jpg" alt="card image" class="card__img">
                </div>

                <h3 class="card__name">Dr Salem Hachem</h3>
                <span class="card__profession">Cardiology/electrophysiology</span>

                <div class="card__social" id="card-social">
                    <div class="card__social-control">
                        <!-- Toggle button -->
                        <div class="card__social-toggle" id="card-toggle">
                            <i class="ri-add-line"></i>
                        </div>
    
                        <a href="doctorpage.php"><span class="card__social-text">Book Appointment</span></a>
    
                        <!-- Card social -->
                        <ul class="card__social-list">
                            <a href="https://www.facebook.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
    
                            <a href="https://www.instagram.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
    
                            <a href="https://twitter.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card__border">
                    <img src="images/doctorapp.jpg" alt="card image" class="card__img">
                </div>

                <h3 class="card__name">Dr Salem Hachem</h3>
                <span class="card__profession">Cardiology/electrophysiology</span>

                <div class="card__social" id="card-social">
                    <div class="card__social-control">
                        <!-- Toggle button -->
                        <div class="card__social-toggle" id="card-toggle">
                            <i class="ri-add-line"></i>
                        </div>
    
                        <a href="doctorpage.php"><span class="card__social-text">Book Appointment</span></a>
    
                        <!-- Card social -->
                        <ul class="card__social-list">
                            <a href="https://www.facebook.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
    
                            <a href="https://www.instagram.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
    
                            <a href="https://twitter.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card__border">
                    <img src="images/doctorapp.jpg" alt="card image" class="card__img">
                </div>

                <h3 class="card__name">Dr Salem Hachem</h3>
                <span class="card__profession">Cardiology/electrophysiology</span>

                <div class="card__social" id="card-social">
                    <div class="card__social-control">
                        <!-- Toggle button -->
                        <div class="card__social-toggle" id="card-toggle">
                            <i class="ri-add-line"></i>
                        </div>
    
                        <a href="doctorpage.php"><span class="card__social-text">Book Appointment</span></a>
    
                        <!-- Card social -->
                        <ul class="card__social-list">
                            <a href="https://www.facebook.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
    
                            <a href="https://www.instagram.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
    
                            <a href="https://twitter.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card__border">
                    <img src="images/doctorapp.jpg" alt="card image" class="card__img">
                </div>

                <h3 class="card__name">Dr Salem Hachem</h3>
                <span class="card__profession">Cardiology/electrophysiology</span>

                <div class="card__social" id="card-social">
                    <div class="card__social-control">
                        <!-- Toggle button -->
                        <div class="card__social-toggle" id="card-toggle">
                            <i class="ri-add-line"></i>
                        </div>
    
                        <a href="doctorpage.php"><span class="card__social-text">Book Appointment</span></a>
    
                        <!-- Card social -->
                        <ul class="card__social-list">
                            <a href="https://www.facebook.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
    
                            <a href="https://www.instagram.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
    
                            <a href="https://twitter.com/" target="_blank" class="card__social-link">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <script>
 var filterInput = document.getElementById('search');
 var cards=document.querySelectorAll('.card');

filterInput.addEventListener('input', function() {
  var filterValue = filterInput.value.toLowerCase();
  cards.forEach(card => {
    cardname=card.querySelector('.card__name').textContent.toLowerCase();
    card.style.display = cardname.includes(filterValue) ? 'block' : 'none';

  });
  }
);
    </script>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/doctor.js"></script>
    </body>
</html>
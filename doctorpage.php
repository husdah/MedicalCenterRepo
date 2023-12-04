 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthHub Doctor Page</title>
    
    <link rel="icon" href="images/favicon.PNG" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/doctorpage.css">
    <link rel="stylesheet" href="assets/css/calendar.css">
 
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Lexend:wght@300&family=Open+Sans:wght@400;500;700&family=Poppins:wght@200;300;400;500&family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900|Source+Sans+Pro:400,600,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!-- Main Content -->
    <div class="content">
        <main>
            <div class="header">
                <div class="left">
                    <div class="photo">
                        <img src="images/doctorrr.png" alt="">
                    </div>
                    <div>
                    <h1>Dr Salem Hachem</h1>
                    <ul class="breadcrumb">
                        <li><a href="#" class="active">Cardiology</a></li>
                        /
                        <li><a href="#" class="active"><i class="bx bxl-facebook-circle"></i></a></li>
                        <li><a href="#" class="active"><i class="bx bxl-instagram"></i></a></li>
                        <li><a href="#" class="active"><i class="bx bxl-linkedin"></i></a></li>
                    </ul>
                </div>
                </div>
                <a href="bookappsinglenew.php" class="report">
                    <i class='bx bx-arrow-back'></i>
                    <span>Back</span>
                </a>
            </div>

            <div class="bottom-data">
                <div class="appBook">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Book Apointment</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>

                    <div class="wrapper">
  
                        <div id="calendar">
                          <div class="header">
                            <div class="overlay">
                              <h1>Make appointment</h1>
                            </div>
                          </div>
                          <div class="monthChange"></div>
                        </div>
                        
                        <div class="inner-wrap">
                        
                          <form id="form">
                            <div class="form-name" id="forfirstname">
                              <input type="text" name="fname" id="fname">
                              <label for="fname">Your first name</label>
                            </div>
                            
                            <div class="form-name" id="forlastname">
                              <input type="text" name="lname" id="lname">
                              <label for="lname">Your last name</label>
                            </div>
<!--                             <div class="form-name"  id="foremail">
                              <input type="email" name="email" id="email">
                              <label for="email">Your email</label>
                            </div>
                            <div class="form-name" id="forphone">
                                <input type="text" name="phnum" id="phnum">
                                <label for="phnum">Your phone number</label>
                              </div> -->
                            
                            <button type="submit" class="request disabled" id="btn">
                              Request appointment <br class="break">
                              <span>on</span>
                              <span class="day"></span>
                              <span>at</span>
                              <span class="time"></span>
                              <div class="sendRequest"></div>
                            </button>
                          </form>
                      
                        </div>
                        
                        <div class='timepicker'>
                          <div class="owl">
                            <div>06:00</div>
                            <div>07:00</div>
                            <div>08:00</div>
                            <div>09:00</div>
                            <div>10:00</div>
                            <div>11:00</div>
                            <div>12:00</div>
                            <div>13:00</div>
                            <div>14:00</div>
                            <div>15:00</div>
                            <div>16:00</div>
                            <div>17:00</div>
                            <div>18:00</div>
                            <div>19:00</div>
                            <div>20:00</div>
                          </div>
                          <div class="fade-l"></div>
                          <div class="fade-r"></div>
                        </div>
                          
                    </div>

                </div>

                <!-- feedbacks -->
                <div class="feedbacks">
                    <div class="header">
                        <i class='bx bx-note'></i>
                        <h3>Feedbacks</h3>
                        <a href="#yourFB"><i class='bx bx-pencil'></i></a>
                    </div>

                    <ul class="task-list">
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-group'></i>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <div class="task-title">
                                <i class='bx bx-group'></i>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi et vitae, velit ratione, quae ipsa voluptas distinctio architecto quidem molestias ea molestiae?</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <div class="task-title">
                                <i class='bx bx-group'></i>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nihil, voluptatibus tempora, aperiam modi commodi fuga voluptate voluptatum, autem alias consequatur pariatur. Quis commodi, quas consequatur facilis quidem distinctio harum esse?</p>
                            </div>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                    
                    <form class="form" id="yourFB">
                        <p class="message">Enter Your Feedback Here. </p>        
                        <label>
                            <textarea class="input" name="description" id="" cols="50" rows="2" placeholder="Write Your Feedback"></textarea>
                        </label>
                    </form>
                </div>
                <!-- End of feedbacks-->

            </div>

        </main>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.2/owl.carousel.min.js"></script>
    <script src="assets/js/calendar.js"></script>
    <script src="assets/js/appointment.js"></script>
    
</body>
</html>
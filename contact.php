
    <?php
        include('includes/header.php');
        include('selectData.php');

    ?>

    <section id="contact-section" class="contact-section">
        <div id="contact-banner" class="contact banner">
            <div class="content banner">
                <h2>Contct Us</h2>
                <ul class="breadcrumb">
                    <li><a href= "home.php">Home</a></li>
                    <li> | </li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        
        <div id="contact-container" class="contact container" >
            <div class="column-left">
                <!-- <form id="form2" class="contact-form" name="cForm" action="https://formsubmit.co/hijazizeinab5@gmail.com" method="POST"> -->
                <form id="contactForm" class="contact-form" name="cForm" method="POST">
                    <h2>Contact Us</h2>
                    <h3>please feel free to contact us any time. we will get back to you as soon as possible.</h3>
                    <div class="input-control">
                        <div class="full-width">
                            <div class="half-width">
                                <input type="text" id="fname" name="fname" placeholder="First Name">
                                <div id="fname-error" class="error"></div>
                            </div>
                            <div class="half-width">
                                <input type="text" id="lname" name="lname" placeholder="Last Name">
                                <div id="lname-error" class="error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="input-control">
                        <input type="text" id="email" name="email" placeholder="Email" class="fw">
                        <div id="email-error" class="error"></div>
                    </div>
                    <div class="input-control">
                        <input type="text" id="subject" name="subject" placeholder="Subject" class="fw">
                        <div id="subject-error" class="error"></div>
                    </div>
                    <div class="input-control">
                        <textarea cols="50" rows="5" id="message" name="message" placeholder="Message"></textarea>
                        <div id="message-error" class="error"></div>
                    </div>
                    <!-- <input type="hidden" name="_template" value="box"></input>
                    <input type="hidden" name="_next" value="https://yourdomain.co/thanks.html">-->
                    <button type="button" id="sendEmail"  class="contact-btn" name="btn-send" > Send </button>
                </form>
            </div>
            <div class="column-right">
                <div class="get-in-touch">
                    <h3>get in touch</h3>
                    <span><i class="fa-solid fa-location-dot"></i><a href="https://www.google.com/maps/place/Beyrouth/@33.8892114,35.4630826,13z/data=!3m1!4b1!4m6!3m5!1s0x151f17215880a78f:0x729182bae99836b4!8m2!3d33.8937913!4d35.5017767!16zL20vMDlianY?entry=ttu" target="_blank">Beirut, Lebanon</a></span></br>
                    <span><i class="fa-solid fa-phone"></i><a href="tel:0096178960304">+ 961 78960304</a></span></br>
                    <span><i class="fa-regular fa-envelope"></i><a href="mailto:hijazizeinab5@gmail.com">hijazizeinab97@gmail.com</a></span></br>
                </div>
            </div>
        </div>    
    </section>

    <section class="contact-map">
        <div class="map-container">
            <iframe class= "map" src="https://www.google.com/maps/embed?pb=!3m1!4b1!4m6!3m5!1s0x151f17215880a78f:0x729182bae99836b4!8m2!3d33.8937913!4d35.5017767!16zL20vMDlianY" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

   
    <?php
        include('includes/footer.php');
    ?>
<?php
    include('includes/header.php');
?>

  <main>
      <div class="header">
          <div class="left">
              <h1>Admin Settings</h1>
              <ul class="breadcrumb">
                  <li id="viewMode"><a href="#">
                          View
                      </a></li>
                      /
                  <li id="changeMode"><a href="#" class="active">Update</a></li>
              </ul>
          </div>
      </div>

      <section class="forms-section">
          <h1 class="section-title">Login Information</h1>
          <div class="forms">
            <div id="viewWrapper" class="form-wrapper is-active">
              <button type="button" class="switcher switcher-login">
                View
                <span class="underline"></span>
              </button>
              <form class="animated-form form-login">
                <fieldset>
                  <legend>Please, enter your email and password for login.</legend>
                  <div class="input-block">
                    <label for="login-name">Name</label>
                    <!-- <input id="login-name" type="text" required disabled> -->
                    <div class="input-field"> 
                      <i class="bx bx-user"></i> 
                      <input id="login-name" type="text" placeholder="name" required disabled>
                    </div>
                  </div>
                  <div class="input-block">
                    <label for="login-email">Email</label>
                    <!-- <input id="login-email" type="email" required disabled> -->
                    <div class="input-field"> 
                      <i class="bx bx-envelope"></i> 
                      <input id="login-email" type="email" placeholder="email" required disabled>
                    </div>
                  </div>
                  <div class="input-block">
                      <label for="login-password">Password</label>
                      <!-- <input id="login-password" type="password" required disabled> -->
                      <div class="input-field"> 
                        <i class="bx bx-lock"></i> 
                        <input id="login-password" type="password" placeholder="password" required disabled>
                      </div>
                  </div>
                </fieldset>
                <!-- <button type="submit" class="btn-login">Login</button> -->
              </form>
            </div>
            <div id="changeWrapper" class="form-wrapper">
              <button type="button" class="switcher switcher-signup">
                Change
                <span class="underline"></span>
              </button>
              <form class="animated-form form-signup" id="adminForm">
                <fieldset>
                  <legend>Please, enter your email, password and password confirmation for sign up.</legend>
                  <div class="input-block">
                      <label for="signup-name">Name</label>
                      <!-- <input id="signup-name" type="text" required> -->
                      <div class="input-field"> 
                        <i class="bx bx-user"></i> 
                        <input id="signup-name" name="signup-name" type="text" placeholder="name" required>
                        <span class="Name" id="signup-nameError">SignUp Name</span>
                      </div>
                    </div>
                  <div class="input-block">
                    <label for="signup-email">E-mail</label>
                    <!-- <input id="signup-email" type="email" required> -->
                    <div class="input-field"> 
                      <i class="bx bx-envelope"></i> 
                      <input id="signup-email" name="signup-email" type="email" placeholder="email" required>
                      <span id="signup-emailError">SignUp Email</span>
                    </div>
                  </div>
                  <div class="input-block">
                    <label for="signup-password">Password</label>
                    <!-- <input id="signup-password" type="password" required> -->
                    <div class="input-field"> 
                      <i class="bx bx-lock"></i> 
                      <input id="signup-password" name="signup-password" type="password" placeholder="password" required>
                      <span id="signup-passwordError">SignUp Password</span>
                    </div>
                  </div>
                  <div class="input-block">
                    <label for="signup-password-confirm">Confirm password</label>
                    <!-- <input id="signup-password-confirm" type="password" required> -->
                    <div class="input-field"> 
                      <i class="bx bx-lock"></i> 
                      <input id="signup-passwordConfirm" name="signup-passwordConfirm" type="password" placeholder="password" required>
                      <span id="signup-passwordConfirmError">Confirm Password</span>
                    </div>
                  </div>
                </fieldset>
                <button id="adminFormBtn" type="button" class="btn-signup">Save</button>
              </form>
            </div>
          </div>
        </section>

  </main>

<?php
  include('includes/footer.php');
?>
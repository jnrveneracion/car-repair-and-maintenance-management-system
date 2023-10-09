
<style>
     #navbar-section {
          background-color: color(srgb 0.0472 0.1883 0.2773);
     }

     .navbar-toggler-icon {
          filter: invert(1);
     }

     .nav-link {
          color: white;
          text-transform: uppercase;
     }

     .nav-item {
          display: flex;
          justify-content: center;
     }

     .nav-link:hover {
          color: rgb(226, 226, 226);
     }

     .nav-link.yellow-btn {
          background-color: color(srgb 0.9702 0.7395 0.3452);
          margin: 4px 5px;
          border-radius: 20px;
          width: 120px;
     }

     .navbar-nav,
     .navbar-brand,
     .navbar-toggler {
          margin: 0px 30px;
     }

     .welcome-txt {
          color: color(srgb 0.9702 0.7395 0.3452);
          text-transform: uppercase;
          margin: 0px 30px;
     }

     #options {
          display: grid;
     }

     .card.card-body {
          border-radius: 0px;
          border: 3px solid black;
     }

     .user-menu {
          text-decoration: none;
          color: white;
          background-color: color(srgb 0.2706 0.7121 0.9729);
          padding: 6px 20px;
          margin: 2px 0px;
     }

     .logout-btn {
          color: color(srgb 0.2706 0.7121 0.9729);
          text-decoration: none;
          background-color: black;
          border-radius: 20px;
          padding: 5px 10px;
          margin-top: 15px !important;
          width: 100px;
          margin: 0 auto;
     }

     .user-menu:hover, .logout-btn:hover {
          color: gray;
     }

 
</style>

<div style="width: 100%; position: sticky; top: 0; z-index: 10;">
     <nav class="navbar navbar-expand-lg bg-body-tertiary p-0">
          <div class="container-fluid d-flex justify-content-between" id="navbar-section">
               <a class="navbar-brand" href="#"><img src="Assets/navbar-logo.png" width="250" alt=""></a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-end text-center" id="navbarNav">
                    <ul class="navbar-nav align-items-center">
                         <li class="nav-item">
                              <a class="nav-link" aria-current="page" href="index.php">Home</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="about-us.php">About Us</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="services.php">Services</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="contact.php">Contact</a>
                         </li>

                         <?php
                              //session_start(); // Start the session | hindi kailangan
                               include('connection.php'); //Kailangan tong connection

                              if (isset($_SESSION['fullname'])) {
                              // If the 'fullname' session variable is set, display a welcome message
                              echo '
                                   <div class="user-menu-btn">
                                   <a class="btn" data-bs-toggle="collapse" href="#menu" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <h6 class="welcome-txt"> Welcome! ' . $_SESSION['fullname'] . '</h6>
                                   </a>
                                   <div class="collapse collapse position-absolute" id="menu">
                                        <div class="card card-body">
                                             <div id="options" class="">
                                                  <a class="user-menu" href="Client/Service_Request_Form.php">Service Request</a>
                                                  <a class="user-menu" href="Client/Service_History.php">My Service Request</a>
                                                  <a class="user-menu" href="Client/view-message.php">My Messages</a>
                                                  <a class="user-menu" href="Client/my-account.php">My Account</a> 
                                                  <a class="logout-btn" href="Client/Logout.php">Logout</a> 
                                             </div>
                                        </div>
                                   </div>
                                   </div>';

                              } else {
                              // If the 'fullname' session variable is not set, display "Sign In" and "Register" links
                              echo '<li class="nav-item">
                                        <a class="nav-link yellow-btn" href="Client/Login.php">Sign In</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link yellow-btn" href="Client/Client_Register.php">Register</a>
                                        </li>';
                              }
                         ?>
                    </ul>
               </div>
          </div>
     </nav>
</div>
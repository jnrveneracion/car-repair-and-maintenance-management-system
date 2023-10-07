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
</style>
<div style="width: 100%; position: sticky; top: 0;">
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
                         <li class="nav-item">
                              <a class="nav-link yellow-btn" href="login.php">Sign In</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link yellow-btn" href="register.php">Register</a>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
</div>
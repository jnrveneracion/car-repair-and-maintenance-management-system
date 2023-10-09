<?php
include('../connection.php');


 
        echo '<h2>View Client Message</h2>';
        echo '<h3>Client Message</h3>';

        echo '<table class="table">';
        echo '<tbody>';

    
        echo '<tr>';
        echo '<th scope="row">Message ID</th>';
  
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Full Name</th>';
   
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Email</th>';
    
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Subject</th>';
   
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Message Date</th>';
    
        echo '</tr>';

        echo '<tr>';
        echo '<th scope="row">Message</th>';

        echo '</tr>';

        echo '</tbody>';
        echo '</table>';

        // The Service Cost Form is here
        echo '<form method="POST" action="">';
       
    

        echo '<div class="mb-3">';
        echo '<label for="comment" class="form-label">Admin Response</label>';
        echo '<input type="text" class="form-control" id="comment" name="comment" required>';
        echo '</div>';

        

        echo '<button type="submit" class="btn btn-primary">Submit</button>';

        echo '</form>';
        // Forms end here



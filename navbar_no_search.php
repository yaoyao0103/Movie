<?php

   session_start();
   $username = $_SESSION['username'];
   $isAdmin = $_SESSION['isAdmin'];

   $front = '<nav class="navbar navbar-expand-lg navbar-dark  bg-dark justify-content-between">
   <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Movie</a>

      <div>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">';

      $mid = "";
      if($username){
         if($isAdmin){
            $mid = '<ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" href="logout.php">Logout</a>
            </li>
         </ul>';
         }
         else{
            $mid = '<ul class="navbar-nav ml-auto">
            <li class="nav-item">
               <a class="nav-link" href="logout.php">Logout</a>
            </li>
         </ul>';
         }
      }
      else{
         $mid = '<ul class="navbar-nav ml-auto">
         <li class="nav-item">
            <a class="nav-link" href="register.php">Sign Up</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="login.php">Sign In</a>
         </li>
      </ul>';
      }
      $tail = '</div>
      </div>
   </div>
</nav>';

      echo $front . $mid . $tail;
?>  
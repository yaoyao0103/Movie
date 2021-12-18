<nav class="navbar navbar-expand-lg navbar-dark  bg-dark justify-content-between">
            <div class="container-fluid">
               <a class="navbar-brand" href="index.php">Movie</a>

               <div>
                  <form class="form-inline justify-content-center navbar-form" target="_self">
                     <div class="input-group input-group-search mx-auto">
                        <div class="input-group-prepend">
                           <button id="search-btn" class="btn btn-outline-light  dropdown-toggle" type="button" value="Name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Name</button>
                           <div id="search-dropdown" class="dropdown-menu">
                              <a class="dropdown-item" href="#" onclick="setValue('Name')">Name</a>
                              <a class="dropdown-item" href="#" onclick="setValue('Director')">Director</a>
                              <a class="dropdown-item" href="#" onclick="setValue('Cast')">Cast</a>
                              <a class="dropdown-item" href="#" onclick="setValue('Year')">Year</a>
                           </div>
                        </div>
                        <input type="text" name="category" value="Name" id = "search-category">
                        <input class="form-control search-field" placeholder="Search..." type="search" name="keyword" id="search-field" aria-describedby="search-button-addon">
                        <div class="input-group-append">
                           <button class="btn btn-outline-light" type="submit" id="search-button-addon">&#128269;</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                           <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </nav>
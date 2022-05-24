 <link href="<?= URL ?>public/CSS/" rel="stylesheet" type="text/css" />
 <?php if(!empty($page_css)) : ?>
 <?php foreach($page_css as $fichier_css) : ?>
 <link href="<?= URL ?>public/CSS/<?= $fichier_css ?>" rel="stylesheet" type="text/css" />
 <?php endforeach; ?>
 <?php endif; ?>


 <div class=" container-fluid p-0" style="height: 100vh">
       <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel"
             style="height: 100%; position: absolute; z-index: -2;">
             <div class="carousel-inner h-100">
                   <div class="carousel-item active" data-bs-interval="4000">
                         <img src="public/Assets/images/vr.jpg" class="d-block w-100" alt="..."
                               style="object-fit: cover; width: 1920px; height: 1300px; background-position: center; filter: blur(8px);">
                   </div>

                   <div class="carousel-item" data-bs-interval="4000">
                         <img src="public/Assets/images/playstation.jpg" class="d-block w-100" alt="..."
                               style="object-fit: cover; width: 1920px; height: 1300px; background-position: center; filter: blur(8px);">
                   </div>

                   <div class="carousel-item" data-bs-interval="4000">
                         <img src="public/Assets/images/pc setup.jpg" class="d-block w-100" alt="..."
                               style="object-fit: cover; width: 1920px; height: 1300px; background-position: center; filter: blur(8px);">
                   </div>
             </div>
       </div>

       <div class="container p-5 d-flex align-items-center h-100">
             <div class="row">
                   <div class="col-12">
                         <h1 class="text-center fs-1">PLAY AND WIN CRYPTO</h1>
                         <p class="text-center fs-5">Win crypto by playing your favorite games, on your favorite
                               platform by betting against other players</p>
                   </div>

                   <div class="col-12 text-center">
                         <img src="public/Assets/images/logo.png" class="img-fluid mt-5 mb-5" style="max-height: 300px;"
                               alt="Responsive image">
                   </div>

                   <div class="col-12 text-center">
                         <button class="btn btn-outline-dark rounded-pill btn-lg">Subscribe now</button>
                   </div>
             </div>
       </div>
 </div>


 </header>

 <!--Party-->
 <div class="container-fluid d-flex align-items-center " style="min-height: 700px">
       <div class="container">
             <div class="row d-flex flex-row justify-content-xl-between justify-content-center align-items-center p-5">

                   <div class="col-xl-6 d-flex flex-column">
                         <h2 class="text-center fs-1 text-xl-start">PARTY</h2>
                         <p class="text-center fs-5 text-xl-start">Are you still planning of
                               playing
                               your game for nothing ?<br>
                               <br>
                               Why don't you use some of your skills to earn some crypto while playing your
                               favorite video game ? Seem like a good deal
                         </p>
                         <button class="btn btn-outline-dark align-self-center rounded-pill btn-lg">Check available
                               parties</button>
                   </div>

                   <div class="col-xl-5 text-center">
                         <img src="public/Assets/images/controller cartoon.png" class="img-fluid mt-5 mb-5"
                               style="max-height: 400px;" alt="Responsive image">
                   </div>

             </div>
       </div>
 </div>
 <!--Trending-->
 <div class="container-fluid d-flex align-items-center bg-light" style="min-height: 700px">
       <div class="container">
             <div
                   class="row d-flex flex-xl-row-reverse justify-content-xl-between justify-content-center align-items-center p-5">

                   <div class="col-xl-6 d-flex flex-column">
                         <h2 class="text-center fs-1 text-xl-start">TRENDINGS</h2>
                         <p class="text-center fs-5 text-xl-start">
                               Do you want get special price while playing your favorite game too ?<br>
                               <br>
                               If so, challenge everyone to be the number one on the scoreboard at the end of
                               the
                               month
                         </p>
                         <button class="btn btn-outline-dark align-self-center rounded-pill btn-lg">Check others
                               profile</button>
                   </div>

                   <div class="col-xl-5 text-center">
                         <img src="public/Assets/images/heart cartoon.png" class="img-fluid mt-5 mb-5"
                               style="max-height: 400px;" alt="Responsive image">
                   </div>

             </div>
       </div>
 </div>

 <!--About Us-->
 <div class="container-fluid d-flex align-items-center " style="min-height: 700px">
       <div class="container">
             <div class="row d-flex flex-row justify-content-xl-between justify-content-center align-items-center p-5">

                   <div class="col-xl-6 d-flex flex-column">
                         <h2 class="text-center fs-1 text-xl-start  fs-1">ABOUT US</h2>
                         <p class="text-center fs-5 text-xl-start">Are you still planning of
                               playing
                               your game for nothing ?<br>
                               <br>
                               If so, you can find out who we are, what motivated us to create this site, our
                               goals
                               and for what we stand for
                         </p>
                         <button class="btn btn-outline-dark align-self-center rounded-pill btn-lg">Check who
                               we're</button>
                   </div>

                   <div class="col-xl-5 text-center">
                         <img src="public/Assets/images/information cartoon.png" class="img-fluid mt-5 mb-5"
                               style="max-height: 400px;" alt="Responsive image">
                   </div>

             </div>
       </div>
 </div>
 <!--CTA-->
 <div class="container-fluid d-flex align-items-center bg-light ">
       <div class="container">
             <div class="row d-flex justify-content-center p-5" bg-light>

                   <div class="col-12">
                         <h1 class="text-center fs-1">A PLACE TO SAFELY BET ON YOUR FAVORITE GAMES
                         </h1>
                         <p class="text-center fs-5">Here you can try earning some crypto by
                               betting
                               and playing your favorite game against poeple like you</p>
                   </div>

                   <div class="col-12 text-center">
                         <img src="public/Assets/images/bitcoin cartoon.png" class="img-fluid mt-5 mb-5"
                               style="max-height: 400px;" alt="Responsive image" style="width:400px" ;>
                   </div>

                   <div class="col-12 text-center">
                         <button class="btn btn-outline-danger rounded-pill btn-lg">Subscribe now</button>
                   </div>

             </div>
       </div>
 </div>
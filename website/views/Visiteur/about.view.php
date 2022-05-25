<link href="<?= URL ?>public/CSS/" rel="stylesheet" type="text/css" />
 <?php if(!empty($page_css)) : ?>
 <?php foreach($page_css as $fichier_css) : ?>
 <link href="<?= URL ?>public/CSS/<?= $fichier_css ?>" rel="stylesheet" type="text/css" />
 <?php endforeach; ?>
 <?php endif; ?>





 <div class="container-fluid d-flex align-items-center " style="min-height: 700px">
       <div class="container">
             <div class="row d-flex flex-row justify-content-xl-between justify-content-center align-items-center p-5">

                   <div class="col-xl-6 d-flex flex-column">
                         <h2 class="text-center fs-1 text-xl-start">Who are we</h2>
                         <p class="text-center fs-5 text-xl-start">
                             We're a group of friends from a IT school situated in Paris who've decided to create a website
                             about their favorite pasion: crypto and gaming
                         </p>
                        
                   </div>

                   <div class="col-xl-5 text-center">
                         <img src="public/Assets/images/virtuel.png" class="img-fluid mt-5 mb-5"
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
                        <h2 class="text-center fs-1 text-xl-start">What we defend</h2>
                        <p class="text-center fs-5 text-xl-start">
                            We defend the right for poeple to play and earn as much as they want until they act 
                            in a inapropriate manner toward another person of our community
                            
                         </p>
                   </div>

                   <div class="col-xl-5 text-center">
                         <img src="public/Assets/images/family.png" class="img-fluid mt-5 mb-5"
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
                         <h2 class="text-center fs-1 text-xl-start  fs-1">Our future</h2>
                         <p class="text-center fs-5 text-xl-start">
                              First and foremost, we want to create a place where everyone can have fun
                              and bet safely. Our next objective will be to be able to support more games
                              to let more poeple enjoy the joy of betting
                         </p>
                   </div>

                   <div class="col-xl-5 text-center">
                         <img src="public/Assets/images/ps5-controller.png" class="img-fluid mt-5 mb-5"
                               style="max-height: 400px;" alt="Responsive image">
                   </div>

             </div>
       </div>
 </div>

<?php require APPROOT . '/views/inc/header1.php'; ?>
    <div class="alert alert-success  top-success  py-2 " role="alert"> <strong>Your order has been submitted. We will contact you shortly!</strong> </div>
    <!-- Masthead -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 ">
                    <h1 class="text-uppercase text-white font-weight-bold">Estimate cleaning price</h1>
                    <!--                        Beginnging calculator              -->
                    <div class="col-xs-12 col-sm-12  col-md-10 col-lg-10 my-0 mx-auto text-left  top_order mb-4">
                        <!--     BEGINNING    BEDROOMS  SLIDER-->
                        <div class="row mb-3 justify-content-center slider-xs-alighment">
                            <div class="col col-lg-12 col-sm-12 col-xs-12 lable_bdrm mx-3 my-3">How many bedrooms :</div>
                            <div class=" col col-lg-12 col-sm-12 col-xs-12">
                                <output class="output" id="output1" style="display: inline-block ">Studio</output>
                                <input type="range" value="0" step="1" min="0" max="5" cnt="0" id="room"> </div>
                            <!--                                <span class="help_msg px-5">*please move scroll</span> --></div>
                        <!--               END BEDROOMS SLIDER-->
                        <!--     BEGINNING    RESTROOMS  SLIDER-->
                        <div class="row justify-content-center slider-xs-alighment">
                            <div class="col col-lg-12 col-sm-12 col-xs-12 lable_rstrm mx-3 mt-0 ">How many restrooms :</div>
                            <div class=" col col-lg-12 col-sm-12 col-xs-12">
                                <output class="output" id="output2" style="display: inline-block;margin-top:-7px;">0</output>
                                <input type="range" value="0" step="1" min="0" max="5" cnt="0" id="restroom"> </div>
                            <!--                                 <span class="help_msg px-5">*please move scroll</span> --></div>
                        <!--               END RESTROOMS SLIDER-->
                        <!--               BEGIN HOW MANY TIMES -->
                        <div class="row align-items-center justify-content-center text-center my-2 containerBtnTimes py-4">
                            <div class="btn-group px-3 containBtn" role="group">
                                <button type="button" id="freq2" class="btn btn-default btnTimes active" value="10">One time service </button>
                                <!--                            <label>OFF 20%</label>-->
                            </div>
                            <div class="btn-group px-3 containBtn" role="group">
                                <button type="button" id="freq3" class="btn btn-default btnTimes" value="20">Every 2 weeks </button>
                                <!--                            <label>OFF 30%</label>-->
                            </div>
                            <div class="btn-group px-3 containBtn" role="group">
                                <button type="button" id="freq4" class="btn btn-default btnTimes" value="30">Every week service</button>
                                <!--                            <label>OFF 40%</label>-->
                            </div>
                        </div>
                        <!--        </div>-->
                        <!--               END HOW MANY TIMES -->
                    </div>
                    <!--                   End calculator                          -->
                    <div class="col-lg-12 mt-5">
                        <!-- <p class="text-white-75 font-weight-light mb-5">Start Bootstrap can help you build better websites using the Bootstrap framework! Just download a theme and start customizing, no strings attached!</p>  --><a class="btn btn-primary btn-xl js-scroll-trigger" href="#about" id="mainBTN">Order Now<span id="price"> </span></a>
                        <!--                    <button type="button" id="mainBTN" class="btn book_btn">BOOK NOW <span id="price"> </span></button>-->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- About Section -->
    <section class="page-section bg-primary no-padding-bottom" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Additional services:</h2>
                    <hr class="divider light my-1"> </div>
                <!-- Beginning order form -->
                <div class="form__container col-lg-12 ">
                    <form action="<?php echo URLROOT; ?>/orders1/add" method="post" class="ajax">
                        <!--                   adding extra buttons   -->
                        <div class="row justify-content-md-center">
                            <div class="col-md-12 col-lg-9">
                                <div class="form-row d-flex justify-content-between  mb-5">
                                    <button name="windows" type="button" class="toggle " value="" data-name="Windows cleaning" data-state="0" data-price="25"><img src="<?php echo URLROOT; ?>/public/img/extraButtonIcons/01s.png" alt="Windows cleaning" class="extra_option" /> <span>Windows cleaning + $25</span> </button>
                                    <button name="refregirator" type="button" class="toggle " value="" data-name="Refregirator inside" data-state="0" data-price="20"><img src="<?php echo URLROOT; ?>/public/img/extraButtonIcons/refrigerator.svg" alt="Regregirator cleaning" class="extra_option"><span>Refregirator cleaning + $20</span></button>
                                    <button name="oven" type="button" class="toggle " value="" data-price="25" data-name="Oven cleaning" data-state="0"><img src="<?php echo URLROOT; ?>/public/img/extraButtonIcons/oven.svg" alt="oven cleaning" class="extra_option"><span>Oven cleaning + $25</span></button>
                                    <button name="moveIn" type="button" class="toggle " value="" data-name="MoveIn/Out" data-state="0" data-price="25"><img src="<?php echo URLROOT; ?>/public/img/extraButtonIcons/movein.svg" alt="oven cleaning" class="extra_option"> <span>MoveIn/Out cleanig + $25</span></button>
                                    <!--                                   <button name="heavy" type="button" class="toggle " value="" data-name="Heavy conditions" data-state="0" data-price="40"><img src="<?php echo URLROOT; ?>/public/img/extraButtonIcons/loads.svg" alt="heavy conditions" class="extra_option"> <span>Heavy conditions + $40</span></button>-->
                                    <button name="green" type="button" class="toggle " value="" data-name="Green cleaning" data-state="0" data-price="40"><img src="<?php echo URLROOT; ?>/public/img/extraButtonIcons/green.svg" alt="oven cleaning" class="extra_option"> <span>Green cleaning + $40</span></button>
                                </div>
                                <!--                   end extra buttons-->
                                <div class="mt-5 ">
                                    <div class="form-row justify-content-between mt-3" id="personal">
                                        <div class="form-group col-md-6 input-group no-ml-sm"> <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input id="firstName" type="text" class="form-control " name="firstName" placeholder="First name" required> </div>
                                        <div class="form-group col-md-6 input-group no-ml-sm"> <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            <input id="lastName" type="text" class="form-control" name="lastName" placeholder="Last name" required> </div>
                                    </div>
                                    <div class="form-row justify-content-between mb-2">
                                        <div class="form-group col-md-6 input-group"> <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" required> </div>
                                        <div class="form-group col-md-6 input-group"> <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            <input id="phone" type="number" class="form-control" name="phone" placeholder="Phone number" required> </div>
                                    </div>
                                    <div class="form-row justify-content-around mb-2">
                                        <div class="form-group col-md-6 input-group"> <span class="input-group-text"><i class="fas fa-home"></i></span>
                                            <input id="street" type="test" class="form-control" name="street" placeholder="1234 Main St" required> </div>
                                        <div class="form-group col-md-4 input-group"> <span class="input-group-text"><i class="fas fa-city"></i></span>
                                            <input id="city" type="text" class="form-control" name="city" placeholder="Your city"> </div>
                                        <div class="form-group col-md-2 input-group"> <span class="input-group-text">zip</span>
                                            <input id="zip" type="number" class="form-control" name="zip" placeholder="code"> </div>
                                    </div>
                                    <div class="form-row justify-content-between ">
                                        <div class='form-group col-sm-6 input-group'> <span class="input-group-text"><i class="fas fa-calendar-day"></i> </span>
                                            <input type='date' class="form-control" name="date" placeholder="mm/dd/yy" min="" required> </div>
                                        <div class='form-group col-sm-6 input-group'> <span class="input-group-text"><i class="far fa-clock"></i> </span>
                                            <input type='time' class="form-control" name="time" value="12:00" placeholder="pick a time" required> </div>
                                    </div>
                                    <div class="form-row justify-content-between">
                                        <div class='form-group col-sm-12 justify-content-center input-group'>
                                            <button type="submit" name="submit" class="btn btn-primary  btn-light btn-xl" id="target">Submit your order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-3">
                                <!--                    subtotal-->
                                <div class="row stickyPrice">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row ">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <p class=" textFinalOrder"><img src="<?php echo URLROOT; ?>/public/img/extraButtonIcons/bedroom.png" alt="Rooms" class="imgFinalOrder" /> <span> : </span> <strong>
                                                    <input name="room" id="detRoom" class="inputNoBorder" readonly /></strong> </p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <p class="textFinalOrder"><img src="<?php echo URLROOT; ?>/public/img/extraButtonIcons/restroom.png" alt="Restroom" class="imgFinalOrder" /> <span> : </span> <strong>  <input name="restroom" id="detRroom" class="inputNoBorder" readonly /></strong> </p>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 c">
                                                <p><strong>
                                                    <input name="often" class="inputNoBorder" id="detTimes" value="One time cleaning" /></strong> </p>
                                            </div>
                                            <div class="col-md-12">
                                                <div id="addService" class=" w-100"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 position-absolute bottom-0 endPrice">
                                        <!--                                       <i class="fas fa-dollar-sign "></i>-->
                                        <input class="inputNoBorder" name="price" id="sum" />
                                        <p class="text-center " id="total"> </p>
                                    </div>
                                </div>
                                <!--                   end subtotal-->
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End order form  -->
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">Why us</h2>
            <hr class="divider my-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5"> <i class="far fa-4x fa-clock text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Always on time</h3>
                        <p class="text-muted mb-0">99.9% of time, we are 5 minutes before appointment time!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5"> <i class=" fa-4x fas fa-tachometer-alt text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Fast service</h3>
                        <p class="text-muted mb-0">We are time based company.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5"> <i class="fas fa-4x  fa-user-shield text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Reliable</h3>
                        <p class="text-muted mb-0">You can trust us eather you'r home or not!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5"> <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Made with Love</h3>
                        <p class="text-muted mb-0">We love what we do!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Section -->
    <section id="portfolio">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-6"> <a class="portfolio-box" href="<?php echo URLROOT; ?>/public/img/portfolio/fullsize/1.jpg"> <img class="img-fluid" src="<?php echo URLROOT; ?>/public/img/portfolio/thumbnails/1.jpg" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50"> Bathroom</div>
                            <div class="project-name"> House in DelMar</div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-sm-6"> <a class="portfolio-box" href="<?php echo URLROOT; ?>/public/img/portfolio/fullsize/2.jpg"> <img class="img-fluid" src="<?php echo URLROOT; ?>/public/img/portfolio/thumbnails/2.jpg" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50"> Bathroom</div>
                            <div class="project-name"> House in Miramesa </div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-sm-6"> <a class="portfolio-box" href="<?php echo URLROOT; ?>/public/img/portfolio/fullsize/3.jpg"> <img class="img-fluid" src="<?php echo URLROOT; ?>/public/img/portfolio/thumbnails/3.jpg" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50"> Living Room</div>
                            <div class="project-name"> House in Miramesa </div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-sm-6"> <a class="portfolio-box" href="<?php echo URLROOT; ?>/public/img/portfolio/fullsize/4.jpg"> <img class="img-fluid" src="<?php echo URLROOT; ?>/public/img/portfolio/thumbnails/4.jpg" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">  Bathroom</div>
                            <div class="project-name"> House in San Diego</div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-sm-6"> <a class="portfolio-box" href="<?php echo URLROOT; ?>/public/img/portfolio/fullsize/5.jpg"> <img class="img-fluid" src="<?php echo URLROOT; ?>/public/img/portfolio/thumbnails/5.jpg" alt="">
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Kitchen</div>
                            <div class="project-name"> House in La Jolla</div>
                        </div>
                    </a> </div>
                <div class="col-lg-4 col-sm-6"> <a class="portfolio-box" href="<?php echo URLROOT; ?>/public/img/portfolio/fullsize/6.jpg"> <img class="img-fluid" src="<?php echo URLROOT; ?>/public/img/portfolio/thumbnails/6.jpg" alt="">
                        <div class="portfolio-box-caption p-3">
                            <div class="project-category text-white-50"> Living Room</div>
                            <div class="project-name"> House in San Diego </div>
                        </div>
                    </a> </div>
            </div>
        </div>
    </section>
    <!-- Call to Action Section -->
    <section class="page-section bg-dark text-white">
        <div class="container text-center">
            <h2 class="mb-4">
               <?php if($_SESSION['user_id'] ==''): ?>
               <a href="<?php echo URLROOT;?>/users/register">Register now and get $10 OFF at the checkout.</a>
               <p class="or">or</p>
               <p><a href="<?php echo URLROOT;?>/users/login">Login</a> to partisipate in monthly promotions</p> 

               <?php else : ?>
                       <?php if($_SESSION['user_earn']>0): ?>
                           <p>You have $<?php echo $_SESSION['user_earn']; ?> credit that you can spend before nov 10</p>
                       <?php else :?>
                           <p>You have $<?php echo $_SESSION['user_earn']; ?> available credit.<a class="js-scroll-trigger" href="#page-top"> Order now</a> and earn double credit this month only.</p>
                       <?php endif;?>
               
               <?php endif; ?>
               
              </h2> </div>
    </section>
    <!-- Contact Section -->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="mt-0">Let's Get In Touch!</h2>
                    <hr class="divider my-4">
                    <p class="text-muted mb-5">Ready to feel not obligated to clean every week? Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center"> <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                    <div>+1 (619) 335-9880</div>
                </div>
                <div class="col-lg-4 mr-auto text-center"> <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                    <!-- Make sure to change the email address in anchor text AND the link below! --><a class="d-block" href="mailto:contact@yourwebsite.com">booking@cleanupmyhouse.com</a> </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="small text-center text-muted">Copyright &copy; 2019 - Clean Up My House</div>
        </div>
    </footer>
    <?php require APPROOT . '/views/inc/footer1.php'; ?>
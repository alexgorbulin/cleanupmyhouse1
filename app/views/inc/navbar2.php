<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 navbar-stick-forewer" id="">
    <div class="container">
        <a class="navbar-brand navbar-stick-forewer-link" href="<?php echo URLROOT; ?>/pages/newPage#page-top">
            <?php echo SITENAME; ?>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav  my-2 my-lg-0">
                <li class="nav-item"> <a class="nav-link navbar-stick-forewer-link" href="<?php echo URLROOT; ?>/pages/newPage#about">Order now</a> </li>
                <li class="nav-item"> <a class="nav-link navbar-stick-forewer-link" href="<?php echo URLROOT; ?>/pages/newPage#services">Why us</a> </li>
                <li class="nav-item"> <a class="nav-link navbar-stick-forewer-link" href="<?php echo URLROOT; ?>/pages/newPage#portfolio">Our work</a> </li>
                <li class="nav-item"> <a class="nav-link navbar-stick-forewer-link" href="<?php echo URLROOT; ?>/pages/newPage#contact">Contact</a> </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navbar-stick-forewer-link login" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['user_name'];?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="<?php echo URLROOT; ?>/orders1/myOrders">My orders</a> <a class="dropdown-item" href="#">Change my order</a> <a class="dropdown-item" href="#">Total Shiny's
                           <?php foreach($data['shiny'] as $shiny) : ?>
                            <?php echo $shiny->totalShiny; ?>
                                <?php endforeach; ?></a> <a class="nav-link logout" href="<?php echo URLROOT; ?>/users/logout"><i class="fas fa-sign-out-alt"></i> Logout</a> </div>
                    </li>
                    <?php else : ?>
                        <li class="nav-item"> <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a> </li>
                        <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="#">
            <?php echo SITENAME; ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!--pages/.... -ITS CONTROLLERS function-->
                <li class="nav-item active"> <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a> </li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a> </li>
                <!--pages/.... -ITS CONTROLLERS function-->
                <li class="nav-item"> <a class="nav-link" href="<?php echo URLROOT; ?>/orders/submitOrder">Submit order</a> </li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo URLROOT; ?>/pages/newPage">New Page</a> </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['user_name'];?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="<?php echo URLROOT; ?>/orders/myOrders">My orders</a> <a class="dropdown-item" href="#">Change my order</a> <a class="dropdown-item" href="#">Total Shiny's
                           <?php foreach($data['shiny'] as $shiny) : ?>
                            <?php echo $shiny->totalShiny; ?>
                                <?php endforeach; ?></a> </div>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout"><i class="fas fa-sign-out-alt"></i> Logout</a> </li>
                    <?php else : ?>
                        <li class="nav-item"> <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a> </li>
                        <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
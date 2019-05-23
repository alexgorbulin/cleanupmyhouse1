<?php require APPROOT . '/views/inc/header2.php'; ?>
    <div class="container">
        <div class="jumbotron  my-orders-jumbotrom">
            <h1 class="display-4"><?php echo $data['title']; ?>Edit upcomming cleaning</h1>
            <p class="lead"> Here you can see your orders and modify your upcomming order. Please be aware that changes to upcomming cleaning can be done not later than 24 hours before scheduled cleaning. </p>
        </div>
    </div>
    <div class="container">
        <form action="<?php echo URLROOT; ?>/orders1/edit/<?php echo $data['id']; ?> " method="post" class="ajax">
            <div class="form-row justify-content-between mb-3">
                <div class="form-group col-md-6 input-group "> <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input id="firstName" type="text" class="form-control " name="firstName" placeholder="First name" value="<?php echo $data['firstName']; ?>"> </div>
                <div class="form-group col-md-6 input-group"> <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input id="lastName" type="text" class="form-control" name="lastName" placeholder="Last name" value="<?php echo $data['lastName']; ?>"> </div>
            </div>
            <div class="form-row justify-content-between mb-3">
                <div class="form-group col-md-6 input-group"> <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $data['email']; ?>"> </div>
                <div class="form-group col-md-6 input-group"> <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input id="phone" type="number" class="form-control" name="phone" placeholder="Phone number" value="<?php echo $data['phone']; ?>"> </div>
            </div>
            <div class="form-row justify-content-around">
                <div class="form-group col-md-6 input-group"> <span class="input-group-text"><i class="fas fa-home"></i></span>
                    <input id="street" type="text" class="form-control" name="street" placeholder="1234 Main St" value="<?php echo $data['street']; ?>"> </div>
                <div class="form-group col-md-4 input-group"> <span class="input-group-text"><i class="fas fa-city"></i></span>
                    <input id="city" type="text" class="form-control" name="city" placeholder="Your city" value="<?php echo $data['city']; ?>"> </div>
                <div class="form-group col-md-2 input-group"> <span class="input-group-text">zip</span>
                    <input id="zip" type="number" class="form-control" name="zip" placeholder="code" value="<?php echo $data['zip']; ?>"> </div>
            </div>
            <div class="form-row justify-content-around">
                <div class="form-group col-md-6 input-group"> <span class="input-group-text"><i class="fas fa-home"></i></span>
                    <input id="date" type="date" class="form-control" name="date" placeholder="mm/dd/yy" min="" value="<?php echo $data['date']; ?>"> </div>
                <div class="form-group col-md-6 input-group"> <span class="input-group-text"><i class="fas fa-home"></i></span>
                    <input id="time" type="time" class="form-control" name="time" placeholder="" value="<?php echo $data['time']; ?>"> </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary">Submit</button>
                <div class="alert alert-success fade " role="alert"> <strong>Your message has been sent!</strong> </div>
            </div>
        </form>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
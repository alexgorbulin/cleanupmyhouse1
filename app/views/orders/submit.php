<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><?php echo $data['title']; ?></h1>
            <p class="lead">
                <?php echo $data['description']; ?>
            </p>
        </div>
    </div>
    <form action="<?php echo URLROOT; ?>/orders/add" method="post" class="ajax">
        <div class="form-row justify-content-between mb-3">
            <div class="form-group col-md-6 input-group "> <span class="input-group-addon"><i class="fas fa-user"></i></span>
                <input id="firstName" type="text" class="form-control " name="firstName" placeholder="First name"> </div>
            <div class="form-group col-md-6 input-group"> <span class="input-group-addon"><i class="fas fa-user"></i></span>
                <input id="lastName" type="text" class="form-control" name="lastName" placeholder="Last name"> </div>
        </div>
        <div class="form-row justify-content-between mb-3">
            <div class="form-group col-md-6 input-group"> <span class="input-group-addon"><i class="fas fa-envelope-square"></i></span>
                <input id="email" type="email" class="form-control" name="email" placeholder="Email"> </div>
            <div class="form-group col-md-6 input-group"> <span class="input-group-addon"><i class="fas fa-phone"></i></span>
                <input id="phone" type="number" class="form-control" name="phone" placeholder="Phone number"> </div>
        </div>
        <div class="form-row justify-content-around">
            <div class="form-group col-md-6 input-group"> <span class="input-group-addon"><i class="fas fa-home"></i></span>
                <input id="street" type="test" class="form-control" name="street" placeholder="1234 Main St"> </div>
            <div class="form-group col-md-4 input-group"> <span class="input-group-addon"><i class="fas fa-city"></i></span>
                <input id="city" type="text" class="form-control" name="city" placeholder="Your city"> </div>
            <div class="form-group col-md-2 input-group"> <span class="input-group-addon">zip</span>
                <input id="zip" type="number" class="form-control" name="zip" placeholder="code"> </div>
        </div>
        <div class="form-row justify-content-between ">
            <div class="container">
                <div class="row">
                    <div class='col-sm-6'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker3'>
                                <input type='text' class="form-control" /> <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span> </span>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker3').datetimepicker({
                                format: 'LT'
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary  " id="target">Submit</button>
            <div class="alert alert-success fade " role="alert"> <strong>Your message has been sent!</strong> </div>
        </div>
    </form>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
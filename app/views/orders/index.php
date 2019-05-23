<?php require APPROOT . '/views/inc/header2.php'; ?>
    <div class="container">
        <?php flash('post_message'); ?>
            <div class="jumbotron my-orders-jumbotrom">
                <h1 class="display-4">My cleaning history</h1>
                <p>Here you can see your orders and modify your upcomming order. Please be aware that changes to upcomming cleaning can be done not later than 24 hours before scheduled cleaning.</p>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <h1>Orders</h1> </div>
                <div class="col-md-6"> <a class="btn btn-primary pull-right" href="<?php echo URLROOT; ?>/pages/newPage#page-top"><i class="fa fa-pencil" aria-hidden="true"></i> Add Order</a> </div>
            </div>
            <?php $i=0; ?>
                <?php foreach($data['orders'] as $order) : ?>
                    <div class="card card-body mb-3 ">
                        <?php echo ++$i; ?>
                            <h4 class="card-title"></h4>
                            <div class="bg-light p-2 mb-3 d-flex justify-content-between flex-wrap">
                                <div class="bg-light p-2 mb-3"><strong> last Name</strong>
                                    <?php echo $order->lastName; ?>
                                </div>
                                <div class="bg-light p-2 mb-3"><strong> Date scheduled</strong>
                                    <?php echo $order->date; ?>
                                </div>
                                <div class="bg-light p-2 mb-3"> <strong>Bedroom:</strong>
                                    <?php echo $order->room; ?>
                                </div>
                                <div class="bg-light p-2 mb-3"><strong> Bathroom:</strong>
                                    <?php echo $order->restroom; ?>
                                </div>
                                <div class="bg-light p-2 mb-3"><strong> Email:</strong>
                                    <?php echo $order->orderEmail; ?>
                                </div>
                                <div class="bg-light p-2 mb-3"><strong> Phone:</strong>
                                    <?php echo $order->phone; ?>
                                </div>
                                <div class="bg-light p-2 mb-3"><strong> You earned:</strong>
                                    <?php echo $order->shiny; ?>
                                </div>
                                <div class="bg-light p-2 mb-3"><strong> Price:</strong> $
                                    <?php echo $order->price; ?>
                                </div>
                                <div class="bg-light p-2 mb-3"><strong>Total earned:</strong> $
                                    <?php foreach($data['shiny'] as $shiny) : ?>
                                        <?php echo $shiny->totalShiny; ?>
                                            <?php endforeach; ?>
                                </div>
                                <div class="bg-light p-2 mb-3"><strong>Order created at:</strong>
                                    <?php echo $order->created_at; ?>
                                </div>
                            </div>
                            <?php if(date("Y-m-d")< ($order->date)) : ?> <a class="btn btn-dark" href="<?php echo URLROOT; ?>/orders1/edit/<?php echo $order->orderId; ?>">Edit</a>
                                <?php else : ?> <a class="btn btn-dark d-none" href="<?php echo URLROOT; ?>/orders1/edit/<?php echo $order->orderId; ?>">Edit</a>
                                    <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
    </div>
    <?php require APPROOT . '/views/inc/footer1.php'; ?>
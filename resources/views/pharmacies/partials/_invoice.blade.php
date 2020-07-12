<div class="card">
    <div class="card-body">
        <?php if ($order['status'] == -1) : ?>
            <div class="alert alert-danger text-center">
                <strong>Order is Cancelled!</strong>
            </div>
        <?php endif; ?>
        <!-- Logo & title -->
        <div class="clearfix">
            <div class="float-sm-right">
                <img src="/images/nav-logo.png" alt="" />

            </div>
            <div class="float-sm-left">
                <p class="text-primary mb-0 mt-0">Invoice</p>
                <h4 class="m-0"><?= $order->pharmacy['name']; ?></h4>
                <p class="text-secondary mb-0 mt-1">{{ $order->pharmacy->full_address }}</p>
                <dl class="row mb-2 mt-3">

                    <dt class="col-sm-3 font-weight-bold">Patient Name :</dt>
                    <dd class="col-sm-9 font-weight-normal"><?= $order['patient_name']; ?></dd>

                    <dt class="col-sm-3 font-weight-bold">Contact No. :</dt>
                    <dd class="col-sm-9 font-weight-normal"><?= $order['contact_no']; ?></dd>

                    <dt class="col-sm-3 font-weight-bold">Doctor Name :</dt>
                    <dd class="col-sm-9 font-weight-normal"><?= $order['doctor_name'] != '' ? $order['doctor_name'] : '--'; ?></dd>
                </dl>
            </div>

        </div>

        <form method="POST" action="update_status.php">


            <?php if ($order['prescription_type'] == 0) : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-4 table-centered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Medicine</th>
                                        <th style="width: 10%">Qty</th>
                                        <th>Timings</th>
                                        <th style="width: 10%" class="text-right">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (json_decode($order['order_items'], true) as $index => $item) : ?>
                                        <tr>
                                            <td><?= $index + 1; ?> </td>
                                            <td>
                                                <h5 class="font-size-16 mt-0 mb-2"><?= $item['name']; ?> </h5>
                                                <p class="text-muted mb-0"><?= $item['instructions']; ?></p>
                                            </td>
                                            <td><?= $item['qty']; ?></td>
                                            <td><?= $item['time']; ?></td>

                                            <td class="text-right"><input class="form-control price" type="text" disabled value="<?= '&#8377; ' .  $item['price'] ?>" name="price<?= $index ?>"></td>

                                        </tr>
                                    <?php endforeach; ?>



                                </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            <?php elseif ($order['prescription_type'] == 1) : ?>
                <a class="btn btn-warning btn-sm my-2 d-print-none" href="<?= $order['order_items'] ?>" target="_blank">View Prescription</a>

            <?php endif; ?>



            <div class="row">
                <div class="col-sm-6">
                </div> <!-- end col -->
                <div class="col-sm-6">
                    <div class="d-flex float-right mt-4">
                        <?php if ($order['prescription_type'] == 0) : ?>
                            <h3>&#8377; <span id="total_price"><?= $order['total_price'] ?></span></h3>
                        <?php else : ?>
                            <h3>&#8377; <?= $order['total_price'] ?></h3>
                            <!-- <input class="form-control d-inline-block ml-2" type="text" id="total_price1" value="<?= $order['total_price'] ?>" name="total_price"> -->

                            <!-- <input class="form-control" placeholder="Order Price" type="number" step="0.1" class="price"   name="total_price"> -->
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

            <div class="mt-5 mb-1">
               
                <div class="text-right d-print-none">
                    <div class="d-inline-block">

                        <?php if ($order['status'] != 0) : ?>
                            <a href="javascript:window.print()" class="btn btn-primary"><i class="fe-printer mr-1"></i> Print</a>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
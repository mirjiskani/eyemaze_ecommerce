<?= include('header.php') ?>
<div class="container-fluid">

    <div class="detailContainer">
        <!-- Title -->
        <?php
        if (empty($result)) {
        ?>
            <div>
                <h1>No detail found of this order id <?= $_GET['id'] ?></h1>
            </div>
        <?php
        } else {
            // echo "<pre>";
            // print_r($result);
        ?>
            <div class="d-flex justify-content-between align-items-center py-3 card">
                <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order <strong>#16123222</strong></h2>
            </div>

            <!-- Main content -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Details -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <span class="me-3">Order Date : <strong>22-11-2021 </strong></span>
                                </div>
                                <!-- <div class="d-flex">
              <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="bi bi-download"></i> <span class="text">Invoice</span></button>
              <div class="dropdown">
                <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="javascript:void();"><i class="bi bi-pencil"></i> Edit</a></li>
                  <li><a class="dropdown-item" href="javascript:void();"><i class="bi bi-printer"></i> Print</a></li>
                </ul>
              </div>
            </div> -->
                            </div>
                            <table class="table table-borderless">
                                <tbody>
                                    <?php
                                    foreach ($result as $key => $record) :
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex mb-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="<?= $record['product_image'] ?>" alt="" width="35" class="img-fluid">
                                                    </div>
                                                    <div class="flex-lg-grow-1 ms-3">
                                                        <h6 class="small mb-0"><a href="javascript:void();" class="text-reset">Product Name : <strong><?= $record['product_name'] ?></strong></a></h6>
                                                        <span class="small">Description: <strong><?= $record['product_description'] ?></strong></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>Price : $<?= $record['product_price'] ?></td>
                                            <td>Qty : <?= $record['qty'] ?></td>
                                            <td class="text-end">Total : $<?= $record['total'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">Subtotal</td>
                                        <td class="text-end">$<?= $result[0]['amount'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Shipping</td>
                                        <td class="text-end">$00.00</td>
                                    </tr>
                                    <!-- <tr>
                <td colspan="2">Discount (Code: NEWYEAR)</td>
                <td class="text-danger text-end">-$00.00</td>
              </tr> -->
                                    <tr class="fw-bold">
                                        <td colspan="2">TOTAL</td>
                                        <td class="text-end">$<?= $result[0]['amount'] ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Payment -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="h6">Payment Method</h3>
                                    <p>Visa -1234 <br>
                                        Total: $<?= $result[0]['amount'] ?> <span class="badge bg-success rounded-pill">PAID</span></p>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="h6">Billing address</h3>
                                    <address>
                                        <strong><?= $result[0]['cardholder'] ?></strong><br>
                                        <?= $result[0]['address'] ?><br>
                                        <?= $result[0]['city'] ?>, <?= $result[0]['state'] ?>, <?= $result[0]['country'] ?><br>
                                        <abbr title="Phone">P:</abbr> (971) 557869496
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Customer Notes -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Customer Notes</h3>
                            <p>Test note static.</p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <!-- Shipping information -->
                        <div class="card-body">
                            <h3 class="h6">Shipping Information</h3>
                            <strong>FedEx</strong>
                            <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i class="bi bi-box-arrow-up-right"></i> </span>
                            <hr>
                            <h3 class="h6"><?= $result[0]['address'] ?></h3>
                            <address>
                                <strong><?= $result[0]['cardholder'] ?></strong><br>
                                <?= $result[0]['address'] ?><br>
                                <?= $result[0]['city'] ?>, <?= $result[0]['state'] ?>, <?= $result[0]['country'] ?><br>
                                <abbr title="Phone">P:</abbr> (971) 557869496
                            </address>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php } ?>
<?= include('footer.php') ?>
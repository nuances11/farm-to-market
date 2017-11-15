<?php include 'includes/header.php' ?>
<!-- Main Sidebar end-->
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Invoice</h4>

        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-body">
                <div class="row">
                    <div class="col-sm-4">
                        <address>
                            <strong>Twitter, Inc.</strong>
                            <br>795 Folsom Ave, Suite 600
                            <br>San Francisco, CA 94107
                            <br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                            <br>
                            <a href="mailto:#">first.last@example.com</a>
                        </address>
                    </div>
                    <div class="col-sm-4">
                        <ul class="list-unstyled">
                            <li>Invoice
                                <strong>#900-AHZ</strong>
                            </li>
                            <li>May 05, 2016</li>
                            <li>Account Name: Matthew Gonzalez</li>
                        </ul>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">Trans #</th>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Unit Cost</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $total_price = 0;
                                $grand_total = 0;
                                $total_quantity = 0;
                                $vat = 0;
                                $total = 0;
                                $sql = "SELECT * FROM tbl_trans_per_product WHERE trans_id = '".$_GET['id']."'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $grand_total += $row['prod_total_price'];
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $row['trans_id'] ?>
                                                    </td>
                                                    <td><?= $row['prod_name'] ?></td>
                                                    <td>
                                                        <span class="label label-success"><?= $row['prod_sku'] ?></span>
                                                    </td>
                                                    <td class="text-center"><?= $row['prod_total_qty'] ?></td>
                                                    <td class="text-center"><?= number_format($row['prod_unit_price'],2) ?></td>
                                                    <td class="text-center"><?= number_format($row['prod_total_price'],2) ?></td>
                                                </tr>
                                                <?php
                                                $i++;
                                    }
								}else{
									echo 'no product to display';
								}
					?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <table class="table">
                            <tbody>
                                <!-- <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="text-right">P&nbsp;&nbsp;<?= number_format($grand_total,2) ?></td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>VAT (12%)</strong>
                                    </td>
                                    <td class="text-right">P&nbsp;&nbsp;<?= number_format($vat,2) ?></td>
                                </tr> -->
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="text-right">
                                        <strong>P&nbsp;&nbsp;<?= number_format($grand_total,2) ?></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-raised btn-primary">
                            <i class="ti-printer"></i> Print</button>
                        <button type="button" class="btn btn-raised btn-success">
                            <i class="ti-credit-card"></i> Proceed to Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
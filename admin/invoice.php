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
                <?php
                    $user = "SELECT * FROM tbl_transactions INNER JOIN tbl_user ON tbl_transactions.owner_id = tbl_user.id WHERE tbl_transactions.id = '".$_GET['id']."'";
                    $resUser = $conn->query($user);
                    if ($resUser->num_rows > 0) {
                        $user = $resUser->fetch_assoc();
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <address>
                                    <strong><?= $user['first_name'] . ' ' . $user['last_name'] ?></strong>
                                    <br><?= $user['add_street'] . ',' . $user['add_barangay'] ?>
                                    <br><?= $user['add_city'] . ',' . $user['add_province'] ?>
                                    <br>
                                    <abbr title="Phone">P:</abbr> <?= $user['phone'] ?>
                                    <br>
                                    <?= $user['email'] ?>
                                </address>
                            </div>
                            <div class="col-sm-4">
                                <ul class="list-unstyled">
                                    <li>Invoice
                                        <strong>#<?= str_pad($user['id'], 8, "0" , STR_PAD_LEFT)?></strong>
                                    </li>
                                    <li><?= $user['timestamp_created']?></li>
                                    <?php
                                        if($user['status'] == '0'){
                                            ?>
                                            <span class="label label-warning">PENDING</span>
                                            <?php
                                        }elseif($user['status'] == '1'){
                                            ?>
                                            <span class="label label-success">APPROVED</span>
                                            <?php
                                        }elseif($user['status'] == '2'){
                                            ?>
                                            <span class="label label-danger">DECLINED</span>
                                            <?php
                                        }else{
                                            echo '';
                                        }
                                    ?>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-raised btn-success" data-id="<?= $_GET['id'] ?>" id="order-approved"> Approve</button>
                                <button type="button" class="btn btn-raised btn-danger" data-id="<?= $_GET['id'] ?>" id="order-decline"> Decline</button>
                            <br>
                            </div>
                        </div>
                        <?php
                    }
                ?>
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">Trans #</th>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th class="text-center">Quantity/Unit</th>
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
                                                    <td class="text-center"><?= $row['prod_total_qty'] ?>/<strong>kg</strong></td>
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
                        <a href="order-list.php" class="btn btn-success btn-outline">
                                Back
                        </a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>
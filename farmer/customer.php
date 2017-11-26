<?php include 'includes/header.php'?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Transaction List</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Transactions</li> 
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">Transactions</h3>
            </div>
            <div class="widget-body">
                <table id="product-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Invoice #</th>
                            <th>Product Name</th>
                            <th>SKU</th>
                            <th class="text-right">Price/Unit</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            $sql = "SELECT * FROM tbl_trans_per_product INNER JOIN tbl_transactions ON tbl_trans_per_product.trans_id = tbl_transactions.id WHERE farmer_id = '".$_SESSION['id']."'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $i?>
                                            </td>
                                            <td class="text-center">
                                                <?= $row['trans_id'] ?>
                                            </td>
                                            <td><?= $row['prod_name'] ?></td>
                                            <td><?= $row['prod_sku'] ?></td>
                                            <td class="text-right">P <?= number_format($row['prod_unit_price'],2)?>/<strong>kg</strong></td>
                                            <td class="text-right"><?= $row['prod_total_qty'] ?></td>
                                            <td class="text-right">
                                               <?= number_format($row['prod_total_price'],2)?>
                                            </td>
                                            <td class="text-center">
                                            <?php
                                                if($row['status'] == '0'){
                                                    ?>
                                                        <span class="label label-warning">PENDING</span>
                                                        <?php
                                                }elseif($row['status'] == '1'){
                                                    ?>
                                                            <span class="label label-success">APPROVED</span>
                                                            <?php
                                                }elseif($row['status'] == '2'){
                                                    ?>
                                                    <span class="label label-danger">DECLINED</span>
                                                    <?php
                                                }else{
                                                    echo '';
                                                }
                                            ?>
                                            </td>
                                        </tr>
                                    <?php
                                    $i++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>
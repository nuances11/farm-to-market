<?php include 'includes/header.php'?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Order List</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Order List</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">Order List</h3>
            </div>
            <div class="widget-body">
                <div id="order-list_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="row">
                        <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice Number</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $i = 1;
                        $sql = "SELECT * FROM tbl_transactions";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td>
                                            <?= $i ?>
                                        </td>
                                        <td>
                                            <?= str_pad($row['id'], 8, "0" , STR_PAD_LEFT)?>
                                        </td>
                                        <td>
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
                                        <td>
                                            <?= $row['timestamp_created'] ?>
                                        </td>
                                        <td><a href="invoice.php?id=<?= $row['id'] ?>">View</a></td>
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
    </div>
</div>
</div>
<?php include 'includes/footer.php'?>
<?php include 'includes/header.php'?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Product List</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Product List</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">Product List</h3>
            </div>
            <div class="widget-body">
                <table id="example-7" cellspacing="0" width="100%" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>SKU</th>
                    <th class="text-right">Price</th>
                    <th class="text-right">Quantity</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $sql = "SELECT * FROM tbl_products";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                <tr>
                                    <td class="text-center">
                                        <img
                                            <?php 
                                                if ($row['prod_image']) {
                                                    ?>
                                                        src = "<?= BASE_URL ?>build/images/products/<?= $row['prod_image']?>"
                                                    <?php
                                                }else {
                                                    ?>
                                                    src="<?= BASE_URL ?>build/images/no-image.jpg"
                                                    <?php
                                                }
                                            ?>
                                         width="50" alt="" class="img-thumbnail img-responsive">
                                    </td>
                                    <td><?= $row['prod_name'] ?></td>
                                    <td><?= $row['prod_sku'] ?></td>
                                    <td class="text-right">P <?= number_format($row['prod_price'],2) ?>/<strong style="color:#17A88B">kg</strong></td>
                                    <td class="text-right"><?= $row['prod_quantity'] ?></td>
                                    <td>
                                        <?php
                                            if ($row['prod_status'] == '1') {
                                                ?>
                                                    <span class="label label-success">Enabled</span>
                                                <?php
                                            }else if ($row['prod_status'] == '0') {
                                                ?>
                                                    <span class="label label-warning">Disabled</span>
                                                <?php
                                            }
                                        ?>
                                        
                                    </td>
                                    <td class="text-center">
                                        <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                            <!-- <button type="button" class="btn btn-outline btn-primary">
                                                <i class="ti-eye"></i>
                                            </button> -->
                                            <a href="edit-product.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-success">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <a href="<?= BASE_URL ?>process/delete-product.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-danger">
                                                <i class="ti-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
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
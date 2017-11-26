<?php include 'includes/header.php' ?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Sub Categories</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Sub Categories</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">Sub Category</h3>
            </div>
            <div class="widget-body">
                <form id="add-subcat-form" class="form-horizontal">
                    <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-6 input-category">
                            <select name="category" id="category" class="form-control">
                                <option value="">Select Category</option>
                                <?php
                                    $sql = "SELECT * FROM tbl_category";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['category_name'] ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="subcatname" class="col-sm-2 control-label">Sub Category</label>
                        <div class="col-sm-6 input-subcatname">
                            <input id="subcatname" type="text" name="subcatname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="identifier" class="col-sm-2 control-label">Unique Identifier</label>
                        <div class="col-sm-6 input-identifier">
                            <input id="identifier" type="text" name="identifier" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-6 input-status">
                            <select name="status" id="status" class="form-control">
                                <option value="0">Disable</option>
                                <option value="1">Enable</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button type="button" id="add-sub-category" class="btn btn-raised btn-black">Add Sub Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12">
              <div class="widget">
                <div class="widget-heading">
                  <h3 class="widget-title">Category List</h3>
                </div>
                <div class="widget-body">
                  <table id="example-1" cellspacing="0" width="100%" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Sub Category</th>
                        <th>Identifier</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            $sql = "SELECT * FROM tbl_sub_category INNER JOIN tbl_category ON tbl_sub_category.category_id = tbl_category.id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>

                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['category_name'] ?></td>
                                        <td><?= $row['sub_category_name'] ?></td>
                                        <td><?= $row['sub_category_identifier'] ?></td>
                                        <td><?= $row['sub_category_status'] ?></td>
                                        <td class="text-center">
                                            <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                                <!-- <button type="button" class="btn btn-outline btn-primary">
                                                    <i class="ti-eye"></i>
                                                </button> -->
                                                <a href="edit-category.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-success">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                <a href="delete-category.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-danger">
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </div>
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
<?php include 'includes/footer.php' ?>
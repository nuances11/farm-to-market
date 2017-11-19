<?php include 'includes/header.php'?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <ol class="breadcrumb mb-0">
                <li class="active">Home</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
    <div class="widget">
                <div class="widget-heading">
                  <h3 class="widget-title">Responsive</h3>
                </div>
                <div class="widget-body">
                <table id="product-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Type</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    $sql = "SELECT * FROM tbl_user";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td>
                                <?php
                                    echo $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
                                ?>
                            </td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['user_type'] ?></td>
                            <td><?= $row['gender'] ?></td>
                            <td>
                                <?php
                                    if ($row['active'] == '1') {
                                        ?>
                                            <span class="label label-success">Active</span>
                                        <?php
                                    }else if ($row['active'] == '0') {
                                        ?>
                                            <span class="label label-warning">Inactive</span>
                                        <?php
                                    }
                                ?>
                                
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <!-- <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button> -->
                                    <a href="edit-user.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </a>
                                    <a href="delete-user.php?id=<?= $row['id'] ?>" class="btn btn-outline btn-danger">
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
<?php include 'includes/footer.php'?>
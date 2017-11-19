<?php include 'includes/header.php'?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Dashboard</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Add Product</li>
            </ol>
        </div>
    </div>
    <div class="widget">
        <div class="widget-heading clearfix">
            <h3 class="widget-title pull-left">Add Product</h3>
            <div class="pull-right">
                <button type="button" id="save-product" class="btn btn-primary">
                    <i class="ti-save"></i>&nbsp;&nbsp;SAVE PRODUCT
                </button>
                <!-- <button type="button" class="btn btn-default">
                    <i class="ti-share-alt"></i>
                </button> -->
            </div>
        </div>

        <div class="err col-sm-12" style="padding-top:5px;">
            <!-- Error Handler -->
        </div>
        <div class="widget-body">
            <form class="form-horizontal" id="product-form" enctype="multipart/form-data">
                <ul role="tablist" class="nav nav-tabs mb-15">
                    <li role="presentation" class="active">
                        <a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a>
                    </li>
                    <li role="presentation">
                        <a href="#data" aria-controls="data" role="tab" data-toggle="tab">Data</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="general" role="tabpanel" class="tab-pane active">
                        <div class="form-group">
                            <label for="productName" class="col-sm-3 control-label">Product Name</label>
                            <div class="col-sm-9 input-productname">
                                <input id="productName" name="productName" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productCategory" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-9 input-productcategory">
                                <select class="form-control" name="productCategory" id="productCategory">
                                    <option value="">Please select...</option>
                                    <option value="Category 1">Category 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productSubCategory" class="col-sm-3 control-label">Sub-category</label>
                            <div class="col-sm-9 input-productsubcategory">
                                <select class="form-control" name="productSubCategory" id="productSubCategory">
                                    <option value="">Please select...</option>
                                    <option value="Sub-category 1">Sub-category 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productDescription" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9 input-productdescription">
                                <textarea id="productDescription" name="productDescription" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="data" role="tabpanel" class="tab-pane">
                        <div class="form-group">
                            <label for="productSKU" class="col-sm-3 control-label">SKU</label>
                            <div class="col-sm-9 input-productsku">
                                <input id="productSKU" name="productSKU" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productPrice" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-9 input-productprice">
                                <input id="productPrice" name="productPrice" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productQuantity" class="col-sm-3 control-label">Quantity</label>
                            <div class="col-sm-9 input-productquantity">
                                <input id="productQuantity" name="productQuantity" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productMinQuantity" class="col-sm-3 control-label">Minimum Quantity</label>
                            <div class="col-sm-9 input-productminquantity">
                                <input id="productMinQuantity" name="productMinQuantity" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productStatus" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9 input-productstatus">
                                <select id="productStatus" name="productStatus" class="form-control">
                                    <option value="">Choose</option>
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </form>

            </div>

        </div>
    </div>
</div>
</div>
<?php include 'includes/footer.php'?>
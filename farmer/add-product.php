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
            <h3 class="widget-title pull-left">Edit Product</h3>
            <div class="pull-right">
                <button type="button" class="btn btn-primary">
                    <i class="ti-save"></i>
                </button>
                <button type="button" class="btn btn-default">
                    <i class="ti-share-alt"></i>
                </button>
            </div>
        </div>
        <div class="widget-body">
            <form class="form-horizontal">
                <ul role="tablist" class="nav nav-tabs mb-15">
                    <li role="presentation" class="active">
                        <a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a>
                    </li>
                    <li role="presentation">
                        <a href="#data" aria-controls="data" role="tab" data-toggle="tab">Data</a>
                    </li>
                    <li role="presentation">
                        <a href="#image" aria-controls="image" role="tab" data-toggle="tab">Image</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="general" role="tabpanel" class="tab-pane active">
                        <div class="form-group">
                            <label for="txtProductName" class="col-sm-3 control-label">Product Name</label>
                            <div class="col-sm-9">
                                <input id="txtProductName" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtMetaTagTitle" class="col-sm-3 control-label">Meta Tag Title</label>
                            <div class="col-sm-9">
                                <input id="txtMetaTagTitle" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtMetaTagDescription" class="col-sm-3 control-label">Meta Tag Description</label>
                            <div class="col-sm-9">
                                <textarea id="txtMetaTagDescription" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtMetaTagKeywords" class="col-sm-3 control-label">Meta Tag Keywords</label>
                            <div class="col-sm-9">
                                <textarea id="txtMetaTagKeywords" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtDescription" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea id="txtDescription" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="data" role="tabpanel" class="tab-pane">
                        <div class="form-group">
                            <label for="txtModel" class="col-sm-3 control-label">Model</label>
                            <div class="col-sm-9">
                                <input id="txtModel" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtSKU" class="col-sm-3 control-label">SKU</label>
                            <div class="col-sm-9">
                                <input id="txtSKU" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtLocation" class="col-sm-3 control-label">Location</label>
                            <div class="col-sm-9">
                                <input id="txtLocation" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtPrice" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-9">
                                <input id="txtPrice" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtTaxClass" class="col-sm-3 control-label">Tax Class</label>
                            <div class="col-sm-9">
                                <input id="txtTaxClass" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtQuantity" class="col-sm-3 control-label">Quantity</label>
                            <div class="col-sm-9">
                                <input id="txtQuantity" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtMinQuantity" class="col-sm-3 control-label">Minimum Quantity</label>
                            <div class="col-sm-9">
                                <input id="txtMinQuantity" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ddlStatus" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select id="ddlStatus" class="form-control">
                                    <option value="">Choose</option>
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="image" role="tabpanel" class="tab-pane">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fileInput">File input</label>
                                        <input id="fileInput" type="file" data-buttonname="btn-outline btn-primary" data-iconname="ti-zip" class="filestyle" tabindex="-1"
                                            style="position: absolute; clip: rect(0px 0px 0px 0px);">
                                        <div class="bootstrap-filestyle input-group">
                                            <input type="text" class="form-control " placeholder="" disabled="">
                                            <span class="group-span-filestyle input-group-btn" tabindex="0">
                                                <label for="fileInput" class="btn btn-outline btn-primary ">
                                                    <span class="icon-span-filestyle ti-zip"></span>
                                                    <span class="buttonText">Choose file</span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php include 'includes/footer.php'?>
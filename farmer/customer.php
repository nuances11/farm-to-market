<?php include 'includes/header.php'?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Customer List</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="add-products.php">E-commerce</a>
                </li>
                <li class="active">Customer List</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">Customer List</h3>
            </div>
            <div class="widget-body">
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtProductName">Customer Name</label>
                                <input id="txtProductName" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtPrice">Location</label>
                                <input id="txtPrice" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ddlStatus">Status</label>
                                <select id="ddlStatus" class="form-control">
                                    <option value="">Choose</option>
                                    <option value="1">Enabled</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mb-15 btn btn-raised btn-success">Filter</button>
                </form>
                <table id="product-list" style="width: 100%" class="table table-hover dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <div class="checkbox-custom">
                                    <input id="checkAll" type="checkbox" value="option1">
                                    <label for="checkAll" class="pl-0">&nbsp;</label>
                                </div>
                            </th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Model</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Quantity</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-01" type="checkbox" value="01">
                                    <label for="product-01" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/01.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #01</td>
                            <td>Model #20</td>
                            <td class="text-right">$50.00</td>
                            <td class="text-right">320</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-02" type="checkbox" value="02">
                                    <label for="product-02" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/02.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #02</td>
                            <td>Model #12</td>
                            <td class="text-right">$90.00</td>
                            <td class="text-right">4</td>
                            <td>
                                <span class="label label-warning">Low stock</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-03" type="checkbox" value="03">
                                    <label for="product-03" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/03.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #03</td>
                            <td>Model #20</td>
                            <td class="text-right">$20.00</td>
                            <td class="text-right">56</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-04" type="checkbox" value="04">
                                    <label for="product-04" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/04.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #04</td>
                            <td>Model #14</td>
                            <td class="text-right">$150.00</td>
                            <td class="text-right">30</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-05" type="checkbox" value="05">
                                    <label for="product-05" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/05.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #05</td>
                            <td>Model #64</td>
                            <td class="text-right">$41.00</td>
                            <td class="text-right">63</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-06" type="checkbox" value="06">
                                    <label for="product-06" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/06.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #06</td>
                            <td>Model #20</td>
                            <td class="text-right">$65.00</td>
                            <td class="text-right">62</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-07" type="checkbox" value="07">
                                    <label for="product-07" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/07.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #07</td>
                            <td>Model #54</td>
                            <td class="text-right">$24.00</td>
                            <td class="text-right">75</td>
                            <td>
                                <span class="label label-danger">Disabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-08" type="checkbox" value="08">
                                    <label for="product-08" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/08.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #08</td>
                            <td>Model #08</td>
                            <td class="text-right">$50.00</td>
                            <td class="text-right">31</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-09" type="checkbox" value="09">
                                    <label for="product-09" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/09.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #09</td>
                            <td>Model #35</td>
                            <td class="text-right">$450.00</td>
                            <td class="text-right">80</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-10" type="checkbox" value="10">
                                    <label for="product-10" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/10.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #10</td>
                            <td>Model #12</td>
                            <td class="text-right">$460.00</td>
                            <td class="text-right">5</td>
                            <td>
                                <span class="label label-warning">Low stock</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-11" type="checkbox" value="11">
                                    <label for="product-11" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/11.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #11</td>
                            <td>Model #20</td>
                            <td class="text-right">$240.00</td>
                            <td class="text-right">320</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-12" type="checkbox" value="12">
                                    <label for="product-12" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/12.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #12</td>
                            <td>Model #20</td>
                            <td class="text-right">$50.00</td>
                            <td class="text-right">320</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-13" type="checkbox" value="13">
                                    <label for="product-13" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/13.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #13</td>
                            <td>Model #31</td>
                            <td class="text-right">$100.00</td>
                            <td class="text-right">24</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-14" type="checkbox" value="14">
                                    <label for="product-14" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/14.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #14</td>
                            <td>Model #09</td>
                            <td class="text-right">$140.00</td>
                            <td class="text-right">200</td>
                            <td>
                                <span class="label label-danger">Disabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-15" type="checkbox" value="15">
                                    <label for="product-15" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/15.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #15</td>
                            <td>Model #78</td>
                            <td class="text-right">$35.00</td>
                            <td class="text-right">40</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-16" type="checkbox" value="16">
                                    <label for="product-16" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/16.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #16</td>
                            <td>Model #24</td>
                            <td class="text-right">$190.00</td>
                            <td class="text-right">28</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-17" type="checkbox" value="17">
                                    <label for="product-17" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/17.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #17</td>
                            <td>Model #56</td>
                            <td class="text-right">$190.00</td>
                            <td class="text-right">40</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-18" type="checkbox" value="18">
                                    <label for="product-18" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/18.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #18</td>
                            <td>Model #35</td>
                            <td class="text-right">$140.00</td>
                            <td class="text-right">24</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-19" type="checkbox" value="19">
                                    <label for="product-19" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/19.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #19</td>
                            <td>Model #20</td>
                            <td class="text-right">$50.00</td>
                            <td class="text-right">320</td>
                            <td>
                                <span class="label label-danger">Disabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <div class="checkbox-custom">
                                    <input id="product-20" type="checkbox" value="20">
                                    <label for="product-20" class="pl-0">&nbsp;</label>
                                </div>
                            </td>
                            <td class="text-center">
                                <img src="../build/images/products/20.jpg" width="50" alt="" class="img-thumbnail img-responsive">
                            </td>
                            <td>Example Product #20</td>
                            <td>Model #18</td>
                            <td class="text-right">$480.00</td>
                            <td class="text-right">180</td>
                            <td>
                                <span class="label label-success">Enabled</span>
                            </td>
                            <td class="text-center">
                                <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline btn-primary">
                                        <i class="ti-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-success">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline btn-danger">
                                        <i class="ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>
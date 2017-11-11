<?php
    session_start();
    include ('includes/header.php');
?>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side pos">

    <!-- Main content -->
    <section class="content">
        <!-- top row -->
        <div class="row">
            <div class="col-xs-12 connectedSortable">

            </div><!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable">
                <!-- Box (with bar chart) -->
                <div class="box box-danger">
                    <div class="box-header">
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <?php
                            //current URL of the Page. cart_update.php redirects back to this URL
                            $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
                            ?>
                            <a class="btn btn-xs btn-danger" href="cart_update.php?emptycart=1&return_url=<?php echo $current_url;?>"><i class="fa fa-trash-o" aria-hidden="true"></i> &nbsp; Empty Cart</a>
                        </div><!-- /. tools -->


                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        <h3 class="box-title">Item Cart</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="cart_update.php">
                            <table cellpadding="10" cellspacing="1" width="100%">
                                <tbody>
                                <tr>
                                    <th style="text-align:left;"><strong>Name</strong></th>
                                    <th style="text-align:left;"><strong>SKU</strong></th>
                                    <th style="text-align:right;"><strong>Quantity</strong></th>
                                    <th style="text-align:right;"><strong>Price</strong></th>
                                    <th style="text-align:center;"><strong>Action</strong></th>
                                </tr>
                                <?php
                                //current URL of the Page. cart_update.php redirects back to this URL
                                $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

                                if(isset($_SESSION["cart_session"]))
                                {
                                    $total = 0;
                                    $total_qty=0;
                                    $cart_items = 0;
                                    $change = 0;
                                    foreach ($_SESSION["cart_session"] as $cart_itm)
                                    {
                                        ?>
                                        <tr>
                                            <td style="text-align:left;border-bottom:#F0F0F0 1px solid;">
                                                <strong><?php echo $cart_itm["name"]; ?></strong>
                                                <input type="hidden"
                                            </td>
                                            <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $cart_itm["code"]; ?></td>
                                            <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $cart_itm["quantity"]; ?></td>
                                            <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $cart_itm["price"]; ?></td>
                                            <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="cart_update.php?removep=<?php echo $cart_itm["code"].'&return_url='.$current_url; ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                            <input type="hidden" name="item_id" value="<?php echo $cart_itm["code"];?>">
                                            <input type="hidden" name="item_quantity" value="<?php echo $cart_itm["quantity"];?>">
                                        </tr>
                                        <?php
                                        $total += ($cart_itm["price"]*$cart_itm["quantity"]);
                                        $total_qty += $cart_itm["quantity"];

                                        echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$cart_itm["name"].'" />';
                                        echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$cart_itm["code"].'" />';
                                        //echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->Description.'" />';
                                        echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["quantity"].'"/>';
                                        $cart_items ++;
                                    }
                                }
                                ?>

                                <tr>
                                    <td colspan="3" align=right><strong>Total Items: </strong></td>
                                    <td colspan="2" align="right"><strong><?php echo "&nbsp &nbsp;".$total_qty; ?></strong></td>
                                    <input type="hidden" name="total_qty" value="<?php echo $total_qty;?>">
                                </tr>
                                <tr>
                                    <td colspan="3" align="right"><strong>TOTAL:</strong></td>
                                    <td colspan="2" align="right"><strong>Php &nbsp &nbsp;<span id="total-holder"><?php echo number_format($total,2); ?></span></strong></td>
                                    <input type="hidden" name="total" value="<?php echo $total;?>">
                                </tr>
                                <tr>

                                    <td colspan="3" align="right"><strong>CASH</strong></td>
                                    <td colspan="2" align="right"><input id="cash" type="number" name="cash" size="5" onchange="computeChange()" required> </td>
                                </tr>
                                <tr>
                                    <td colspan="3" align="right"><strong>CHANGE</strong></td>
                                    <td colspan="2" align="right">
                                        <strong>Php &nbsp &nbsp;<span id="change-holder"></span></strong>
                                        <input type="hidden" id="input-change" name="input-change">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <script> //Computation of change
                                var total = parseFloat((document.getElementById("total-holder").innerHTML).replace(/,/g, '')); //total

                                function computeChange(){
                                    var cash = document.getElementById("cash").value;
                                    var solve = cash - total;
                                    var n = numberWithCommas(solve);
                                    document.getElementById("change-holder").innerHTML = n;
                                    document.getElementById("input-change").value = n;
                                }

                                function numberWithCommas(x) {
                                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }

                            </script>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div id="product-grid">
                            <input type="submit" class="btn btn-primary" value="Checkout" name="checkout">
                            </form>
                        </div>
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
                <!-- Map box -->
                <div class="box box-primary">
                    <div class="box-header">
                        <i class="fa fa-map-marker"></i>
                        <h3 class="box-title">
                            Products
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="box-body table-responsive">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                require ('../admin/actions/connection.php');
                                //current URL of the Page. cart_update.php redirects back to this URL
                                $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

                                $sql1 = "SELECT * FROM inventory WHERE stock_quantity > '0'";
                                $result1 = $conn->query($sql1);

                                if ($result1->num_rows > 0){
                                while($row1 = $result1->fetch_assoc()){

                                $sql = "SELECT * FROM products WHERE product_id = '".$row1['product_id']."' AND status = '1' ORDER BY product_id ASC";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){
                                ?>
                                <tr>

                                    <td><?php echo $row['product_id']; ?></td>
                                    <td><?php echo $row['product_name'].'&nbsp;(&nbsp; <strong style="color:green;">'.$row1['stock_quantity']; ?></strong> &nbsp;)</td>
                                    <td><?php echo "Php &nbsp &nbsp;".number_format($row['product_price'],2); ?></td>
                                    <td>
                                        <form method="post" action="cart_update.php">
                                            <div class="input-group input-group-sm">
                                                <input type="number" <?php echo 'min=1 max='.$row1['stock_quantity'];?> name="product_qty" value="1" class="form-control">
                                                <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                                                <input type="hidden" name="type" value="add" />
                                                <input type="hidden" name="return_url" value="<?php echo $current_url;?>" />
                                                <span class="input-group-btn">
                                                                <button class="btn btn-primary btn-flat" type="submit"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                            </span>
                                            </div>
                                        </form>

                                    </td>
                                </tr>
                        </div><!-- /.box-body -->
                        <?php

                        }
                        }
                        }
                        }


                        ?>


                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                        </tr>
                        </tfoot>
                        </table>

                    </div><!-- /.box-body-->
                    <div class="box-footer">


                    </div>
                </div>
                <!-- /.box -->

            </section><!-- right col -->
        </div><!-- /.row (main row) -->
        <footer class="copyright">
            <div class="copy pull-right">
                <small>Copyright © 2017 Xandrea Eris. All Rights Reserved</small>
            </div>
        </footer>

    </section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- add new calendar event modal -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="../js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="../js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>

<script src="../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>


<!-- page script -->
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/31/16
 * Time: 12:10 PM
 */

$current_menu_id = $_GET['menu_id'];

$menu_item_ids = get_all_items($current_menu_id);

$menu_items = array();
for ($i = 0; $i < count($menu_item_ids); $i++) {
    $item = get_item($menu_item_ids[$i]);
    array_push($menu_items, $item);
}

echo "<script type='text/javascript'>var menu_items_json_str = '".json_encode($menu_items)."';</script>";

?>

<script type="text/javascript">
    var items_in_menu = JSON.parse(menu_items_json_str);
    var total = 0.00;
    var appetizer_chosen = -1, soup_chosen = -1, beverage_chosen = -1, meat_chosen = -1, salad_chosen = -1;

    function load_menu() {
        for (var i = 0; i < items_in_menu.length; i++) {
            var item = items_in_menu[i];
            switch(item.item_category) {
                case "0":
                    $("<li></li>").attr("id", "item-li-" + i)
                        .addClass("list-group-item")
                        .append("<input type='radio' name='appetizer-radio' value='"+ i +"'>&nbsp;&nbsp;"+ item.item_name)
                        .append("<label class='pull-right'>$" + item.price + "</label>")
                        .appendTo($("#appetizer-list"));
                    break;
                case "1":
                    $("<li></li>").attr("id", "item-li-" + i)
                        .addClass("list-group-item")
                        .append("<input type='radio' name='soup-radio' value='"+ i +"'>&nbsp;&nbsp;"+ item.item_name)
                        .append("<label class='pull-right'>$" + item.price + "</label>")
                        .appendTo($("#soup-list"));
                    break;
                case "2":
                    $("<li></li>").attr("id", "item-li-" + i)
                        .addClass("list-group-item")
                        .append("<input type='radio' name='beverage-radio' value='"+ i +"'>&nbsp;&nbsp;"+ item.item_name)
                        .append("<label class='pull-right'>$" + item.price + "</label>")
                        .appendTo($("#beverage-list"));
                    break;
                case "3":
                    $("<li></li>").attr("id", "item-li-" + i)
                        .addClass("list-group-item")
                        .append("<input type='radio' name='meat-radio' value='"+ i +"'>&nbsp;&nbsp;"+ item.item_name)
                        .append("<label class='pull-right'>$" + item.price + "</label>")
                        .appendTo($("#meat-list"));
                    break;
                case "4":
                    $("<li></li>").attr("id", "item-li-" + i)
                        .addClass("list-group-item")
                        .append("<input type='radio' name='salad-radio' value='"+ i +"'>&nbsp;&nbsp;"+ item.item_name)
                        .append("<label class='pull-right'>$" + item.price + "</label>")
                        .appendTo($("#salad-list"));
                    break;
                default:
                    break;
            }
        }
    }

    function calculate_total() {
        // get quantity
        var quantity = parseInt($("#quantity-input").val());

        // get chosen item of each category
        if ($("input[name=appetizer-radio]").is(':checked')) {
            appetizer_chosen = parseInt($('input[name=appetizer-radio]:checked').val());
        } else {
            appetizer_chosen = -1;
        }

        if ($("input[name=soup-radio]").is(':checked')) {
            soup_chosen = parseInt($('input[name=soup-radio]:checked').val());
        } else {
            soup_chosen = -1;
        }

        if ($("input[name=beverage-radio]").is(':checked')) {
            beverage_chosen = parseInt($('input[name=beverage-radio]:checked').val());
        } else {
            beverage_chosen = -1;
        }

        if ($("input[name=meat-radio]").is(':checked')) {
            meat_chosen = parseInt($('input[name=meat-radio]:checked').val());
        } else {
            meat_chosen = -1;
        }

        if ($("input[name=salad-radio]").is(':checked')) {
            salad_chosen = parseInt($('input[name=salad-radio]:checked').val());
        } else {
            salad_chosen = -1;
        }

        var appetizer_price = appetizer_chosen > -1 ? parseFloat(items_in_menu[appetizer_chosen].price) : 0.00;
        var soup_price = soup_chosen > -1 ? parseFloat(items_in_menu[soup_chosen].price) : 0.00;
        var beverage_price = beverage_chosen > -1 ? parseFloat(items_in_menu[beverage_chosen].price) : 0.00;
        var meat_price = meat_chosen > -1 ? parseFloat(items_in_menu[meat_chosen].price) : 0.00;
        var salad_price = salad_chosen > -1 ? parseFloat(items_in_menu[salad_chosen].price) : 0.00;

        total = quantity * (appetizer_price + soup_price + beverage_price + meat_price + salad_price);
        total = total.toFixed(2);
        $("#total-display").html(total);
    }

    $(function () {
        // first load the menu items
        load_menu();

        $("input:radio").change(function(){
            calculate_total();
        });

        $("input[name=quantity-input]").change(function(){
            calculate_total();
        });

        $(document).on("click", "#restart-btn", function () {
            $("input:radio").prop('checked', false);
            $("input[name=quantity-input]").val(1);
            calculate_total();
        });

        $(document).on("click", "#place-order-btn", function () {
            // generate the order details
            calculate_total();

            var appetizer = appetizer_chosen > -1 ? items_in_menu[appetizer_chosen].item_name : "None";
            var soup = soup_chosen > -1 ? items_in_menu[soup_chosen].item_name : "None";
            var beverage = beverage_chosen > -1 ? items_in_menu[beverage_chosen].item_name : "None";
            var meat = meat_chosen > -1 ? items_in_menu[meat_chosen].item_name : "None";
            var salad = salad_chosen > -1 ? items_in_menu[salad_chosen].item_name : "None";

            var order_date = new Date();
            dformat = [order_date.getMonth()+1,
                    order_date.getDate(),
                    order_date.getFullYear()].join('/')+' '+
                [order_date.getHours(),
                    order_date.getMinutes(),
                    order_date.getSeconds()].join(':');

            $("#order-date").text(dformat);

            $("#order-appetizer").text(appetizer);
            $("#order-soup").text(soup);
            $("#order-beverage").text(beverage);
            $("#order-meat").text(meat);
            $("#order-salad").text(salad);

            $("#order-quantity").text($("input[name=quantity-input]").val());
            $("#order-total").text(total);
        });
    });
</script>

<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: white">View Menu and Place Order
            <small style="color: lightgrey;">Customer only</small>
        </h1>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Place your
                <strong>Order</strong>
            </h2>
            <hr>
            <p>Please select one item from each category and choose your quantity of the meal, then place your order.</p>
            <div role="form" action="#">
                <div class="row">
                    <div class="form-group col-lg-10">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Choose your Appetizer</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <ul id="appetizer-list" class="list-group">
                                    </ul>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Choose your Soup</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <ul id="soup-list" class="list-group">
                                    </ul>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Choose your Beverage</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <ul id="beverage-list" class="list-group">
                                    </ul>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Choose your Meat</a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse">
                                    <ul id="meat-list" class="list-group">
                                    </ul>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Choose your Salad</a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse">
                                    <ul id="salad-list" class="list-group">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="form-group col-lg-3">
                        <label for="quantity-input">Quantity</label>
                        <input id="quantity-input" type="text" value="1" name="quantity-input" class="col-md-8 form-control">
                        <script>
                            $("input[name='quantity-input']").TouchSpin({
                                min: 1,
                                max: 1000000000,
                                stepinterval: 50,
                                maxboostedstep: 10000000,
                                prefix: 'X'
                            });
                        </script>
                    </div>

                    <div class="form-group col-lg-4 pull-right">
                        <label style="color: darkred;">Total: $<span id="total-display">0.00</span>.</label>
                    </div>

                    <div class="form-group col-lg-12">
                        <button id="place-order-btn" type="submit" class="btn btn-success" data-toggle="modal" data-target="#orderModal">Place Order</button>
                        <button id="restart-btn" type="submit" class="btn btn-danger">Restart</button>

                        <!-- Order Modal -->
                        <div class="modal fade" id="orderModal" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Your Order is placed!</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Ordered At: <label id="order-date" style="color: deepskyblue;"></label></p>
                                        <ul class="list-group">Order Details:
                                            <li class="list-group-item">Appetizer: <label id="order-appetizer"></label></li>
                                            <li class="list-group-item">Soup: <label id="order-soup"></label></li>
                                            <li class="list-group-item">Beverage: <label id="order-beverage"></label></li>
                                            <li class="list-group-item">Meat: <label id="order-meat"></label></li>
                                            <li class="list-group-item">Salad: <label id="order-salad"></label></li>
                                        </ul>
                                        <p> x <label id="order-quantity"></label></p>
                                        <p>Total price: <label id="order-total" style="color: darkred;"></label></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

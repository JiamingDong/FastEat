<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/31/16
 * Time: 12:10 PM
 */

echo "<script type='text/javascript'>var items_json_str = '".json_encode(all_items())."';</script>";

?>

<script type="text/javascript">
    var items = [];

    var items_backup = JSON.parse(items_json_str);
    var current_page = 0;
    var current_category = "all";

    function is_in_menu(item_id, menu_id) {
        return $.ajax({
            url:'../controllers/actions_controller.php',
            type:'post',
            data:{'action':'check_item_menu_mapping', 'item_id':item_id, 'menu_id':menu_id}
        });
    }

    function add_to_menu(item_id, menu_id) {
        $.ajax({
            url:'../controllers/actions_controller.php',
            type:'post',
            data:{'action':'add_item_to_menu', 'item_id':item_id, 'menu_id':menu_id}
        });
    }

    function delete_from_menu(item_id, menu_id) {
        $.ajax({
            url:'../controllers/actions_controller.php',
            type:'post',
            data:{'action':'delete_item_from_menu', 'item_id':item_id, 'menu_id':menu_id}
        });
    }

    function add_item_to_row (item, items_row_3) {
        var item_div = $("<div></div>").addClass("col-md-4 portfolio-item");

        var img_link = $("<a href='#'></a>");
        var img = $("<img />").addClass("item-img img-full").css({height:240, width:300}).attr({"src":item.image_url, "alt":""});
        img.appendTo(img_link);

        var category = "";
        switch (item.item_category) {
            case "0":
                category = "Appetizer";
                break;
            case "1":
                category = "Soup";
                break;
            case "2":
                category = "Beverage";
                break;
            case "3":
                category = "Meat";
                break;
            case "4":
                category = "Salad";
                break;
            default:
                break;
        }

        item_name_h3 = $("<h3></h3>").addClass("item-name-h3").css("color", "white").html(item.item_name
            + " <small class='pull-right' style='color: lightgoldenrodyellow'>" + category + "</small>");
        var item_price_p = $("<p></p>").addClass("item-price")
            .css("color", "lightgoldenrodyellow")
            .html("Price: <strong style='color: white;'>$"+item.price+"</strong>");

        var add_delete_btn = $("<button></button>")
            .attr("id", "add-delete-" + item.item_id)
            .addClass("btn pull-right add-delete");

        add_delete_btn.appendTo(item_price_p);

        is_in_menu(item.item_id, current_menu.menu_id).done(function (is_in) {
            if (is_in) {
                add_delete_btn.text("Remove").addClass("btn-danger");
            } else {
                add_delete_btn.text("Add").addClass("btn-success");
            }
        }).fail(function() {
            // An error occurred
            add_delete_btn.text("Error").addClass("btn-warning disabled");
        });

        item_div.append(img_link).append(item_name_h3).append(item_price_p).appendTo(items_row_3);
    }

    function load_items() {
        $("#items-list").empty();

        var item_num = items.length;

        for (var i = 9 * current_page; i < Math.min(9 * current_page + 9, item_num); i = i + 3) {
            var items_row_3 = $("<div></div>").addClass("row items-row-3");

            // for each item
            var item = items[i];
            add_item_to_row(item, items_row_3);

            if (i + 1 < item_num) {
                item = items[i + 1];
                add_item_to_row(item, items_row_3);
            }

            if (i + 2 < item_num) {
                item = items[i + 2];
                add_item_to_row(item, items_row_3);
            }

            items_row_3.appendTo("#items-list");
        }

        // pagination
        paginate(item_num);
    }

    function paginate (item_num) {
        var pagination_ul = $(".pagination");
        pagination_ul.empty();
        pagination_ul.append('<li>' +
                                '<a class="previous-li">&laquo;</a>' +
                             '</li>' +
                             '<li>' +
                                '<a  class="next-li">&raquo;</a>' +
                             '</li>');

        var page_num = Math.floor(item_num / 9) + 1;
        if (item_num % 9 == 0) page_num --;
        for (i = 0; i < page_num; i++) {
            var new_page = $("<li><a id='page-"+ i +"'>" + (i + 1) + "</a></li>").addClass("page-li");
            new_page.insertBefore($(".next-li").parent("li"));
        }
    }

    function filter () {
        var input_val = $("#search-input").val();

        items = [];
        for (var i = 0; i < items_backup.length; i++) {
            var index = items_backup[i].item_name.toLowerCase().indexOf(input_val.toLowerCase());
            if (index > -1) {
                if (current_category == "all") {
                    items.push(items_backup[i]);
                } else {
                    if (items_backup[i].item_category == current_category) {
                        items.push(items_backup[i]);
                    }
                }
            }
        }

        current_page = 0;
    }

    $(function () {
        // hit enter on the keyboard when the cursor is in the searchbox input
        $('#search-input').keypress(function (e) {
            filter();
            load_items(items);
        });

        items = items_backup;
        load_items(items);
    });

    // hit the search button
    $(document).on("click", "#search-btn", function () {
        filter();
        load_items(items);
    });

    // hit link all-categories
    $(document).on("click", "#all-categories", function () {
        current_category = "all";
        filter();
        load_items(items);
    });

    // select a category
    $(document).on("click", ".filter-menu > li", function () {
        switch($(this).attr("id")) {
            case "filter-0":
                current_category = "0";
                filter();
                load_items();
                break;
            case "filter-1":
                current_category = "1";
                filter();
                load_items();
                break;
            case "filter-2":
                current_category = "2";
                filter();
                load_items();
                break;
            case "filter-3":
                current_category = "3";
                filter();
                load_items();
                break;
            case "filter-4":
                current_category = "4";
                filter();
                load_items();
                break;
            case "filter-all":
                current_category = "all";
                filter();
                load_items();
                break;
            default:
                break;
        }
    });

    // hit add-delete button
    $(document).on("click", ".add-delete", function () {
        var item_id = $(this).attr("id").substring(11);
        var menu_id = current_menu.menu_id;

        if ($(this).text() == "Add") {
            $(this).removeClass("btn-success").addClass("btn-danger").text("Remove");
            add_to_menu(item_id, menu_id).done(function (data) {
            }).fail(function() {
                // An error occurred
            });
        } else {
            $(this).removeClass("btn-danger").addClass("btn-success").text("Add");
            delete_from_menu(item_id, menu_id).done(function (data) {
            }).fail(function() {
                // An error occurred
            });
        }
    });

    // hit page-li list item
    $(document).on("click", ".page-li > a", function () {
        current_page = parseInt($(this).attr("id").substring(5));
        load_items();
    });

    // hit previous-li
    $(document).on("click", ".previous-li", function () {
        if (current_page > 0) {
            current_page --;
            load_items();
        }
    });

    // hit next-li
    $(document).on("click", ".next-li", function () {
        var item_num = items.length;
        var page_num = Math.floor(item_num / 9) + 1;
        if (item_num % 9 == 0) page_num --;
        if (current_page < page_num - 1) {
            current_page ++;
            load_items();
        }
    });

</script>

<!-- Page Header -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: white">Set the Menu
            <small style="color: lightgrey;">Restaurant staff only</small>
        </h1>
    </div>
</div>
<!-- /.row -->

<nav class="navbar navbar-default staff_nav" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Item Selector</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active"><a id="all-categories">All Categories</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter by Category <b class="caret"></b></a>
                <ul class="dropdown-menu filter-menu">
                    <li id="filter-0"><a>Appetizer</a></li>
                    <li id="filter-1"><a>Soup</a></li>
                    <li id="filter-2"><a>Beverage</a></li>
                    <li id="filter-3"><a>Meat</a></li>
                    <li id="filter-4"><a>Salad</a></li>
                    <li class="divider"></li>
                    <li id="filter-all"><a>All</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>

<div class="row search-row" style="margin-bottom: 50px;">
    <div class="col-sm-5 col-md-5 pull-right">
            <div class="input-group" style="width: 350px;">
                <input id="search-input" style="height: 40px;" type="text" class="form-control" placeholder="Search by item name">
                <div class="input-group-btn">
                    <button id="search-btn" style="height: 40px;" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
    </div>
</div>

<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
            <li class="previous-li">
                <a>&laquo;</a>
            </li>
            <li class="next-li">
                <a>&raquo;</a>
            </li>
        </ul>
    </div>
</div>

<hr>
<!-- /.row -->

<div id="items-list"></div>

<hr>

<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
            <li class="previous-li">
                <a>&laquo;</a>
            </li>
            <li class="next-li">
                <a>&raquo;</a>
            </li>
        </ul>
    </div>
</div>
<!-- /.row -->
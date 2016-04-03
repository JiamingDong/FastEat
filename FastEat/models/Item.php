<?php

/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/31/16
 * Time: 2:41 PM
 */
require_once ("database_connection.php");

class Item
{
    public $item_id;
    public $item_name;
    public $item_category;
    public $image_url;
    public $price;

    public static function get_all_items() {
        $query = "SELECT * FROM Items";
        $connection = get_connection();
        $resultSet = mysqli_query($connection, $query);

        $all_items = array();
        if ($resultSet && mysqli_num_rows($resultSet) > 0) {
            while($row = mysqli_fetch_assoc($resultSet)){
                $item = array();
                $item["item_id"] = $row["item_id"];
                $item["item_name"] = $row["item_name"];
                $item["item_category"] = $row["item_category"];
                $item["image_url"] = $row["image_url"];
                $item["price"] = $row["price"];

                array_push($all_items, $item);
            }
        }

        return $all_items;
    }

    public static function item_is_in_menu($item_id, $menu_id) {
        $check = "SELECT * FROM MenuItemRelations WHERE item_id = '$item_id' AND menu_id = '$menu_id'";
        $connection = get_connection();
        $result = mysqli_query($connection, $check);
        if ($result && mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function add_item_to_menu($item_id, $menu_id) {
        if (!self::item_is_in_menu($item_id, $menu_id)) {
            // item not in this menu
            $connection = get_connection();
            $insert_q = "INSERT INTO MenuItemRelations (menu_id, item_id) VALUES ('$menu_id', '$item_id')";
            mysqli_query($connection, $insert_q);
        }
    }

    public static function delete_item_from_menu($item_id, $menu_id) {
        if (self::item_is_in_menu($item_id, $menu_id)) {
            // item already in this menu
            $connection = get_connection();
            $delete_q = "DELETE FROM MenuItemRelations WHERE item_id = '$item_id' AND menu_id = '$menu_id'";
            mysqli_query($connection, $delete_q);
        }
    }

    public static function get_item_by_id($item_id) {
        $query = "SELECT item_id, item_name, item_category, image_url, price FROM Items WHERE item_id = '$item_id'";
        $connection = get_connection();
        $result = mysqli_query($connection, $query);

        return mysqli_fetch_object($result, "Item");
    }
}
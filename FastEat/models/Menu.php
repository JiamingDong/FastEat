<?php

/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/30/16
 * Time: 11:47 PM
 */
require_once ("database_connection.php");

class Menu
{
    public $menu_id;
    public $menu_name;
    public $image_url;
    public $menu_description;

    public static function get_all_menus() {
        $query = "SELECT * FROM Menus";
        $connection = get_connection();
        $resultSet = mysqli_query($connection, $query);

        $all_menus = array();
        if ($resultSet && mysqli_num_rows($resultSet) > 0) {
            while($row = mysqli_fetch_assoc($resultSet)){
                $menu = array();
                $menu["menu_id"] = $row["menu_id"];
                $menu["menu_name"] = $row["menu_name"];
                $menu["image_url"] = $row["image_url"];
                $menu["menu_description"] = $row["menu_description"];

                array_push($all_menus, $menu);
            }
        }

        return $all_menus;
    }

    public static function get_menu_by_id($menu_id) {
        $query = "SELECT menu_id, menu_name, image_url, menu_description FROM Menus WHERE menu_id = '$menu_id'";
        $connection = get_connection();
        $result = mysqli_query($connection, $query);

        return mysqli_fetch_object($result, "Menu");
    }

    public static function get_all_item_ids($menu_id) {
        $query = "SELECT * FROM MenuItemRelations WHERE menu_id = '$menu_id'";
        $connection = get_connection();
        $resultSet = mysqli_query($connection, $query);

        $all_item_ids = array();
        if ($resultSet && mysqli_num_rows($resultSet) > 0) {
            while ($row = mysqli_fetch_assoc($resultSet)) {
                $item_id = $row["item_id"];
                array_push($all_item_ids, $item_id);
            }
        }

        return $all_item_ids;
    }
}
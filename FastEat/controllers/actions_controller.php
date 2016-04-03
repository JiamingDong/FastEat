<?php
/**
 * Created by PhpStorm.
 * User: jiamingdong
 * Date: 3/31/16
 * Time: 10:27 PM
 */

require_once ("../services/data_service.php");

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'check_item_menu_mapping':
            echo item_in_menu($_POST['item_id'], $_POST['menu_id']);
            break;
        case 'add_item_to_menu':
            add_item($_POST['item_id'], $_POST['menu_id']);
            break;
        case 'delete_item_from_menu':
            delete_item($_POST['item_id'], $_POST['menu_id']);
            break;
        default:
            break;
    }

}

?>
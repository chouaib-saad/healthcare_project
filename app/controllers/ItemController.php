<?php

require_once 'BaseController.php';
require_once '../models/Item.php';

class ItemController extends BaseController
{
    public function addItem($name, $description, $price)
    {
        $item = new Item();
        return $item->addItem($name, $description, $price);
    }

    public function deleteItem($id)
    {
        $item = new Item();
        return $item->deleteItem($id);
    }

    public function getAllItems()
    {
        $item = new Item();
        return $item->getAllItems();
    }
}
?>

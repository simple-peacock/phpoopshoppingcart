<?php

namespace SimplePeacock;

class Item {

    private $id;
    private $price;
    private $name;

    public function getId() {
        return $this->id;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getName() {
        return $this->name;
    }
}

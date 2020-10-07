<?php

class Article
{
    private $_id = 0;
    private $_name = "";
    private $_description = "";
    private $_price = 0;
    private $_stock = 0;

    /**
     * __construct
     *
     * @param  int $id
     * @param  string $name
     * @param  string $description
     * @param  float $_price
     * @param  int $stock
     */
    public function __construct($id, $name, $description, $price, $stock)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->setStock($stock);
    }

    /**
     * setId
     * 
     * @param int $id
     * 
     */
    public function setId(int $id)
    {
        $this->_id = $id;
    }

    /**
     * setName
     * 
     * @param string $name
     * 
     */
    public function setName(string $name)
    {
        $this->_name = $name;
    }

    /**
     * setDescription
     *
     * @param string $description
     * 
     */
    public function setDescription(string $description)
    {
        $this->_description = $description;
    }

    /**
     * setPrice
     *
     * @param string $price
     * 
     */
    public function setPrice(string $price)
    {
        $this->_price = $price;
    }

    /**
     * setStock
     *
     * @param int $stock
     * 
     */
    public function setStock($stock)
    {
        $this->_stock = $stock;
    }
}

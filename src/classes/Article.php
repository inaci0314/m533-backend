<?php

class Article
{
    /**
     * $_id
     *
     * @var integer
     */
    private $_id = 0;

    /**
     * $_name
     *
     * @var string
     */
    private $_name = "";

    /**
     * $_description
     *
     * @var string
     */
    private $_description = "";

    /**
     * $_price
     *
     * @var integer
     */
    private $_price = 0;

    /**
     * $_stock
     *
     * @var integer
     */
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
     * getId
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->_id;
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
     * getName
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->_name;
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

    public function getDescription(): string
    {
        return $this->_description;
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

    public function getPrice(): float
    {
        return $this->_price;
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

    public function getSock(): int
    {
        return $this->_stock;
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

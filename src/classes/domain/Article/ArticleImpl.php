<?php

#region Required classes
require __DIR__ . '/Article.php';
#endregion

class ArticleImpl implements Article
{
    #region Properties
    /**
     * $_id
     *
     * @var integer
     */
    private $_id = 0;

    /**
     * $_categoryId
     *
     * @var integer
     */
    private $_categoryId = 0;

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

    #endregion

    /**
     * Creates a new article
     *
     * @param  int $id
     * @param  string $name
     * @param  int $categoryId
     * @param  string $description
     * @param  float $_price
     * @param  int $stock
     */
    public function __construct($id, $categoryId, $name, $description, $price, $stock)
    {
        $this->setId($id);
        $this->SetCategoryId($categoryId);
        $this->setName($name);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->setStock($stock);
    }


    #region Accessors

    /**
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * 
     * @return integer
     */
    public function getCategoryId(): int
    {
        return $this->_categoryId;
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->_name;
    }

    /**
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->_description;
    }

    /**
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->_price;
    }


    /**
     *
     * @return integer
     */
    public function getStock(): int
    {
        return $this->_stock;
    }

    #endregion

    #region Mutators

    /**
     * 
     * @param int $id
     * 
     */
    public function setId(int $id)
    {
        $this->_id = $id;
    }

    /**
     * 
     * 
     * @param int $categoryId
     * 
     */
    public function setCategoryId(int $categoryId)
    {
        $this->_categoryId = $categoryId;
    }

    /**
     * 
     * @param string $name
     * 
     */
    public function setName(string $name)
    {
        $this->_name = $name;
    }

    /**
     *
     * @param string $description
     * 
     */
    public function setDescription(string $description)
    {
        $this->_description = $description;
    }

    /**
     *
     * @param string $price
     * 
     */
    public function setPrice(string $price)
    {
        $this->_price = $price;
    }

    /**
     *
     * @param int $stock
     * 
     */
    public function setStock($stock)
    {
        $this->_stock = $stock;
    }

    #endregion
}

<?php

interface Article
{
    #region Accessors

    /**
     * Returns the id of the article
     *
     * @return integer
     */
    public function getId(): int;
    /**
     * Returns the name of the article
     *
     * @return string
     */
    public function getName(): string;
    /**
     * Returns the description of the article
     * 
     * @return string
     */
    public function getDescription(): string;
    /**
     * Returns the stock quantity of the article
     *
     * @return integer
     */
    public function getStock(): int;
    /**
     * Returns the price of the article
     *
     * @return float
     */
    public function getPrice(): float;
    /**
     * Returns the id of the article's category
     *
     * @return integer
     */
    public function getCategoryId(): int;

    #endregion

    #region Mutators

    /**
     * Sets the id of the article
     *
     * @param integer $id
     * @return void
     */
    public function setId(int $id);
    /**
     * Sets the name of the article
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name);
    /**
     * Sets the description of the article
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description);

    #endregion
}

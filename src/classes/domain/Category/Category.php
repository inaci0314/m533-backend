<?php

interface Category
{
    #region Accessors

    /**
     * Returns the id of the category
     *
     * @return integer
     */
    public function getId(): int;
    /**
     * Returns the name of the category
     *
     * @return string
     */
    public function getName(): string;

    #endregion

    #region Mutators

    /**
     * Sets the id of the category
     *
     * @param integer $id
     * @return void
     */
    public function setId(int $id);
    /**
     * Sets the name of the category
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name);

    #endregion
}

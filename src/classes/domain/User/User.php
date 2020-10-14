<?php

interface User
{
    #region Constants

    const USER_TYPE_STAFF = 1;
    const USER_TYPE_CUSTOMER = 2;

    #endregion

    #region Accessors

    /**
     * Returns the id of the user
     *
     * @return integer
     */
    public function getId(): int;
    /**
     * Returns the username of the user
     *
     * @return string
     */
    public function getUsername(): string;
    /**
     * Returns the first name of the user
     *
     * @return string
     */
    public function getFirstName(): string;
    /**
     * Returns the last name of the user
     *
     * @return string
     */
    public function getLastName(): string;
    /**
     * Returns the type of the user
     *
     * @return int
     */
    public function getType(): int;

    #endregion

    #region Mutators

    /**
     * Sets the id of the user
     *
     * @param integer $id
     */
    public function setId(int $id);
    /**
     * Sets the username of the user
     *
     * @param string $username
     */
    public function setUsername(string $username);
    /**
     * Sets the first name of the user
     *
     * @param string $firstName
     */
    public function setFirstName(string $firstName);
    /**
     * Sets the last name of the user
     *
     * @param string $lastName
     */
    public function setLastName(string $lastName);
    /**
     * Sets the type of the user
     * 
     * *Please use the class constants (ex.: User::USER_TYPE_CUSTOMER)*
     *
     * @param integer $type
     * @return void
     */
    public function setType(int $type);

    #endregion
}

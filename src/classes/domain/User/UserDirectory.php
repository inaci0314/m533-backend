<?php

abstract class UserDirectory
{
    #region Properties

    /**
     * Singleton instance
     *
     * @var UserDirectory
     */
    private $_instance = null;

    #endregion

    #region Accessors

    /**
     * Returns the list of all users
     *
     * @return User[]
     */
    public abstract function getAllUsers(): iterable;
    /**
     * Returns an user with the given id
     *
     * @param integer $id
     * @return User
     */
    public abstract function getUserById(int $id): ?User;

    #endregion

    #region Mutators

    /**
     * Adds an user to the directory
     *
     * @param User $user
     * @param string $password
     * @return void
     */
    public abstract function addUser(User $user, string $password);
    /**
     * Removes an user from the directory
     *
     * @param integer $userId
     * @return void
     */
    public abstract function removeUser(int $userId);

    #endregion
}

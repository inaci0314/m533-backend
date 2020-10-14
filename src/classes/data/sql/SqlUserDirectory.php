<?php

class SqlUserDirectory extends UserDirectory
{
    #region Properties

    /**
     * Connection Manager
     *
     * @var SqlConnectionManager
     */
    private $_connectionMgr = null;

    #endregion

    public function __construct(SqlConnectionManager $connectionMgr)
    {
        $this->setConnectionManager($connectionMgr);
    }

    #region Accessors

    public function getAllUsers(): iterable
    {
        $users = array();

        // TODO: Implement

        return $users;
    }

    public function getUserById(int $id): ?User
    {
        $user = null;

        // TODO: Implement

        return $user;
    }

    #endregion

    #region Mutators

    #region Inherited

    public function addUser(User $user, string $password)
    {
        // TODO: Implement
    }

    public function removeUser(int $id)
    {
        // TODO: Implement
    }

    #endregion

    /**
     * Sets the connection manager
     *
     * @param SqlConnectionManager $connectionMgr
     */
    public function setConnectionManager(SqlConnectionManager $connectionMgr)
    {
        $this->_connectionMgr = $connectionMgr;
    }

    #endregion
}

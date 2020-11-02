<?php

#region Required classes
require __DIR__ . '/../../domain/User/UserDirectory.php';
require __DIR__ . '/../../domain/User/UserImpl.php';
#endregion

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

    /**
     * Create a new SqlUserDirectory
     *
     * @param SqlConnectionManager $connectionMgr
     */
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

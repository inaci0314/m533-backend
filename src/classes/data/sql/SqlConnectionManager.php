<?php

class SqlConnectionManager
{
    #region Properties

    /**
     * @var PDO $_connection DB Connection
     */
    private $_connection = null;

    #endregion

    /**
     * Creates a new connection manager
     *
     * @param string $host
     * @param string $user
     * @param string $password
     */
    public function __construct(string $host, string $user, string $password)
    {
        // TODO: Implement
    }

    #region Accessors

    /**
     * Returns the DB connection
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->_connection;
    }

    #endregion

    #region Mutators



    #endregion
}

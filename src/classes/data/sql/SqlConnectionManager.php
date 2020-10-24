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
     * @param string $dbname
     * @param string $user
     * @param string $password
     */
    public function __construct(string $host, string $dbname, string $user, string $password)
    {
        $this->_connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
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

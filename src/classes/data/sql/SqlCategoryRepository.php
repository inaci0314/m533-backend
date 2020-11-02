<?php

#region Required classes
require __DIR__ . '/../../domain/Category/CategoryRepository.php';
require __DIR__ . '/../../domain/Category/CategoryImpl.php';
#endregion

class SqlCategoryRepository extends CategoryRepository
{
    #region Properties

    /**
     * Connection manager
     * 
     * @var SqlConnectionManager $_connectionMgr
     */
    private $_connectionMgr = null;

    /**
     * Name of the table in the DB
     * @var string $_tablename 
     */
    private $_tablename = "categories";

    #endregion

    /**
     * Create a new SqlCategoryRepository
     *
     * @param SqlConnectionManager $connectionMgr
     */
    public function __construct(SqlConnectionManager $connectionMgr)
    {
        $this->setConnectionManager($connectionMgr);
    }

    #region Accessors

    public function getAllCategories(): iterable
    {
        $con = $this->_connectionMgr->getConnection();

        $query = "SELECT * FROM " . $this->_tablename;
        $res = $con->query($query);

        // If there was an error, throw exception
        if (!$res) {
            throw new Exception();
        } else {
            // Build array
            $categories = array();
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $categories[] = new CategoryImpl($row['id'], $row['name']);
            }
        }

        return $categories;
    }

    public function getCategoryById(int $id): ?Category
    {
        $category = null;

        $con = $this->_connectionMgr->getConnection();

        $query = "SELECT * FROM " . $this->_tablename . " WHERE id = $id";
        $rs = $con->query($query);

        // If there was an error, throw exception
        if (!$rs) {
            throw new Exception(implode(", ", $con->errorInfo()));
        }

        if ($rs->rowCount() != 0) {
            $row = $rs->fetch(pdo::FETCH_ASSOC);
            // If result is not empty, create object
            if (isset($row["id"])) {
                $category = new CategoryImpl($row["id"], $row["name"]);
            }
        }

        return $category;
    }

    #endregion

    #region Mutators

    #region Inherited

    public function addCategory(Category $category): bool
    {
        $con = $this->_connectionMgr->getConnection();

        $query = "INSERT INTO ?(name) VALUES(?)";
        $stmt = $con->prepare($query);

        // If prepare failed throw exception
        if (!$stmt) {
            throw new Exception(implode(", ", $con->errorInfo()));
        }

        $stmt->bindValue(1, $this->_tablename);
        $stmt->bindValue(2, $category->getName());

        return $res = $stmt->execute();
    }

    public function removeCategory(int $id): bool
    {
        // TODO: Implement
        return false;
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

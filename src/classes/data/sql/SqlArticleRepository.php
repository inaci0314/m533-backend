<?php

#region Required classes
require __DIR__ . '/../../domain/Article/ArticleRepository.php';
require __DIR__ . '/../../domain/Article/ArticleImpl.php';
#endregion

class SqlArticleRepository extends ArticleRepository
{
    #region Properties

    /**
     * @var SqlConnectionManager $_connectionMgr Connection manager
     */
    private $_connectionMgr = null;

    /**
     * Name of the table in the DB
     * @var string $_tablename 
     */
    private $_tablename = "articles";

    #endregion

    /**
     * Create a new SqlArticleRepository
     *
     * @param SqlConnectionManager $connectionMgr
     */
    public function __construct(SqlConnectionManager $connectionMgr)
    {
        $this->setConnectionManager($connectionMgr);
    }

    #region Accessors


    public function getAllArticles(): iterable
    {
        $con = $this->_connectionMgr->getConnection();

        $query = "SELECT * FROM " . $this->_tablename;
        $rs = $con->query($query);

        // If there was an error, throw exception
        if (!$rs) {
            throw new Exception(implode(", ", $con->errorInfo()));
        }
        // Build array
        $articles = array();
        while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new ArticleImpl($row['id'], $row['category_id'], $row['name'], $row['description'], $row['price'], $row['price']);
        }


        return $articles;
    }

    public function getArticleById(int $id): ?Article
    {
        $article = null;

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
                $article = new ArticleImpl($row['id'], $row['category_id'], $row['name'], $row['description'], $row['price'], $row['price']);
            }
        }

        return $article;
    }

    public function getArticlesByCategory(int $categoryId): iterable
    {
        $articles = array();

        $con = $this->_connectionMgr->getConnection();

        $query = "SELECT * FROM " . $this->_tablename . " WHERE category_id = $categoryId;";
        $rs = $con->query($query);

        // If there was an error, throw exception
        if (!$rs) {
            throw new Exception(implode(", ", $con->errorInfo()));
        }

        // Build array
        $articles = array();
        while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new ArticleImpl($row['id'], $row['category_id'], $row['name'], $row['description'], $row['price'], $row['price']);
        }

        return $articles;
    }

    public function findArticlesByName(): iterable
    {
        $articles = array();

        // TODO: Implement

        return $articles;
    }

    #endregion

    #region Mutators

    #region Inherited

    public function addArticle(Article $article)
    {
        // TODO: Implement
    }

    public function removeArticle(int $articleId)
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

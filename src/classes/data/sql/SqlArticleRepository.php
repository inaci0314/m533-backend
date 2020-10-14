<?php

class SqlArticleRepository extends ArticleRepository
{
    #region Properties

    /**
     * @var SqlConnectionManager $_connectionMgr Connection manager
     */
    private $_connectionMgr = null;

    #endregion

    #region Accessors

    public function getAllArticles(): iterable
    {
        $articles = array();

        // TODO: Implement

        return $articles;
    }

    public function getArticleById(int $id): ?Article
    {
        $article = null;

        // TODO: Implement

        return $article;
    }

    public function getArticlesByCategory(int $categoryId): iterable
    {
        $articles = array();

        // TODO: Implement

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

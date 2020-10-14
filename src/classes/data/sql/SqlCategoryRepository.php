<?php

class SqlCategoryRepository extends CategoryRepository
{
    #region Properties

    /**
     * @var SqlConnectionManager $_connectionMgr Connection manager
     */
    private $_connectionMgr = null;

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
        $categories = array();

        return $categories;
    }

    public function getCategoryById(int $id): ?Category
    {
        $category = null;

        // TODO: Implement

        return $category;
    }

    #endregion

    #region Mutators

    #region Inherited

    public function addCategory(Category $category)
    {
        // TODO: Implement
    }

    public function removeCategory(int $id)
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

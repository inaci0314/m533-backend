<?php

abstract class CategoryRepository
{
    #region Properties

    /**
     * Singleton instance
     *
     * @var CategoryRepository
     */
    public static $_instance = null;

    #endregion

    #region Accessors

    /**
     * Returns the list of all categories
     *
     * @return Category[]
     */
    public abstract function getAllCategories(): iterable;
    /**
     * Returns an article with the given id
     *
     * @param integer $id
     * @return Category
     */
    public abstract function getCategoryById(int $id): ?Category;

    #endregion

    #region Mutators

    /**
     * Adds a category to the repository
     *
     * @param Category $category
     * @return bool result
     */
    public abstract function addCategory(Category $category): bool;
    /**
     * Removes a category from the repository
     *
     * @param integer $id
     * @return bool result
     */
    public abstract function removeCategory(int $id): bool;

    #endregion
}

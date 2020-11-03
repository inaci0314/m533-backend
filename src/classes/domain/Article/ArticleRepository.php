<?php

abstract class ArticleRepository
{
    #region Properties
    /**
     * Singleton instance
     *
     * @var ArticleRepository $instance
     */
    public static $instance = null;


    // TEST //
    /**
     * Used to facilitate the creation of the array representing an article
     *
     * @var array $articleDef
     */
    public $articleDef = array(
        "id" => "getId",
        "categoryId" => "getCategoryId",
        "name" => "getName",
        "description" => "getDescription",
        "stock" => "getStock",
        "price" => "getPrice"
    );
    // ---- //

    #endregion

    #region Accessors

    /**
     * Returns the list of all articles
     *
     * @return Article[]
     */
    public abstract function getAllArticles(): iterable;

    /**
     * Returns an article with the given id
     *
     * @param int $id
     * @return Article
     */
    public abstract function getArticleById(int $id): ?Article;

    /**
     * Returns a list of items of the given category
     *
     * @param int $categoryId
     * @return Article[]
     */
    public abstract function getArticlesByCategory(int $categoryId): iterable;

    /**
     * Returns a list of articles whose names match the search string
     *
     * @return Article[]
     */
    public abstract function findArticlesByName(): iterable;

    #endregion

    #region Mutators

    /**
     * Adds an article to the repository
     *
     * @param Article $article
     * @return void
     */
    public abstract function addArticle(Article $article);


    /**
     * Removes the article wih the given id from the repository
     *
     * @param integer $articleId
     * @return void
     */
    public abstract function removeArticle(int $articleId);

    #endregion
}

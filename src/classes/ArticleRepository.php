<?php

abstract class ArticleRepository
{
    /**
     * Singleton instance
     *
     * @var ArticleRepository $instance
     */
    public static $instance = null;

    /**
     * Returns the list of all articles
     *
     * @return Article[]
     */
    public abstract function getAllArticles();

    /**
     * Returns a list of items of the given category
     *
     * @param int $categoryId
     * @return Article[]
     */
    public abstract function getArticlesByCategory(int $categoryId);

    /**
     * Returns a list of articles whose names match the search string
     *
     * @return Articles[]
     */
    public abstract function getArticlesByName();

    /**
     * returns an article with the given id
     *
     * @param int $id
     * @return Article
     */
    public abstract function getArticleById(int $id);


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
}

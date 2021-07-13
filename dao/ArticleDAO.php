<?php

include_once '../entities/Article.php';
include_once '../database/DB.php';
include_once 'DAO.php';

class ArticleDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getArticles(
        ?int $articleId,
        ?string $title,
        ?string $content
    ): array {
        $selectQuery = $this->buildSelectQuery($articleId, $title, $content);
        $params = $this->buildParams($articleId, $title, $content);

        $statement = $this->query($selectQuery, $params);
        $statement->setFetchMode(
            PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
            'Article'
        );
        $articles = $statement->fetchAll();
        $statement->closeCursor();

        return $articles;
    }

    private function buildSelectQuery(
        ?int $articleId,
        ?string $title,
        ?string $content
    ): string {
        $selectAllQuery = 'select * from articles';

        $whereConditions = [];
        if ($articleId != null) {
            array_push($whereConditions, 'article_id = :articleId');
        }
        if ($title != null) {
            array_push($whereConditions, 'title = :title');
        }
        if ($content != null) {
            array_push($whereConditions, 'content = :content');
        }

        if (count($whereConditions) === 0) {
            return $selectAllQuery;
        }

        $whereConditionString = join(' and ', $whereConditions);
        $selectQuery = "{$selectAllQuery} where {$whereConditionString}";
        return $selectQuery;
    }

    private function buildParams(
        ?int $articleId,
        ?string $title,
        ?string $content
    ): array {
        $params = [];
        if ($articleId !== null) {
            $params[':articleId'] = $articleId;
        }
        if ($title !== null) {
            $params[':title'] = $title;
        }
        if ($content !== null) {
            $params[':content'] = $content;
        }
        return $params;
    }

    public function getArticleById(int $articleId): ?Article
    {
        $articles = $this->getArticles($articleId, null, null);
        if (count($articles) === 0) {
            return null;
        }
        return $articles[0];
    }

    public function getAllArticles(): array
    {
        return $this->getArticles(null, null, null);
    }

    public function createArticle(string $title, string $content)
    {
        $query = '
            insert into articles(title, content) 
            value (:title, :content)';
        $params = [
            ':title' => $title,
            ':content' => $content,
        ];
        $this->query($query, $params);
    }
}

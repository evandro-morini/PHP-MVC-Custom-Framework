<?php

namespace Framework\Model;

use Framework\Model\Conn;
use Framework\Model\Article;
use Framework\Model\AuthorDAO;

/*
 * Data Access Object for Article Entity
 * @access public
 * @author Evandro Morini
 */
class ArticleDAO {
    
    private $conn;
    
    public function __construct()
    {
        $this->conn = Conn::getInstance();
    }
    
    /**
     * Select Articles from the Database
     * @param $id
     * @return Author 
     */
    public function load($id = null)
    {
        
        $articles = [];
        
        try 
        {
            $query = "
                SELECT
                    id,
                    title,
                    content,
                    publish_date,
                    author_id
                FROM article
            ";
            
            if(!empty($id)) 
            {
                $query .= " WHERE id = :id"; 
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
            } else {
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
            }

            $result = $stmt->fetchAll();
            
            foreach( $result as $row ) {
                $article = new Article();
                $article->setId($row['id']);
                $article->setTitle($row['title']);
                $article->setContent($row['content']);
                $article->setPublishDate($row['publish_date']);
                
                $authorDAO = new AuthorDAO();
                $author = $authorDAO->load($row['author_id']);
                $article->setAuthor($author);
                
                $articles[] = $article;
            }
            
            if(count($result) == 1 && !empty($id))
            {
                return $article;
            } else {
                return $articles;
            }

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }
    
    /**
     * Insert an Article Object on Database
     * @param Author
     * @return integer 
     */
    public function insert(Article $article)
    {
        try 
        {
            $stmt = $this->conn->prepare("
                INSERT INTO article (
                    title,
                    content,
                    publish_date,
                    author_id
                ) VALUES (
                    :title
                    , :content
                    , NOW()
                    , :author_id
                )
            ");
            
            $author = $article->getAuthor();
            
            $stmt->execute(
                [
                    ':title'=> $article->getTitle(),
                    ':content'=> $article->getContent(),
                    ':author_id'=> $author->getId()
                ]
            );
            
            return $this->conn->lastInsertId();
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
    }
    
    /**
     * Update an Article Object on Database
     * @param Author
     */
    public function update(Article $article)
    {
        try
        {
            $stmt = $this->conn->prepare("
                UPDATE Article SET
                    title = :title,
                    content = :content,
                    publish_date = NOW(),
                    author_id = :author_id
                WHERE id = :id
            ");
            
            $author = $article->getAuthor();

            $stmt->execute(
                [
                    ':id' => $article->getId(),
                    ':title'=> $article->getTitle(),
                    ':content'=> $article->getContent(),
                    ':author_id'=> $author->getId()
                ]
            );
        } catch(PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    /**
     * Delete an Article on Database
     * @param integer
     */
    public function delete($id)
    {
        try 
        {
            $stmt = $this->conn->prepare('DELETE FROM article WHERE id = :id');
            
            $stmt->execute([':id'=> $id]);
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
    }
    
}


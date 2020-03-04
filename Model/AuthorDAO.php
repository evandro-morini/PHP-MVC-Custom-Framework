<?php

namespace Framework\Model;

use Framework\Model\Conn;
use Framework\Model\Author;

/*
 * Data Access Object for Author Entity
 * @access public
 * @author Evandro Morini
 */
class AuthorDAO {
    
    private $conn;
    
    public function __construct()
    {
        $this->conn = Conn::getInstance();
    }
    
    /**
     * Select Authors from the Database
     * @param $id
     * @return Author 
     */
    public function load($id = null)
    {
        
        $authors = [];
        
        try 
        {
            $query = "
                SELECT
                    id,
                    name,
                    email,
                    pwd,
                    bio,
                    birth_date
                FROM author
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
                $author = new Author();
                $author->setId($row['id']);
                $author->setName($row['name']);
                $author->setEmail($row['email']);
                $author->setPwd($row['pwd']);
                $author->setBio($row['bio']);
                $author->setBirthDate($row['birth_date']);
                $authors[] = $author;
            }
            
            if(count($result) == 1 && !empty($id))
            {
                return $author;
            } else {
                return $authors;
            }

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }
    
    /**
     * Insert an Author Object on Database
     * @param Author
     * @return integer 
     */
    public function insert(Author $author)
    {
        try 
        {
            $stmt = $this->conn->prepare("
                INSERT INTO author (
                    name,
                    email,
                    pwd,
                    bio,
                    birth_date
                ) VALUES (
                    :name
                    , :email
                    , :pwd
                    , :bio
                    , :birth_date
                )
            ");
            
            $stmt->execute(
                [
                    ':name'=> $author->getName(),
                    ':email'=> $author->getEmail(),
                    ':pwd'=> $author->getPwd(),
                    ':bio'=> (!empty($author->getBio()) ? $author->getBio() : null),
                    ':birth_date'=> (!empty($author->getBirthDate()) ? $author->getBirthDate() : null)
                ]
            );
            
            return $this->conn->lastInsertId();
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
    }
    
    /**
     * Update an Author Object on Database
     * @param Author
     */
    public function update(Author $author)
    {
        try
        {
            $stmt = $this->conn->prepare("
                UPDATE author SET
                    name = :name,
                    email = :email,
                    pwd = :pwd,
                    bio = :bio,
                    birth_date = :birth_date
                WHERE id = :id
            ");

            $stmt->execute(
                [
                    ':id' => $author->getId(),
                    ':name'=> $author->getName(),
                    ':email'=> $author->getEmail(),
                    ':pwd'=> $author->getPwd(),
                    ':bio'=> (!empty($author->getBio()) ? $author->getBio() : null),
                    ':birth_date'=> (!empty($author->getBirthDate()) ? $author->getBirthDate() : null)
                ]
            );
        } catch(PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    /**
     * Delete an Author on Database
     * @param integer
     */
    public function delete($id)
    {
        try 
        {
            $stmt = $this->conn->prepare('DELETE FROM author WHERE id = :id');
            
            $stmt->execute(
                [':id'=> $id]
            );
            
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
    }
    
    /**
     * Get an Author by email
     * @param $id
     * @return Author 
     */
    public function getAuthorByEmail($email)
    {
        
        $author = [];
        
        try 
        {
            $query = "
                SELECT
                    id,
                    name,
                    email,
                    pwd,
                    bio,
                    birth_date
                FROM author
                WHERE email = :email
                LIMIT 1
            ";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $result = $stmt->fetchAll();
            
            foreach( $result as $row ) {
                $author = new Author();
                $author->setId($row['id']);
                $author->setName($row['name']);
                $author->setEmail($row['email']);
                $author->setPwd($row['pwd']);
                $author->setBio($row['bio']);
                $author->setBirthDate($row['birth_date']);
            }
            
            return $author;

        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }
    
}


<?php

namespace Framework\Controller;

use Framework\Config\Dispatch;
use Framework\Model\Article;
use Framework\Model\ArticleDAO;
use Framework\Model\AuthorDAO;


/*
 * ArticleController
 * @access public
 * @author Evandro Morini
 */
class ArticleController 
{
    public function showArticle($id)
    {
        $articleDAO = new ArticleDAO();
        $article = $articleDAO->load($id);

        $dispatch = new Dispatch();
        $dispatch->render(
            'single_article', [
                'article' => $article
            ]
        );
        
    }
    
    public function newArticle($request)
    {
        
        $dispatch = new Dispatch();
        
        if(isset($_SESSION['login']))
        {
            if(!empty($request))
            {
                try
                {
                    $article = new Article();
                    $article->setTitle($request['title']);
                    $article->setContent($request['content']);

                    $authorDAO = new AuthorDAO;
                    $author = $authorDAO->load($_SESSION['author_id']);
                    $article->setAuthor($author);

                    $articleDAO = new ArticleDAO();
                    $articleDAO->insert($article);

                    $dispatch->render(
                        'new_article', [
                            'success' => 1
                        ]
                    );
                }
                catch (Exception $e)
                {
                    $dispatch->render(
                        'new_article', [
                            'success' => 2
                        ]
                    );
                }
            }
            else
            {
                $dispatch = new Dispatch();
                $dispatch->render(
                    'new_article', []
                );
            }
        }
        else
        {
            $dispatch->render('login', ['error' => 'You need to log in first!']);
        }
    }
    
    public function deleteArticle($id)
    {
        $articleDAO = new ArticleDAO();
        $articleDAO->delete($id);
        
        $authorDAO = new AuthorDAO();
        $authors = $authorDAO->load();

        $articles = $articleDAO->load();
        
        $dispatch = new Dispatch();
        $dispatch->render('management', [
            'authors' => $authors,
            'articles' => $articles
        ]);
        
    }
    
    public function editArticle($id, $request)
    {
        
        $dispatch = new Dispatch();
        
        if(isset($_SESSION['login']))
        {
            $articleDAO = new ArticleDAO();
            $authorDAO = new AuthorDAO;
            $authors = $authorDAO->load();
            
            if(!empty($request))
            {
                try
                {
                    $updatedArticle = new Article();
                    $updatedArticle->setId($request['id']);
                    $updatedArticle->setTitle($request['title']);
                    $updatedArticle->setContent($request['content']);

                    $author = $authorDAO->load($request['author']);
                    $updatedArticle->setAuthor($author);

                    $articleDAO->update($updatedArticle);

                    $dispatch->render(
                        'edit_article', [
                            'article' => $updatedArticle,
                            'authors' => $authors,
                            'success' => 1
                        ]
                    );
                }
                catch (Exception $e)
                {
                    $dispatch->render(
                        'edit_article', [
                            'article' => [],
                            'authors' => $authors,
                            'success' => 2
                        ]
                    );
                }
            }
            else
            {
                $actualArticle = $articleDAO->load($id);
                $dispatch = new Dispatch();
                $dispatch->render(
                    'edit_article', [
                        'article' => $actualArticle,
                        'authors' => $authors,
                    ]
                );
            }
        }
        else
        {
            $dispatch->render('login', ['error' => 'You need to log in first!']);
        }
    }
    
}

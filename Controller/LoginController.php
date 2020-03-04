<?php

namespace Framework\Controller;

use Framework\Config\Dispatch;
use Framework\Model\AuthorDAO;
use Framework\Model\ArticleDAO;


/*
 * LoginController
 * @access public
 * @author Evandro Morini
 */
class LoginController 
{
    public function login($params)
    {
        
        $dispatch = new Dispatch();
        
        if(empty($params))
        {
            $dispatch->render('login', []);
        } else {
            try
            {
                $authorDAO = new AuthorDAO();
                $author = $authorDAO->getAuthorByEmail($params['email']);
                
                if(empty($author))
                {
                    $dispatch->render('login', ['error' => 'User not found!']);
                } else {
                    if(password_verify($params['password'], $author->getPwd())) 
                    {
                        $_SESSION['login'] = true;
                        $_SESSION['author_id'] = $author->getId();
                        $_SESSION['author_name'] = $author->getName();
                        
                        $articleDAO = new ArticleDAO();
                        $articles = $articleDAO->load();
                        $dispatch->render(
                            'main_page', [
                                'articles' => $articles
                            ]
                        );
                    } else {
                        $dispatch->render('login', ['error' => 'Wrong Password!']);
                    }

                }
            } catch (Exception $e) {
                $dispatch->render('login', ['error' => 'Error on Login!']);
            }
        }
    }
    
    public function logout()
    {
        session_start();
        session_destroy();
        $dispatch = new Dispatch();
        $dispatch->render('login', []);
    }
}

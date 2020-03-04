<?php

namespace Framework\Controller;

use Framework\Config\Dispatch;
use Framework\Model\ArticleDAO;

/*
 * IndexController
 * @access public
 * @author Evandro Morini
 */
class IndexController 
{
    /*
     * Render Main Page
     **/
    public static function view() 
    {
        $articleDAO = new ArticleDAO();
        $articles = $articleDAO->load();

        $dispatch = new Dispatch();
        $dispatch->render(
            'main_page', [
                'articles' => $articles
            ]
        );
    }
    
}
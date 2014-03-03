<?php
/**
 * This file handles the retrieval and serving of news articles
 */
class Comments_Controller
{
    /**
     * This template variable will hold the 'view' portion of our MVC for this 
     * controller
     */
    public $template = 'comments';
    public $request;
    private $comments;
    private $view;
    private $article_helper_arr = array();
    private $articlesModel;
    private $req_Article;
    
    public function __construct(){
               
               
             
              $this->article_helper_arr['articlelist'] =  SERVER_ROOT. '/views/helper/articles/articlelist.php';
              $this->article_helper_arr['showarticle'] = SERVER_ROOT . '/views/helper/articles/showarticle.php';
              $this->article_helper_arr['comments'] = SERVER_ROOT . '/views/helper/articles/comments.php';
             
    }
   
        
    public function addComment(){
        
        $commentsModel = new Comments_Model(new classes_request_RequestController());
        $this->view = new View_Model('articles');
        
        //create a new view and pass it our template
        //$this->view = new View_Model($this->template);
        // get all articles keys
         $this->articlesModel = new Articles_Model;
         $this->articles = $this->articlesModel->get_articles();                            
        
         foreach($this->articles as &$article){
             $article['title'] = $article['Article_Title']; 
             $article['articleUrl'] =  ARTICLES_ROOT . '/' . $article['Article_Content_Identifier'] . '.htm';
         } 
         unset($article);
         
          // assigning article array keys 
        $this->view->assign('article_list' , $this->articles); 
         
        
        $this->request = new classes_request_RequestController();
        //create a new view and pass it our template
        //$this->view = new View_Model($this->template);
        
        $valivation_context = new classes_validation_ValidatorContext();
        $email = $this->request->obtainValue('email');
        $valivation_context->addValidator(new classes_validation_ValidateEmailAddress($email));
        $name = $this->request->obtainValue('name');
        $valivation_context->addValidator(new classes_validation_ValidateAlphabet($name));
        $valivation_context->validate();
        $validation_error_msgs = $valivation_context->getErrorMsgs();
        
        if($validation_error_msgs){
            $this->req_Article = $this->request->obtainValue('title');
            $article = $getVars['articles'];
            
            $this->articlesModel = new Articles_Model();
            //get an article
            $article = $this->articlesModel->get_article($this->req_Article);
           
            //assign article data to view
            $this->view->assign('id' , $article['id']);
            $this->view->assign('articlekey' , $article['Article_Id']);
            $this->view->assign('title' , $article['Article_Title']);
            $this->view->assign('articleUrl' ,  ARTICLES_ROOT . '/' . $article['Article_Content_Identifier'] . '.htm');
    
            //get an article
            $article = $this->articlesModel->get_article($this->req_Article);
            $this->request = new classes_request_RequestController();
            $commentsModel = new Comments_Model($this->request);
            $comments = $commentsModel->get_comments_by_article_id( $article['Article_Id']);
        
            $this->view->assign('comments' , $comments);
            /* post url for adding comment to this article */
            $this->view->assign('addcomment_url' , SITE_ROOT. '/comments/addcomment/?article_id=' . $article['Article_Id']);
            return;      
        }
        
        $commentsModel = new Comments_Model($this->request); 
        $commentsModel->add();
        $title = $this->request->obtainValue('title');
        
        
        //url forwarding
        $newURL = SITE_ROOT . '/articles/' . $title ;  
        //print_r($newURL);
        //exit();
        
        header('Location: '. $newURL ) ;
        die();
    }
    
}
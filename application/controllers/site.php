<?php
class site extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model("myModel");
    }
    
    function createTables() {
        $this->myModel->createTables();
    }
    
    function deleteContact() {
        
        $this->myModel->updateContact();
        $this->contacts();
    }
    
    function updateContact() {
        
        $this->myModel->updateContact();
        $this->contacts();
    }
    
    function createContact() {
        
        $this->myModel->updateContact();
        $this->contacts();
    }
    
    function createArticle() {
        
        $this->myModel->createArticle();
        $this->home();
    }
    
    function selectContact() {
        $this->myModel->selectContact($this->uri->segment(3));
        $this->postView();
    }
    
    function selectArticle() {
        $this->myModel->selectArticle($this->uri->segment(3));
        $this->load->view("includes/header");
        $this->load->view("article");
        $this->load->view("includes/footer");
    }
            
    function contactInfo() {
        if (isset($_POST['save'])) {
            $this->myModel->createContact();
            $this->contacts();
        }
        if (isset($_POST['update'])) {
            $this->myModel->updateContact();
            $this->reset();
            $this->contacts();
        }
        
        if (isset($_POST['delete'])) {
            $this->myModel->deleteContact();
            $this->reset();
            $this->contacts();
        }
    }
    
    function index(){
        if (!isset($_SESSION["message"])) {
            $this->reset();
        }
        $data['articles'] = $this->myModel->getArticles();
        $this->load->view("includes/header");
        $this->load->view("home", $data);
        $this->load->view("includes/footer");
    }
    
    function about(){
        $this->load->view("includes/header");
        $this->load->view("about");
        $this->load->view("includes/footer");
    }
    
    function myNews(){
        $this->load->view("includes/header");
        $this->load->view("myNews");
        $this->load->view("includes/footer");
    }
    
    function editor(){
        $this->load->view("includes/header");
        $this->load->view("editor");
        $this->load->view("includes/footer");
        
    }
    
    function saveArticle() {
        if (isset($_POST['save'])) {
            $this->myModel->createArticle();
            $this->index();
        }
    }
    
    function logon(){
        $this->load->view("includes/header");
        $this->load->view("logon");
        $this->load->view("includes/footer");
    }
    
    function logonCheck(){
        if (isset($_POST['register'])) {
            $this->myModel->register();
            $this->logon();
        }
        if (isset($_POST['logon'])) {
            if ($this->myModel->logon() == true) {
                $this->reset();
                $this->index();
            } else {
                $this->logon();
            }
            
        }
    }
    
    function reset() {
        $_SESSION["lastName"] = "";
        $_SESSION["firstName"] = "";
        $_SESSION["contactID"] = "";
        $_SESSION["userName"] = "";
        $_SESSION["password"] = "";
        $_SESSION["password2"] = "";
        $_SESSION["email"] = "";
        $_SESSION["message"] = "";
        $_SESSION["title"] = "";
        $_SESSION["article"] = "";
        $_SESSION["author"] = "";
    }
            
    function contacts(){
        $data['contacts'] = $this->myModel->getContacts();
        $this->load->view("includes/header");
        $this->load->view("contacts",$data);
        $this->load->view("includes/footer");
    }
    
    function articles() {
        $data['articles'] = $this->myModel->getArticles();
        $this->load->view("includes/header");
        $this->load->view("home",$data);
        $this->load->view("includes/footer");
    }
    
    function postView() {
        $data['articles'] = $this->myModel->getArticles();
        $this->load->view("includes/header");
        $this->load->view("article",$data);
        $this->load->view("includes/footer");
    }

}
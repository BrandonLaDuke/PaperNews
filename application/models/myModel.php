<?php
    class myModel extends CI_Model {
        
        function register() {
            
            $_SESSION["userName"] = $_POST['userName'];
            $_SESSION["email"] = $_POST['email'];
            
            if (strlen($_POST["userName"]) < 1) {
                    $_SESSION["message"] = "<p>User Name required</p>";
                    return(false);
            }

            if (strlen($_POST['password2']) > 0) {
                if ($_POST['password2'] != $_POST['password']) {
                    $_SESSION["message"] = "<p>Passwords must match.</p>";
                    return(false);
                }
                if (strlen($_POST['email']) < 1) {
                    $_SESSION["message"] = "<p>Email Address is required.</p>";
                    return(false);
                }
                
                $sql = "insert into users (userName, password, email)"
                    ."values ('"
                    .$_POST['userName']."','"
                    .$_POST['password']."','"
                    .$_POST['email']."');";
                if ($this->db->query($sql) == true) {
                    $_SESSION["message"] = "<p>Thank you for registering. Please Login.</p>";
                    return(true);
                }
                
            }
            $_SESSION["message"] = "<p>Invaild Registration.</p>";
            return(false);
        }
        
        function logon() {
            
            $_SESSION["userName"] = $_POST['userName'];
            $_SESSION["email"] = $_POST['email'];

            // Check for valid userName
            $sql = "Select ID from users "
                    ." where userName = '".$_POST["userName"]
                    ."' and password = '".$_POST["password"]."';";
            $ds = $this->db->query($sql);
            if ($ds->num_rows() != 1) {
                $_SESSION["message"] = "Invalid Login";
                return(false);
            }
            $user = $ds->row();
            $_SESSION["userId"] = $user->ID;
            return(true);
        }
        
        function selectContact($ID) {
            $sql = "Select ID from articles "
                    ." where title = ".$_POST["title"].
                    " and author = ".$_POST["author"];
            $ds = $this->db->query($sql);
            $contact = $ds->row();
            $articles = $ds->row();
            $_SESSION["title"] = $articles->title;
            $_SESSION["author"] = $articles->author;
            $_SESSION["article"] = $articles->article;
            $_SESSION["ID"] = $ID;
        }
                 
        function selectArticle($ID) {
            $sql = "Select title, author, article from articles "
                    ." where ID = ".$ID;
            $ds = $this->db->query($sql);
            $articles = $ds->row();
            $_SESSION["title"] = $articles->title;
            $_SESSION["author"] = $articles->author;
            $_SESSION["article"] = $articles->article;
            $_SESSION["ID"] = $ID;
        }
        
        function deleteContact() {
            $sql = "delete from contacts "
                    ." where id = ".$_SESSION["contactID"];
            $ds = $this->db->query($sql);
        }
        
        function updateContact() {
            $sql = "update contacts set lastName = '".
                    $_POST["lastName"]."', firstName = '".
                    $_POST["firstName"]."' "
                    ." where id = ".$_SESSION["contactID"];
            $ds = $this->db->query($sql);
        }
        
        function getContacts() {
            $sql = "Select ID, lastName, firstName from contacts "
                    ." order by lastName, firstName";
            $ds = $this->db->query($sql);
            return $ds->result();
        }
        
        function getArticles() {
            $sql = "Select ID, title, article, author from articles "
                    ." order by ID desc";
            $ds = $this->db->query($sql);
            return $ds->result();
        }
        
        function createArticle() {
            $tmp=$_POST['article'];
            $tmp1= str_replace("'", "`", $_POST['title']);
            $tmp2= str_replace("'", "`", $_POST['article']);
            $tmp3= str_replace("'", "`", $_POST['author']);
            
            $sql = "insert into articles (title, article, author)" 
                   ."values ('"
                    .$tmp1."','"
                    .$tmp2."','"
                    .$tmp3."');";
            $this->db->query($sql);
        }
        
        function createContact() {
            $sql = "insert into contacts (lastName, firstName)"
                    ."values ('"
                    .$_POST['lastName']."','"
                    .$_POST['firstName']."');";
            $this->db->query($sql);
        }
        
        function createTables(){
        
            $sql = "CREATE TABLE IF NOT EXISTS `ci_sessions` (".
            "`id` varchar(40) NOT NULL,".
            "`ip_address` varchar(45) NOT NULL,".
            "`timestamp` int(10) unsigned DEFAULT 0 NOT NULL,".
            "`data` blob NOT NULL,".
            " PRIMARY KEY (id),".
            " KEY `ci_sessions_timestamp` (`timestamp`));";
            $this->db->query($sql);
        
            $sql = "Drop table if exists  `contacts`  ";
            $this->db->query($sql);
            
            $sql = "Create table contacts ( "
                . "id int(6) unsigned auto_increment primary key, "
                . " lastName varchar(100) null,"
                . " firstName varchar(30) null );" ;  
            $this->db->query($sql);
            
            $sql = "Drop table if exists  `articles`  ";
            $this->db->query($sql);
            
            $sql = "Create table articles ( "
                . "id int(6) unsigned auto_increment primary key, "
                . " title varchar(1000) null,"
                . " article text null,"
                . " author varchar(40) null );" ;  
            $this->db->query($sql);
            
            $sql = "Drop table if exists  `users`  ";
            $this->db->query($sql);
            
            $sql = "Create table users ( "
                . "id int(6) unsigned auto_increment primary key, "
                . " userName varchar(50) null,"
                . " password varchar(100) null,"
                . " email varchar(100) null );" ;  
            $this->db->query($sql);
      
            echo "Tables created and test data loaded";
        }
    }
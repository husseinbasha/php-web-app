<?php
//connect to local server
$server = "localhost";
$username = "root";
$password = "";
$dbname = "babab";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}
$mysqli = new mysqli($server, $username, $password, $dbname);

//connect to google cloud sql
// Instantiate your DB using the database name, socket, username, and password
// $server="34.107.57.245";
// $dbName = 'babab';
// $dbUser = 'root';
// $dbPass = '';
// $dbSocket = '/cloudsql/lunar-geography-292307:europe-west3:phpwebapp';
// $mysqli = new mysqli($server, $dbUser, $dbPass, $dbName, null, $dbSocket);


/***************** *
 ***************
 **************
    checkout an example on article page from line: 100 to know 
    how to work with these functions
 **************
 ***************
 ******************** */

//remeber to write $mysqli->close(); after using functions that
//returns objects or arrays





/**USERS */

//@DESC GETS THE USER ROW FROM THE DATABASE
//@COLUMNS  uid , username , email , password ,pic
function getCurrentUser($mysqli)
{
    if (isset($_COOKIE["id"])) {
        $id = $_COOKIE['id'];
        $select = "select * from users where uid =$id";

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        $res = $mysqli->query($select);
          if ($res->num_rows > 0) {
        return $res;
    }
    }
}
function getSignedupUser($mysqli, $username, $email)
{

    $select = "select * from users where username = '$username' && email ='$email'";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $res = $mysqli->query($select);
    if ($res->num_rows > 0) {
        return $res;
    }
}
//@DESC GETS THE USER ROW FROM THE DATABASE WITH ID
//@COLUMNS  uid , username , email , password ,pic
function getUserWithID($mysqli, $id)
{

    $select = "select * from users where uid = $id";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    $res = $mysqli->query($select);
    if ($res->num_rows > 0) {
        return $res;
    }
    //if it returns false it means there were an error
    //ECHO THIS TO SHOW ERROR $res->error
}


//**ARTICLES */


//@DESC GET articles count
//@COLUMNS  id , uid , author , content , title

function getArticlesCount($mysqli){
    $select = "SELECT COUNT(*) FROM article";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $res = $mysqli->query($select);
    if ($res->num_rows > 0) {
        return $res;
    }
}





//@DESC GETS ARTICLES WITH LIMIT
//@COLUMNS  id , uid , author , content , title
//@USEFUL LINK FOR PAGINATION https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
function getArticlePage($mysqli, $off , $per_page)
{

    $select = "SELECT * FROM article LIMIT $off , $per_page";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } else {
        $res = $mysqli->query($select);
        if ($res->num_rows > 0) {
            return $res;
        }
    }
}
function getArticleSearch($mysqli, $key)
{

    $select = "SELECT * FROM article where  title or content like '%$key%' ";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } else {
        $res = $mysqli->query($select);
        if ($res->num_rows > 0) {
            return $res;
        }else {
            return $res;
        }
    }
}
function getArticlePageSortDesc($mysqli, $off , $per_page)
{

    $select = "SELECT * FROM article ORDER BY date_published DESC limit $off , $per_page ";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } else {
        $res = $mysqli->query($select);
        if ($res->num_rows > 0) {
            return $res;
        }
    }
}
function getArticlePageSortAcen($mysqli, $off , $per_page)
{

    $select = "SELECT * FROM article order by asc LIMIT $off , $per_page ";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } else {
        $res = $mysqli->query($select);
        if ($res->num_rows > 0) {
            return $res;
        }
    }
}
//@DESC GETS ARTICLES WITH 
//@COLUMNS  id , uid , author , content , title
function getArticles($mysqli)
{

    $select = "select * from article ";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } else {
        $res = $mysqli->query($select);
        if ($res->num_rows > 0) {
            return $res;
        }
    }
}
function getUserArticles($mysqli)
{

    $select = "select * from article ";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } else {
        $res = $mysqli->query($select);
        if ($res->num_rows > 0) {
            return $res;
        }
    }
}
//@DESC ADD Article
//@COLUMNS  `date_published`, `author`, `title`, `content`, `id`, `uid` 
//@DESC THE UID CAN BE BROUGHT THROUGH COOKIES 
function addArticle($mysqli, $uid,  $author, $title, $content)
{

    $select = "INSERT INTO `article`( `author`, `title`, `content`,  `uid`) VALUES ( '$author', '$title' , '$content' , $uid)";
    if ($mysqli->connect_error) {
        echo("Connection failed: " . $mysqli->connect_error);
    }
         if( $mysqli->query($select) === TRUE){
            return $mysqli->insert_id;
         }else{
            echo $mysqli->error;
         }
        
       
          
    
}
//@DESC GETS THE ARTICLE FROM THE DATABASE
//@COLUMNS  id , uid , author , content , title , timestamp
function getArticle($mysqli, $id)
{

    $select = "select * from article where id = $id";

    if ($mysqli->connect_error) {

        die("Connection failed: " . $mysqli->connect_error);
    } else {
        
        $res = $mysqli->query($select);
        if ($res->num_rows > 0) {
            return $res;
        }
    }
}


//@DESC DELETES USER FROM THE DATABASE
function deleteUser($mysqli, $uid)
{

    $select = "delete from users where uid =$uid";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } else {
        return  $mysqli->query($select) === TRUE ? true : false;
    }
}



//@DESC ADD COMMMENT
//@COLUMNS  comment_id , article_id , uid , timestamp [can-be-null]
//@DESC THE UID AND ARTICLE CAN BE BROUGHT THROUGH COOKIES 
function addComment($mysqli, $uid, $article_id, $content)
{

    $select = "INSERT INTO comments (`uid`,  `article_id`, `content`, ) VALUES ($uid , $article_id , $content )";

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } 
    if( $mysqli->query($select) === TRUE){
        echo "success";
     }else{
        echo "<br>".$mysqli->error;
     }
}
//@DESC GET COMMENTES
//@COLUMNS  comment_id , article_id , uid , timestamp [can-be-null]

function getCommentes($mysqli, $article_id)
{

    $select = "select comments.comment_id , comments.content , comments.timestamp , comments.uid from article left join comments on article.id = comments.article_id where article.id = $article_id";
    //this will result with the c
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    } else {
        $res = $mysqli->query($select);
        if ($res->num_rows > 0) {
            return $res;
        }
    }
}

   
       
 





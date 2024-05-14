<?php


require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";


if ( $action != "login" && $action != "logout" && !$username ) {
  login();
  exit;
}


switch ( $action ) {
  case 'login':
    login();
    break;
  case 'logout':
    logout();
    break;
  case 'newArticle':
    newArticle();
    break;
  case 'editArticle':
    editArticle();
    break;
  case 'deleteArticle':
    deleteArticle();
    break;
  default:
    listArticles();
}


function login() {


  $results = array();
  $results['pageTitle'] = "Админы нэвтрэх хэсэг";


  if ( isset( $_POST['login'] ) ) {


    // админы нэвтрэх хэсэг


    if ( $_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD ) {


      // нэвтрэлт амжилттай: admin.php хуудасруу үсрэх
      $_SESSION['username'] = ADMIN_USERNAME;
      header( "Location: admin.php" );


    } else {


      // Нэвтрэлт амжилтгүй: Дэлгэцэнд алдааны мэссэжийг харуулах
      $results['errorMessage'] = "Нэвтрэх нэр эсвэл нууц үг буруу байна.";
      require( TEMPLATE_PATH . "/admin/loginForm.php" );
    }


  } else {
    require( TEMPLATE_PATH . "/admin/loginForm.php" );
  }


}


function logout() {
  unset( $_SESSION['username'] );
  header( "Location: admin.php" );
}


function newArticle() {


  $results = array();
  $results['pageTitle'] = "Шинэ мэдээ";
  $results['formAction'] = "newArticle";


  if ( isset( $_POST['saveChanges'] ) ) {


    // нийтлэлийг хадгалах
    $article = new Article;
    $article->storeFormValues( $_POST );
    $article->insert();
    header( "Location: admin.php?status=changesSaved" );


  } elseif ( isset( $_POST['cancel'] ) ) {


    // нийтлэлийг хадгалахаа больсон үед буцах 
    header( "Location: admin.php" );
  } else {


    // нийтлэлийг хадгалсан засварласан үед харуулах
    $results['article'] = new Article;
    require( TEMPLATE_PATH . "/admin/editArticles.php" );
  }


}


function editArticle() {


  $results = array();
  $results['pageTitle'] = "Мэдээ засварлах";
  $results['formAction'] = "editArticle";


  if ( isset( $_POST['saveChanges'] ) ) {


    // мэдээг засварласан үед хадгалах


    if ( !$article = Article::getById( (int)$_POST['articleId'] ) ) {
      header( "Location: admin.php?error=articleNotFound" );
      return;
    }


    $article->storeFormValues( $_POST );
    $article->update();
    header( "Location: admin.php?status=changesSaved" );


  } elseif ( isset( $_POST['cancel'] ) ) {


    // нийтлэлийг засаагүй үед буцах
    header( "Location: admin.php" );
  } else {


    // нийтлэлийг зассан үед өөрчлөлтийг хадгалах
    $results['article'] = Article::getById( (int)$_GET['articleId'] );
    require( TEMPLATE_PATH . "/admin/editArticles.php" );
  }


}


function deleteArticle() {


  if ( !$article = Article::getById( (int)$_GET['articleId'] ) ) {
    header( "Location: admin.php?error=articleNotFound" );
    return;
  }


  $article->delete();
  header( "Location: admin.php?status=articleDeleted" );
}


function listArticles() {
  $results = array();
  $data = Article::getList();
  $results['articles'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Бүх мэдээ";


  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "articleNotFound" ) $results['errorMessage'] = "Алдаа гарлаа";
  }


  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Амжилттай хадгалагдлаа.";
    if ( $_GET['status'] == "articleDeleted" ) $results['statusMessage'] = "Устгагдлаа.";
  }


  require( TEMPLATE_PATH . "/admin/listArticles.php" );
}


?>


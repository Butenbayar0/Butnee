<?php


require( "config.php" );
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";


switch ( $action ) {
  case 'archive':
    archive();
    break;
  case 'viewArticle':
    viewArticle();
    break;
  default:
    homepage();
}


function archive() {
  $results = array();
  $data = Article::getList();
  $results['articles'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Мэдээний архив";
  require( TEMPLATE_PATH . "/archive.php" );
}


function viewArticle() {
  if ( !isset($_GET["articleId"]) || !$_GET["articleId"] ) {
    homepage();
    return;
  }


  $results = array();
  $results['article'] = Article::getById( (int)$_GET["articleId"] );
  $results['pageTitle'] = $results['article']->title . " | Мэдээ";
  require( TEMPLATE_PATH . "/viewArticle.php" );
}


function homepage() {
  $results = array();
  $data = Article::getList( HOMEPAGE_NUM_ARTICLES );
  $results['articles'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Мэдээ мэдээлэлw";
  require( TEMPLATE_PATH . "/homepage.php" );
}


?>

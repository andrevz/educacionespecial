<?PHP

error_reporting (E_ALL ^ E_NOTICE);

$cutepath =  __FILE__;
$cutepath = preg_replace( "'\\\show_news\.php'", "", $cutepath);
$cutepath = preg_replace( "'/show_news\.php'", "", $cutepath);

require_once("$cutepath/inc/functions.inc.php");
require_once("$cutepath/data/config.php");

// If we are showing RSS, include some need variables.
if($template == 'rss'){
   include("$cutepath/data/rss_config.php");
}

//----------------------------------
// Check if we are included by PATH
//----------------------------------
if($_SERVER["HTTP_ACCEPT"] or $_SERVER["HTTP_ACCEPT_CHARSET"] or $_SERVER["HTTP_ACCEPT_ENCODING"] or $_SERVER["HTTP_CONNECTION"]){ /* do nothing */ }
elseif(eregi("show_news.php", $PHP_SELF)){
die("<h4>CuteNews ha detectado que estás incluyendo <b>show_news.php</b> usando la URL a este archivo.<br>
Esto es incorrecto. Debes incluirlo usando la RUTA a show_news.php</h4><br>Ejemplo:<br>
esto es <font color=red>INCORRECTO</font> :&nbsp;&nbsp; &lt;?PHP include(\"http://yoursite.com/cutenews/show_news.php\"); ?&gt;<br>
esto es <font color=green>CORRECTO</font>:&nbsp;&nbsp; &lt;?PHP include(\"cutenews/show_news.php\"); ?&gt;<br>
<br><BR>// <font size=2>si piensas que este mensaje no debe ser mostrado, abre show_news.php y borra este mensaje</font>");
}
//----------------------------------
// End of the check
//----------------------------------

if(!isset($subaction) or $subaction == ""){ $subaction = $POST["subaction"]; }

if(!isset($template) or $template == "" or strtolower($template) == "default"){ require_once("$cutepath/data/Default.tpl"); }
else{
        if(file_exists("$cutepath/data/${template}.tpl")){ require("$cutepath/data/${template}.tpl"); }
    else{ die("Error!<br>el tema (skin) <b>".htmlspecialchars($template)."</b> no existe.<br> NOTA: Los temas son 'sensibles' a mayúsculas y minúsculas por lo que debes escribir el nombra tal y como es"); }
}

// Prepare requested categories
if(preg_match("[a-z]/i", $category)){
        die("<b>Error</b>!<br>CuteNews ha detectado que usas \$category = \"".htmlspecialchars($category)."\"; pero solo puedes llamar a las categorías con sus números de <b>ID</b> y no con nombres<br>
    ejemplo:<br><blockquote>&lt;?PHP<br>\$category = \"1\";<br>include(\"path/to/show_news.php\");<br>?&gt;</blockquote>");
}
$category = preg_replace("/ /", "", $category);
$tmp_cats_arr = explode(",", $category);
foreach($tmp_cats_arr as $key=>$value){
    if($value != ""){ $requested_cats[$value] = TRUE; }
}

if($archive == ""){
        $news_file = "data/news.txt";
        $comm_file = "data/comments.txt";
}else{
        $news_file = "data/archives/$archive.news.arch";
        $comm_file = "data/archives/$archive.comments.arch";
}

$allow_add_comment                        = FALSE;
$allow_full_story                        = FALSE;
$allow_active_news                         = FALSE;
$allow_comments                         = FALSE;



//<<<------------ Detarime what user want to do
if( $CN_HALT != TRUE and $static != TRUE and ($subaction == "showcomments" or $subaction == "showfull" or $subaction == "addcomment") and ((!isset($category) or $category == "") or ($requested_cats[$ucat] == TRUE )  ) ){
    if($subaction == "addcomment"){  $allow_add_comment        = TRUE; $allow_comments = TRUE; }
    if($subaction == "showcomments"){ $allow_comments = TRUE; }
    if(($subaction == "showcomments" or $allow_comments == TRUE) and $config_show_full_with_comments == "yes"){$allow_full_story = TRUE; }
    if($subaction == "showfull") $allow_full_story = TRUE;
    if($subaction == "showfull" and $config_show_comments_with_full == "yes") $allow_comments = TRUE;

}
else{
    if($config_reverse_active == "yes"){ $reverse = TRUE; }
        $allow_active_news = TRUE;
}
//----------->>> Detarime what user want to do

require("$cutepath/inc/shows.inc.php");
    if($_GET['archive'] and $_GET['archive'] != ''){ $archive = $_GET['archive']; } // stupid fix ?
unset($static, $template, $requested_cats, $category, $catid, $cat,$reverse, $in_use, $archives_arr, $number, $no_prev, $no_next, $i, $showed, $prev, $used_archives);
?>
<!-- News Powered by CuteNews: http://cutephp.com/ -->
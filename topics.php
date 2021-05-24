<?php require('core/init.php'); ?>
<?php 
//Create Topic Object
$topic = new Topic;

//Get Template and Assign Vars
$template = new Template('templates/frontpage.php');

//Get Category id from url
$categoria = isset($_GET['category']) ? $_GET['category']:null;
$category= htmlspecialchars($categoria);
//Get User id from url
$iduser = isset($_GET['user']) ? $_GET['user']:null;
$user_id = htmlspecialchars($iduser);

//Assign Variables to template object

$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

if (isset($category)){
    $template->topics = $topic->getByCategory($category);
    $template->title = 'Posts in "'.$topic->getCategory($category)['name'].'"';
} 
if (isset($user_id)){
    $template->topics = $topic->getByUser($user_id);
    //$template->title = 'Posts by "'.$user->getUser($user_id)['name'].'"';
} 

if (!isset($category) && !isset($user_id)) {
    $template->topics = $topic->getAllTopics();
}

//Display template
echo $template;

?>
<?php

// SESSION START
if($_GET['url'] == 'index.php') header("Location: dashboard");
// if(!file_exists("Controller/".ucfirst($_GET['url']).".php") && $_GET['url'] !== "errorpage.php"){
//  header("Location: errorpage.php");
// }

Route::set($_GET['url'] ,function () {
    ucfirst($_GET['url'])::CreateView(ucfirst($_GET['url']));
});

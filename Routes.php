<?php

// SESSION START


Route::set($_GET['url'] ,function () {
    ucfirst($_GET['url'])::CreateView(ucfirst($_GET['url']));
});

/* 
    RULE {
        1)
            Controller/$name == View/$name == $_GET['url] 
            Index == Index == index
            ErrorPage == ErrorPage == ErrorPage 
    }
*/
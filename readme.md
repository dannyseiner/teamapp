# PHP MVC + MySQL(STARTUP)

    REQUIRES MySQL DATABASE!!!
    Easy way how to create PHP apps from scratch with MVC
    This template use MDBootstrap 5 and jQuery ( replaceable )
    
    
## TESTS
    Blog -> https://github.com/dannyseiner/php-mvcc-blog
    ChatApp -> Coming soon!
    Cloud -> Coming soon!
    
## SETUP
1) Open app.ini 
2) Setup database connection  
3) Setup APP Components ( disableable )

You're ready to go :)

## DATABASE FUNCTION
- QUERY -> you can select from database with static function query($sql)
- LoadData -> You can create function static function LoadData that will be called before CreateView()
              This allows to use execute() function for better print. Function is called only if exists!

## CREATE VIEW & CONTROLLER
    Create and view must have same name!
    To access them, use the name in url (Controller/Index, View/Index, localhost/index)

###     Login site example:

url: localhost/php-mvcc/login


    Controller/Login.php
```php

<?php
    class Login extends Controller
    {

    }
?>
```

    View/Login.php
```php
<div class='container w-25'>
    <form>
        <input type='text' name='username' placeholder='username'>
        <input type='password' name='password' placeholder='*******'>
        <input type='submit' name='login' value='Login'>
    </form>
</div>
```

        

####    Controller:
    Class must have same name as the file (Controller/Index, Class Index)
    Class must have this structure:
        class {filename} extends Controller{}
    No need to call any other function, it work automatically :)

####    View:
    View file must have same name as controller file and class!
    Don't use tags { html, head, body } it could brake the site.
    View content is already wrapped in body tag! 
        

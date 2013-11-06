# Forum Package for Laravel 4

#### STATUS: UNDER DEVELOPMENT

### How to Install

- Install L4 App from Github ( Watch this if you need to know how : http://net.tutsplus.com/tutorials/php/how-to-setup-laravel-4/)
- In your app composer.json file, add:

```php
	"require": {
		"eubby06/forum": "*"
	}
```

- Configure your database settings in the L4 app/config/database.php file
- Open your terminal in the L4 App root directory and run `php composer.phar update` command
- Add Forum Service Provider to the app/config/app.php file under the array key "providers" as shown below

```php

'providers' => array(
		
		'Eubby\Forum\ForumServiceProvider',

)

```

- Please change the default user model in app/config/auth.php to:

```php

'model' => 'Eubby\Models\User',

```

- And run the following command in the terminal to start installing the Forum package

```
 php artisan forum:install
```

- The above command will ask you to create an admin user account and 

### Frontend
- By default it is available on http://www.domain.com/forum

### Admin Panel
- By default it is available on http://www.domain.com/admin

Documentation will be updated soon
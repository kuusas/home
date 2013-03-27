Vilniusphp.lt homepage
======================

* Have an idea for improvement? Feel free to open pull request!;
* Want to discuss before? Create an Issue!;

How to run
----------

1. Configure `app/config/app_parameters.yml`. Do not commit your config to
   repository. You can ask Git to ignore this file with following command:

    ``` sh
    git update-index --assume-unchanged app/config/app_parameters.yml
    ```

2. Install dependencies


    ``` sh
    make install
    ```

    Script will download `composer.phar`, vendors and will apply migrations to your database.

3. Run server

    ``` sh
    make runserver
    ```

Development 
-----------

Database schema is based on Doctrine migrations. Make sure you created a new
migration after editing or modifying any entities.

To create migration automatically type:

``` sh
app/console doctrine:migrations:diff
```

To apply migrations:

``` sh
app/console doctrine:migrations:migrate
```

If you need more info regarding Doctrine migrations, check
[DoctrineMigrationsBundle documentation](http://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html).

Conventions
-----------

Make sure database table and column names are in lowercase and separated with
underscore "_" symbol if needed.

Use annotations for controllers and entities. Yaml files for all configs.

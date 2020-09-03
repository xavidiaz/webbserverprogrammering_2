# webbserverprogrammering_2

# Create file structure.

- [.htcaccess](htcaccess)
  url redirecction & permissions.

- [/public](/public)
  website public files.

  -- index.php.

  - [/public/.htcaccess](/public/.htcaccess)
    url redirecction & permissions.

  - [/public/css](/public/css)
    css folder.

  - [/public/css/style.css](/public/css/style.css)
    custom css.

  - [/public/js](/public/js)
    Javascript Folder.

- [/app](/app)
  MCV structure, application files.

- [/app/.htcaccess](/app/.htcaccess)
  url redirecction & permissions.

  - [/app/index.php](/app/require.php)
    Require necesary files [/app/libraries](/app/libraries/).

  - [/app/config/](/app/config/)
    config files.

    - [/app/config/config.php](/app/config/config.php)
      Configuration.

  - [/app/controller/](/app/controller/)
    Controller files.

  - [/app/helpers/](/app/helpers/)
    Session & urls helpers files.

  - [/app/libraries](/app/libraries/)
    Libraries files.

  - [/app/libraries/Controller.php](/app/libraries/Controller.php)
    Base controller Class.

  - [/app/libraries/Kernel.php](/app/libraries/Kernel.php)

    - Create & format urls
    - load controllers

  - [/app/libraries/Database.php](/app/libraries/Database.php)

    - PDO class, database connection
    - Methods for functionality

    * Just model have access to this file

  - [/app/models/](/app/models/)
    Models files.

  - [/app/views/](/app/views/)
    Views files.

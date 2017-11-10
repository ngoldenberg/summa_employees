Summa Employees
===============

A Symfony project created on November 9, 2017, 11:37 pm.

See [here](http://symfony.com/doc/current/index.html) for Symfony docs.


### General Project Related
1. Open Terminal
2. Download repository
`git clone https://github.com/nicogol0/summa_employees.git`
3. Go to project's folder
`cd {project_folder}`
4. Install composer locally (see [here](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-14-04) for global)
`curl -sS https://getcomposer.org/installer | php`
5. Run composer.
`php composer.phar install -vvv`
6. Composer will ask for database connection info (will save to /app/config/parameters.yml). For null answers, just press enter (cof cof mailing stuff cof cof).

#### Sync database structure
``` bash
php bin/console doctrine:schema:update --force
```

#### Run server
```php
php bin/console server:start
```

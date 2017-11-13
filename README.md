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
6. Composer will ask for database connection info (will save to /app/config/parameters.yml). For null answers, just press enter.

#### Sync database structure
``` bash
php bin/console doctrine:schema:update --force
```

#### Run server
```bash
php bin/console server:start
```


## Exercise Methods

##### Add Employees


* Add Developer

    ```
    POST: http://127.0.0.1:8000/api/employees/{companyId}
    ```

    Json Body Properties:
    * "name" : string
    * "surname" : string
    * "age" : integer
    * "type" : string*
    * "programmingLanguageId" : integer (valid Id)
    
*\* Options: ["developer", "designer"].*


* Add Designer

    ```
    POST: http://127.0.0.1:8000/api/employees/{companyId}
    ```

    Json Body Properties:
    * "name" : string
    * "surname" : string
    * "age" : integer
    * "type" : string*
    * "graphicDesigner" : boolean

*\* Options: ["developer", "designer"].*

##### Get Employees
* Get Company 
    ```
    GET: http://127.0.0.1:8000/api/companies/{companyId}
    ```

* Get All Employees

    ```
    GET: http://127.0.0.1:8000/api/companies/{companyId}/employees
    ```

* Get Employee by Id

    ```
    GET: http://127.0.0.1:8000/api/employees/{employeeId}
    ```

##### Get Average
* Get the Average Age

    ```
    GET: http://127.0.0.1:8000/api/employees/{companyId}/average
    ```

## Extra
Check `{projectDirectory}/extra` folder contents:

* `{projectDirectory}/extra/dumps`
    * `structure` : contains all create/alter table queries (also achievable via Doctrine CLI)
    * `data` : contains defaults programming languages inserts queries


* `{projectDirectory}/postman_collection`

    Contains project related rest api endpoints and basic structure.
    **Download [Postman](https://www.getpostman.com/)**


* `{projectDirectory}/docs`

  Contains this same document converted to PDF.


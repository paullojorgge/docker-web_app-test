## Step 1: create a MySQL database and build the necessary tables
Application will be a book database. The fist step is to create a database and create
the necessary tables. Run a MySQL container:
```
> docker run --name mysql -e MYSQL_ROOT_PASSWORD=admin -d mysql
```

Run a temporary MySQL container to act as a client to the databse server and create
the appropriate database and tables:
```
> docker run -it --link mysql:mysql --rm mysql sh -c 'exec mysql -h mysql -u root -padmin'
```
Now, inside the container let's create a database for this test project:
```
mysql> create database bocker;
Query OK, 1 row affected (0.05 sec)

mysql> use bocker;
Database changed

mysql> CREATE TABLE books (id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, title VARCHAR(30) NOT NULL, author VARCHAR(30) NOT NULL, genre VARCHAR(20) NOT NULL, pubyear INT (4) );
Query OK, 0 rows affected (0.22 sec)

mysql> show tables;
+------------------+
| Tables_in_bocker |
+------------------+
| books            |
+------------------+
1 row in set (0.01 sec)

mysql> describe books;
+---------+-----------------+------+-----+---------+----------------+
| Field   | Type            | Null | Key | Default | Extra          |
+---------+-----------------+------+-----+---------+----------------+
| id      | int(6) unsigned | NO   | PRI | NULL    | auto_increment |
| title   | varchar(30)     | NO   |     | NULL    |                |
| author  | varchar(30)     | NO   |     | NULL    |                |
| genre   | varchar(20)     | NO   |     | NULL    |                |
| pubyear | int(4)          | YES  |     | NULL    |                |
+---------+-----------------+------+-----+---------+----------------+
5 rows in set (0.02 sec)
```
Let's create a folder called `bocker` and inside that folder create a **Dockerfile** like this (NOTE: double check that inside that folder we have all the files that we need):
```
FROM ubuntu:latest
RUN apt-get update && apt-get -y upgrade
# next line will set a environment variable in order to avoid to ask to set timezone :)
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get -y install apache2 php php-mysqli libapache2-mod-php7.2 tzdata 
RUN useradd -m -s /bin/bash -d /home/worker worker
WORKDIR /var/www/html
ADD css css
ADD js js
ADD templates templates
COPY database.php database.php
COPY add.php add.php
COPY create.php create.php
COPY index.php index.php
COPY update.php update.php
COPY edit.php edit.php
COPY delete.php delete.php
RUN rm -f index.html
RUN chown -R worker /var/www/html
USER root
CMD ["apachectl","-D","FOREGROUND"]
VOLUME ["/var/www/html"]
VOLUME ["/etc/apache2"]
```
Build the image as usual based in our **Dockerfile**:
```
> docker build -t paullojorgge/bocker:latest .
```
Now let's build from the previous step:
 ```
 > docker run -d --name webapp --link mysql:mysql -p 8080:80 paullojorgge/bocker:latest
 ```
 Now search by the IP of the container using `ifconfig -a`, open a browser, paste the IP of the container and we should have access to our test WebApp.
 Simply test it by adding new records in our database.


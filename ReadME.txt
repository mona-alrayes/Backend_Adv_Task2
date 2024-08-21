1- run the script DATABASE.sql to execute the database and the table 
2- go to file db/Database.php and change password of the database to " " 
3- to run the project with terminal 
php S localhost:8000


notes :
1-in index.php a new object of PostController is made 
and with switch case it takes you automatically to list_posts and switch cases acts like routing for view pages 

2- in Database.php 
there is connect() method that connects to database or send error if connection failed 
and there is query($sql, $params = []) method to execute the query passed from the Postcontroller through the post.php which acts as model 
get() method to get data like select * for both listAll($id) or read($id)

3- post.php is class that inherts model.php which is absctract class so whatever type of tables in database that needs model can inhert from it 
4- PostController is class that inherts controller.php which is absctract class that any controller must inhert it 

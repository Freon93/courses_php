<?php
/* test connection*/
$db = new PDO('mysql:host=mysql_container;dbname=php_courses_db', 'root', '12345');
$res = $db->query('SELECT * FROM test_table');

while ($row = $res->fetch())
{
    var_dump($row);
}
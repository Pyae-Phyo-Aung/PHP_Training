<?php
require_once "db_connect.php";
// create user table
$sql = "CREATE TABLE user(
          id int NOT NULL AUTO_INCREMENT,
          name varchar (255),
          email varchar (255)  Not Null Unique,
          password varchar (255) Not Null,
          phone varchar (255) Not Null,
          img varchar (255),
          address text Not Null,
          created_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	      updated_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          PRIMARY KEY (id)
          )";

if (mysqli_query($conn, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

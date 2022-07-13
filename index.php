<?php
    $host = 'db';
    // Database use name
    $user = 'root';
    $dbname = "php-docker";

    //database user password
    $pass = 'YKfRRfvzwmW79pF';
    // check the MySQL connection status
    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        //var_dump($conn);die;
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "<h4>Connected to MySQL server successfully! </h4> <br>";
    }
    // sql to create table
    $sql = "CREATE TABLE Customer (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    
    if ($conn->query($sql) === true) {
        echo "Table Customer created successfully";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }

    $sql = "INSERT INTO Customer (firstname, lastname, email)
            VALUES ('Felhi', 'Haffa12', 'haffa@example.com')";

    if ($conn->query($sql) === true) {
        echo "New customer created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "SELECT id, firstname, lastname FROM Customer";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>  
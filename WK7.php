<?php
     $sql;
	 $dsn = 'mysql:host=sql1.njit.edu;dbname=jdn23';
	 $username = "jdn23";
	 $password = "fyeZNMOz";
try {
	    $conn = new PDO($dsn, $username, $password);
	    echo "You have Connected successfully<br><br><br>";
	    $sql = "SELECT * FROM accounts WHERE id < 6";
	    $x = $conn->prepare($sql);
	    $x->execute();
	    $results = $x->fetchAll();
	    if($x->rowCount() > 0){
	    	
	    	echo "<table border=\"2\"><tr><th>ID</th><th>Email</th><th>Gender</th></tr>";
	    	foreach ($results as $row) {
        		echo "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["gender"]."</td></tr>";
    		}
	    }else{
	    	echo '0 results';
	    } 
	    $x->closeCursor();

	    echo 'Results: '. $x->rowCount() . '<br>';

    }
catch(PDOException $e)
    {
    	echo "Connection failed try again later: " . $e->getMessage();
    }
$conn = null;
?>
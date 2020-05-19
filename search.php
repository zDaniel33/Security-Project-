<?php
$servername="localhost";
$username="root"; or if you create another user put here the username;
$password="the password of your database";
$database="the name of your database";
$connect=new mysqli($servername,$username,$password,$database);

if (mysqli_connect_errno())
{
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$salary = mysqli_real_escape_string($link, $_REQUEST['salary']);

if(preg_match('/^[0-9]{1,6}$/', $_REQUEST['salary'])){
       echo "Valid Salary";
} else {
	echo "Invalid salary";
	die();
}



if(isset($_POST['search']))
{

        $valueToSearch = $_POST['salary'];
        $sqlfilter = "SELECT * FROM Employees WHERE salary='{$valueToSearch}'";
}

        $filterResult=mysqli_query($connect,$sqlfilter);


        echo "<table>";
                echo "<tr>";
                        echo "<th>Legitimation</th>";
                        echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
                        echo "<th>Phone number</th>";
                        echo "<th>Email Address</th>";
                        echo "<th>Salary</th>";
                echo "<tr>";
                while($row=mysqli_fetch_array($filterResult))
                {
                        echo "<tr>";
                                echo "<td>".$row['id']."</td>";
                                echo "<td>".$row['firstname']."</td>";
				echo "<td>".$row['lastname']."</td>";
                                echo "<td>".$row['phone']."</td>";
                                echo "<td>".$row['email']."</td>";
                                echo "<td>".$row['salary']."</td>";
                        echo "</tr>";
                }

            echo "</table>";

        mysqli_free_result($filterResult);

?>

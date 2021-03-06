<!DOCTYPE html>
<html>
<head>
  <title>Search By Product Name DESC</title>
  <meta charset="UTF-8">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}

</style>
</head>
<body>

<?php
           
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'faws';

            $mysqli = new mysqli($host,$user,$pass,$db);
            session_start();
            $pname=$_SESSION['var'];

            $result = $mysqli->query("SELECT supplier.name, supplier.address, supplier.contactno, supplier_products.pid, supplier_products.prod_name, supplier_products.prod_cost,  supplier_products.manufacturer  from supplier inner join supplier_products where supplier.username=supplier_products.username and supplier_products.prod_name='$pname' order by supplier_products.prod_cost desc limit 1")or die($mysqli->error);  
                 
?>   

<h1 align="center"><?php echo "Here are the search Results based of Product Name With Asc Sorted"; ?></h1>

<br>
<br>
<table>
  <tr>
    <th>Supplier Name</th>
    <th>Supplier Address</th>
    <th>Supplier Contact No</th>
    <th>Product ID</th>
    <th>Product Name</th>
    <th>Product Cost</th>
    <th>Manufactured By</th>
  </tr>
  <?php while ($row= $result->fetch_assoc()): ?>
  <tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['address'] ?></td>
    <td><?= $row['contactno'] ?></td>
    <td><?= $row['pid'] ?></td>
    <td><?= $row['prod_name'] ?></td>
    <td><?= $row['prod_cost'] ?></td>
    <td><?= $row['manufacturer'] ?></td>
  </tr>
  <?php endwhile; ?>
</table>


</body>
</html>

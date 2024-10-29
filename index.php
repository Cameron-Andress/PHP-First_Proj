<?php
// database server type, location, database name
$data_source_name = 'mysql : host=localhost;dbname=stock';
// feels bad, but we don"t have time to show a better way
$username = 'stockuser';
$password = 'test';

try{

    $database = new PDO($data_source_name, $username, $password);
    echo "<p>Database connection successful</p>";
    
    $query - 'SELECT symbol, name, current_price, id FROM stocks';
    
    // prepare the query please
    $statement = $database->prepare ($query);
    
    // runt the query please
    $statement->execute();
    
    // might be risky if you have a HUGE amount of data
    $stocks = $statement->fetchAll();
    
    $statement->closeCursor();
    
    $symbol = htmlspecialchars(filter_input (INPUT_POST, "symbol"));
    $name = htmlspecialchars(filter_input (INPUT_POST, "name"));
    $current_price = filter_input (INPUT_POST, "current_price", FILTER_VALIDATE_FLOAT);
    
    if ( $symbol != "" && $name != " && $current_price != 0"){
        //DANGER DANGER DANGER
        
        $query = ""
    }
    
    
} catch (Exception $e) {
    $error_message = $e->getMessage();
    echo "<p>Error message: $error_message </p>";
}


?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <tr>
                <th>Name</th>
                <th>Symbol</th>
                <th>Current Price</th>
                <th>ID</th>
            </tr>
            <?php foreach ($stocks as $stock)  :  ?>
            <tr>
                <td><?php echo $stock['symbol'];  ?></td>
                <td><?php echo $stock['name'];  ?></td>
                <td><?php echo $stock['current_price'];  ?></td>
                <td><?php echo $stock['id'];  ?></td>
            </tr>
                
            <?php endforeach;  ?>    
        </table>
        
        
        <form action="index.php" method="post">
            <label>Symbol: </label>
            <input type="text" name="symbol"/><br>
            <label>Name: </label>
            <input type="text" name="name"/><br>
            <label>Current Price: </label>
            <input type="text" name="current_price"/><br>
            <label>&nbsp;</label>
            <input type="submit" value="Add Stock"/>
        </form>
        
    </body>
</html>

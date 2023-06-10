<?php 
//include('dbcon.php');

// Connect to the database
$host = 'localhost';
$db = 'mydb';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    echo "successful";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Fetch data from database using pdo in php</title>
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Fetch data from database using pdo in php </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>phone_number</th>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>profile</th>
                                    <th>record</th>
                                    <th>banner</th>
                                   <th>edit</th>
                                    <th>delete</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM users";
                                    $statement = $pdo->prepare($query);
                                    $statement->execute();

                                    $statement->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                                    $result = $statement->fetchAll();
                                    if($result)
                                    {
                                        foreach($result as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row->id; ?></td>
                                                <td><?= $row->username; ?></td>
                                                <td><?= $row->email; ?></td>
                                                <td><?= $row->password; ?></td>
                                                 <td><?= $row->phone_number; ?></td>
                                                  <td><?= $row->firstname; ?></td>
                                                   <td><?= $row->lastname; ?></td>
                                                 <td><?= $row->profile; ?></td>
                                                  <td><?= $row->record; ?></td>
                                                   <td><?= $row->banner; ?></td>

                                                <td>
                                                    <a href="updateform.php?id=<?= $row->id; ?>" >Edit</a>
                                                    </td>
                                                    <td>
                                                    <a href="del.php?id=<?= $row->id; ?>">Delete</a>
                                                    </td>
                                            
                                            </tr>
                                              
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

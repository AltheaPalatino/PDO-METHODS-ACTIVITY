NUMBER 3

<?php
require_once 'core/dbConfig.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Prepare the SQL statement to select from your data schema
$stmt = $pdo->prepare("
    SELECT Clients.client_id, Clients.first_name, Clients.last_name, 
           Clients.phone_number, Clients.email, 
           Appointments.appointment_date, 
           Services.service_name, 
           AppointmentServices.quantity 
    FROM Clients
    LEFT JOIN Appointments ON Clients.client_id = Appointments.client_id
    LEFT JOIN AppointmentServices ON Appointments.appointment_id = AppointmentServices.appointment_id
    LEFT JOIN Services ON AppointmentServices.service_id = Services.service_id
    ORDER BY Clients.client_id DESC
");

if ($stmt->execute()) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results as an associative array
    
    echo "<pre>";
    print_r($rows); // Display the results in a readable format
    echo "</pre>";
}
?>
</body>
</html>
---------------------------------------------------------------------------------------------------------------------------------

NUMBER 4

<?php
require_once 'core/dbconfig.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Prepare the SQL statement to fetch a specific client by client_id
$stmt = $pdo->prepare("SELECT * FROM Clients WHERE client_id = :client_id");
$stmt->bindValue(':client_id', 1, PDO::PARAM_INT); // Example: fetching the client with ID 1

if ($stmt->execute()){
    echo "<pre>"; // Opening preformatted text block
    print_r($stmt->fetch()); // Fetch a single row as an associative array and print it
    echo "</pre>"; // Closing preformatted text block
}
?>
</body>
</html>

---------------------------------------------------------------------------------------------------------------------------------
NUMBER 5

<?php
require_once 'core/dbconfig.php'; 


    // Prepare the SQL INSERT statement
    $query = "INSERT INTO `Clients` (client_id, first_name, last_name, phone_number, email) VALUES (?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($query);
    
    // Execute the query with your data
    $executeQuery = $stmt->execute(
        [7, "Krisha", "Santiago", "09123456789", "krisha.santiago@gmail.com"]
    );

    // Check if the execution was successful
    if ($executeQuery) {
        echo "Inserted successfully!";
    } else {
        echo "Query failed!";

?>

---------------------------------------------------------------------------------------------------------------------------------
NUMBER 6

<?php
require_once 'core/dbconfig.php'; 


    // Prepare the SQL INSERT statement
    $query = "DELETE FROM clients WHERE client_id = 3";

    // Execute the query with your data
    $stmt = $pdo->prepare($query);
    $executeQuery = $stmt->execute();

    // Check if the execution was successful
    if ($executeQuery) {
        echo "<br>Deletion Successful!";
    } else {
        echo "<br>Query failed!";
    }

?>

---------------------------------------------------------------------------------------------------------------------------------

NUMBER 7

<?php
require_once 'core/dbconfig.php'; 


    // Prepare the SQL INSERT statement
    $query = "UPDATE clients SET first_name = ?, last_name = ?, email = ?
                     WHERE client_id = 7";

    // Execute the query with your data
    $stmt = $pdo->prepare($query);
    $executeQuery = $stmt->execute(
            ["Thalia", "Cruz", "thaliacruz@gmail.com"]
);

    // Check if the execution was successful
    if ($executeQuery) {
        echo "<br>Update successful!";
    } else {
        echo "<br>Query failed!";
    }

?>

---------------------------------------------------------------------------------------------------------------------------------
NUMBER 8

<?php
require_once 'core/dbconfig.php'; 

    // Prepare and execute the SQL SELECT statement
    $query = "SELECT client_id, first_name, last_name, phone_number, email FROM Clients"; 
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Fetch all rows as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Start HTML output
    echo "<html>
            <head>
                <title>Client List</title>
                <style>
                    table {
                        width: 60%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                    }
                    th {
                        background-color: silver;
                        text-align: left;
                    }
                </style>
            </head>
            <body>
                <h2>Client List</h2>
                <table>
                    <tr>
                        <th>Client ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                    </tr>";

    // Render each row in the table
    foreach ($results as $row) {
        echo "<tr>
                <td>" . htmlspecialchars($row['client_id']) . "</td>
                <td>" . htmlspecialchars($row['first_name']) . "</td>
                <td>" . htmlspecialchars($row['last_name']) . "</td>
                <td>" . htmlspecialchars($row['phone_number']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
              </tr>";
    }
    
    echo "  </table>
            </body>
          </html>";

?>




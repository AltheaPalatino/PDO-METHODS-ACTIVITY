<?php
include 'core/dbconfig.php';

try {
    // Use the variables defined in dbconfig.php
    $conn = new PDO($dsn, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare and execute the SQL to fetch client appointments and services
    $sql = "SELECT Clients.first_name, Clients.last_name, Appointments.appointment_date, 
                   Services.service_name, AppointmentServices.quantity
            FROM Clients
            JOIN Appointments ON Clients.client_id = Appointments.client_id
            JOIN AppointmentServices ON Appointments.appointment_id = AppointmentServices.appointment_id
            JOIN Services ON AppointmentServices.service_id = Services.service_id";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch all rows as an associative array
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Render the data in an HTML table
    echo "<table border='1'>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Appointment Date</th>
                <th>Service Name</th>
                <th>Quantity</th>
            </tr>";

    foreach ($rows as $row) {
        echo "<tr>
                <td>" . htmlspecialchars($row['first_name']) . "</td>
                <td>" . htmlspecialchars($row['last_name']) . "</td>
                <td>" . htmlspecialchars($row['appointment_date']) . "</td>
                <td>" . htmlspecialchars($row['service_name']) . "</td>
                <td>" . htmlspecialchars($row['quantity']) . "</td>
              </tr>";
    }
    
    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
-- Insert 6 data into Clients
INSERT INTO Clients (client_id, first_name, last_name, phone_number, email) VALUES
(1, 'Adan', 'Waber', '09214670523', 'awaber0@gmail.com'),
(2, 'Austin', 'Kenwood', '09255667783', 'akenwood1@gmail.com'), 
(3, 'Silvie', 'Andreichik', '09535424261', 'sandreichik2@gmail.com'), 
(4, 'Lee', 'Brodest', '09463373829', 'lbrodest3@gmail.com'), 
(5, 'Aaron', 'Gibbieson', '09988642211', 'agibbieson4@gmail.com'), 
(6, 'Tristam', 'Feary', '09226070984', 'tfeary5@gmail.com');

-- Insert 6 data into Appointments
INSERT INTO Appointments (appointment_id, client_id, appointment_date, status) VALUES
(1, 1, '2024-08-01', 'scheduled'),
(2, 2, '2024-01-03', 'scheduled'), 
(3, 3, '2024-03-21', 'canceled'),
(4, 4, '2024-06-12', 'canceled'), 
(5, 5, '2024-07-24', 'canceled'), 
(6, 6, '2024-09-02', 'completed'); 

-- Insert 6 data into Services
INSERT INTO services (service_id, service_name, service_price) VALUES
(1, 'Bridal Makeup', 250.00), 
(2, 'Evening Glam', 150.00), 
(3, 'Daytime Natural Look', 100.00), 
(4, 'Special Effects Makeup', 300.00),
(5, 'Makeup Consultation', 75.00), 
(6, 'Photoshoot Makeup', 200.00); 

-- Insert 6 data into AppointmentServices
INSERT INTO AppointmentServices (appointmentservices_id, appointment_id, service_id, quantity) VALUES
(1, 1, 1, 5), 
(2, 2, 2, 5), 
(3, 3, 3, 2), 
(4, 4, 4, 5), 
(5, 5, 5, 4), 
(6, 6, 6, 5);

-- Clients Table
CREATE TABLE Clients (
client_id INTEGER PRIMARY KEY,
first_name VARCHAR(100),
last_name VARCHAR(100), 
phone_number VARCHAR(15), email VARCHAR(100)
);

-- Appointments Table
CREATE TABLE Appointments (
appointment_id INTEGER PRIMARY KEY, 
client_id INTEGER, 
appointment_date DATE, 
status VARCHAR(20)
);

-- Services Table
CREATE TABLE services (
service_id INT PRIMARY KEY AUTO_INCREMENT, 
service_name VARCHAR(100) NOT NULL, 
service_price DECIMAL(10, 2) NOT NULL
);

-- AppointmentServices Table
CREATE TABLE AppointmentServices (
appointmentservices_id INTEGER PRIMARY KEY, 
appointment_id INTEGER, 
service_id INTEGER, 
quantity INTEGER
);
CREATE DATABASE operator_registry
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE operator_registry;

CREATE TABLE certifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id VARCHAR(20) NOT NULL,
    employee_name VARCHAR(100) NOT NULL,
    machine_type_qualified VARCHAR(100) NOT NULL,
    license_expiry_date DATE NOT NULL,
    safety_level_cleared VARCHAR(50) NOT NULL
);

INSERT INTO certifications 
(employee_id, employee_name, machine_type_qualified, license_expiry_date, safety_level_cleared)
VALUES
('EMP001', 'Nikos Papadopoulos', 'Laser Cutter', '2026-12-31', 'Level 3'),

('EMP002', 'Maria Georgiou', 'Overhead Crane', '2025-04-10', 'Level 2'),

('EMP003', 'Kostas Antoniou', 'Forklift', '2026-08-20', 'Level 1'),

('EMP004', 'Eleni Dimitriou', 'CNC Machine', '2024-11-15', 'Level 2'),

('EMP005', 'Giorgos Ioannou', 'Laser Cutter', '2027-01-30', 'Level 3'),

('EMP006', 'Dimitris Karas', 'Welding Robot', '2027-05-01', 'Level 2');
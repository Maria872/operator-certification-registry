# operator-certification-registry
Industrial Operator Certification Registry using PHP, MySQL and Cisco Packet Tracer
# Operator Certification Registry

## Project Description

This project was developed for the course **Internet Technologies in Digital Industry** at the **University of West Attica**.

The project scenario focuses on industrial safety and operator certification management.

In a heavy industrial environment, certain machines can only be operated by employees with valid certifications and safety clearance. The purpose of this system is to verify whether operators are authorized to work on specific machines according to their license validity and safety level.

The application developed is called:

**Operator Certification Registry**

It provides a dashboard that displays which operators are allowed to work today.

---

## Scenario

In an industrial environment, some machinery requires specialized training and licensing.

Examples include:

- Laser cutters
- Overhead cranes
- Forklifts
- CNC machines
- Welding robots

The system checks:

- Employee certification
- License expiration date
- Safety clearance level

and determines whether the operator is allowed to work.

---

## Application Architecture

The application was developed locally using:

- XAMPP
- Apache Web Server
- MySQL Database
- PHP
- HTML
- CSS

The web application contains three main functional pages:

### 1. Dashboard (`index.php`)
Displays all operator certifications and shows whether operators are allowed to work.

### 2. Add Certification (`add_certification.php`)
Allows insertion of new operator certifications into the database.

### 3. Search (`search.php`)
Allows searching operators by employee ID, employee name or machine type.

---

## Database Structure

Database Name:

```sql
operator_registry

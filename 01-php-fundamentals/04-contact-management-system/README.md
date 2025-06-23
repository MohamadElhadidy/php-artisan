Here’s a professional `README.md` file for your **Week 4: Contact Management System** project:

```markdown
# 04 - Contact Management System

This project is a basic **Contact Management System** built with PHP and MySQL. It allows users to **add, view, edit, and delete contacts** with details like name, email, phone number, and address. This is your first **database-driven** project and a great way to practice **CRUD operations**, form handling, and working with a **MySQL database** using PHP.

---

## 📌 Features

- Add new contacts with:
  - Full name
  - Email address
  - Phone number
  - Physical address
- Display a list of all contacts
- Edit contact details
- Delete contacts
- Clean and simple interface
- Validate and sanitize inputs
- Add flash messages for user feedback
-  Old Value Persistence

---

## 🧰 Technologies Used

- **PHP** – Server-side scripting
- **MySQL** – Database for storing contacts
- **HTML & CSS** – UI and layout
- **PDO or MySQLi** – For secure database access (choose one)

---

## 🚀 Getting Started

### Prerequisites

- A working local server (e.g., [XAMPP](https://www.apachefriends.org/), MAMP, Laragon)
- Basic understanding of PHP and MySQL
- A tool like **phpMyAdmin** or command line to create the database

---

### ⚙️ Setup Instructions

1. Clone or download this repository.
2. Start your local Apache and MySQL servers.
3. Create a new MySQL database:
   ```sql
   CREATE DATABASE contacts_db;
   ```
4. Import the provided SQL schema (if available), or create a `contacts` table:
   ```sql
   CREATE TABLE contacts (
         id INT AUTO_INCREMENT PRIMARY KEY,
         first_name VARCHAR(100) NOT NULL,
         last_name VARCHAR(100) NOT NULL,
         email VARCHAR(100) NOT NULL UNIQUE,
         phone VARCHAR(11) NOT NULL UNIQUE,
         adresss TEXT NOT NULL
   ); 
   ```
5. Update your database credentials in the PHP file (`config.php` or inside `index.php`).

6. Start the PHP server:
   ```bash
   php -S localhost:8000
   ```

7. Visit the app:
   ```
   http://localhost:8000/
   ```

---

## 📂 Project Structure

```
04-contact-manager/
├── index.php         # Display contacts
├── add.php           # Form to add new contact
├── edit.php          # Form to edit a contact
├── delete.php        # Script to delete contact
├── db.php            # Database connection file
├── style.css         # Styling
└── README.md         # Project documentation
```

---

## 🧠 What You'll Learn

- Connecting PHP to MySQL using PDO/MySQLi
- Performing CRUD operations:
  - Create (Insert)
  - Read (Select)
  - Update
  - Delete
- Using prepared statements for security
- Handling forms and passing IDs via GET/POST
- Structuring a multi-page PHP application

---

## 🛠️ Future Improvements

- Add search/filter functionality
- Add pagination for large contact lists
- Store contact photos
- Security checks
- Code Structure
- styling


---

Let me know if you want me to generate the starter code or SQL file for this project.
```
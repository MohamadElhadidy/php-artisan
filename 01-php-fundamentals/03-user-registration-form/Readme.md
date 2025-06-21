````markdown
# 03 - User Registration Form

This project is a complete **user registration system** built with PHP. It includes a multi-field form, input validation, and secure handling of user-uploaded profile images. The goal is to reinforce key web development skills such as **form handling, input sanitization, validation, and file uploads**.

---

## 📌 Features

- User-friendly registration form with fields for:
  - Full name
  - Email
  - Password & Confirm Password
  - Profile picture upload
- **Client-side validation** with HTML5
- **Server-side validation** using PHP
- Secure image upload with file type and size restrictions
- Detailed error messages and success feedback
- Input sanitization to prevent malicious input
- Add email verification step
- Add flash messages using sessions
- Add password hashing (`password_hash()`)

---

## 🧰 Technologies Used

- **HTML** – For the registration form structure
- **CSS** – For basic styling
- **PHP** – For form processing and validation
- **Sessions** – For handling form messages or feedback

---

## 🚀 Getting Started

### Prerequisites

- PHP installed (use [XAMPP](https://www.apachefriends.org/), [MAMP](https://www.mamp.info/), or built-in PHP server)
- Basic knowledge of HTML and PHP

### Setup Instructions

1. Clone or download this repository.
2. create uploads folder.
3. Navigate to the project directory.
4. Start a local PHP server:
   ```bash
   php -S localhost:8001
   ```
````

4. Open your browser and go to:
   ```
   http://localhost:8001/
   ```

---

## 📂 Project Structure

```
03-user-registration/
├── index.php           # Registration form
├── regiter.php         # Registration form logic
├── uploads/            # Folder to store uploaded images
├── style.css           # Styling
└── README.md           # Project documentation
```

---

## 🔐 Validation Details

### ✅ Client-Side (HTML5)

- `required` fields
- `type="email"` for email format

### ✅ Server-Side (PHP)

- Check for required fields
- Validate email format (`filter_var`)
- Match password and confirm password
- Sanitize inputs to remove harmful characters
- Validate uploaded image type (JPEG, PNG, etc.)
- Limit file size and rename uploads securely

---

## 🧠 What You'll Learn

- Handling form data with `$_POST`
- File upload handling with `$_FILES`
- Using `move_uploaded_file()`
- Validating and sanitizing user inputs
- Displaying dynamic error messages

---

## 🛠️ Future Improvements

- Styling the form
- Save data to a database
- Create login and authentication system

---

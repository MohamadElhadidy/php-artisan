```markdown
# 02 - To-Do List Application

This is a beginner-friendly PHP project that implements a simple **To-Do List Manager**. Users can add tasks, mark them as complete, and remove them. This project is designed to strengthen your understanding of **arrays, loops, session handling**, and basic **state management** in PHP.

## 📌 Features

- Add new tasks
- Display a list of current tasks
- Mark tasks as completed
- Remove tasks from the list
- Tasks persist during the session (no database required)

## 🧰 Technologies Used

- **HTML** – for structuring the interface
- **PHP** – for backend logic and session management
- **CSS** – for styling (if applied)

## 🚀 Getting Started

### Prerequisites

- PHP installed on your machine (e.g., via [XAMPP](https://www.apachefriends.org/), [MAMP](https://www.mamp.info/), or `php` CLI)
- A web browser
- Basic PHP knowledge

### Setup Instructions

1. Clone or download this repository.
2. Navigate to the project directory in your terminal.
3. Start a local PHP server:
   ```bash
   php -S localhost:8000
   ```
4. Open your browser and visit:
   ```
   http://localhost:8000/
   ```

## 📂 Project Structure

```
02-todo-list/
├── add.php        # add task logic
├── complete.php        #  complete task logic
├── delete.php      #  delete task logic
├── functions.php        #  functions logic
├── index.php        # Main UI 
├── init.php        # begin the session logic
├── style.css        # (Optional) Styling
├── uncomplete.php        #  uncomplete task logic
└── README.md        # Project documentation
```

## 💡 Concepts Covered

- Using **arrays** to store and manage task data
- Displaying task lists using `foreach` loops
- Managing user state with **PHP sessions**
- Basic form handling and conditionals

## 🧪 Example Flow

1. User adds a task: _"Buy groceries"_
2. Task appears in the list with a **Complete** and **Remove** button
3. User clicks **Complete** → Task gets marked
4. User clicks **Remove** → Task disappears from the list

## 🛠️ To-Do (Optional Enhancements)

- Add due dates or priorities
- Filter completed vs. incomplete tasks
- Save tasks to a file or database
- Add JavaScript for dynamic interactions without reloading the page

---

Let me know if you'd like the code starter template or a version that saves tasks to a JSON file later.

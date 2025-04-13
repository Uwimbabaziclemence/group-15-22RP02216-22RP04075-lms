#DEVELOPERS
1.UWIMBABAZI Clemence
2.NIYOMUGABO Bonheur U Matthias

# Library Management System

Library Management System for managing books, students, and book lending is a Laravel-based built for both Admins and Students.

## System Requirements

- PHP >= 8.2
- MySQL
- Composer
- XAMPP/WAMP/MAMP (or any local development environment)

## Installation Guide
1. Create a folder “to store the project”

   2. **Clone the Repository**
   ```bash
git clone --branch group-15-22RP02216-22RP04075-lms --single-branch https://github.com/jadenmatth/group-15-22RP02216-22RP04075-lms.git .   ```

3. **Install Dependencies** remember to run this command is helpful
   ```bash
   composer update
   ```
4. **Run Migrations and Seeders**
   ```bash
   # This will create all tables and seed initial data
   php artisan migrate --seed
   ```

5. **Start the application Server**
   ```bash
   php artisan serve
   ```

6. **Access the Application**
   - Visit: `http://localhost:8000`
   
## Default Login Credentials

##Admin side
### Admin Login
1. Access the admin login page.
- Email: “admin@gmail.com”
- Password: “admin123”	
Click **Login**.
#### 🗂 Application Management

1. Access the admin dashboard.
2. View all the number of Total Books, Total Categories, Total Students

3. click on the Categories to add a category to start before adding a book after adding a category you can view the list of category and now you can add book reference to a category.
4.admin can manage Books.
5.admin can manage students.
6. admin can issue the book to a student.
7.admin can manage both profiles either students and own profile
8. admin can change own password


### Student side
1.	register a new student account before Login
### Student register
To register a new student fill 
-name	
-email	
-create a password with 8+characters with special and include numbers
And student id generate automatically
Click on **Register** to create a student account
### Student Login **example
Email:matthias@gmail.com
Password: “admin123”
Click login
1. Access the student dashboard.
2. View all owned Issued book
3. view all books in library
4.student can manage his/her own profile update username, email and also change own password.
## Features

- Book Management
- Category Management
- Student Management
- Book Issuing System
- Return Tracking
- Admin Dashboard with Statistics

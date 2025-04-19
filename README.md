# 🛍️ Elegance & Co. – E-Commerce Website

Welcome to **Elegance & Co.**, a professional Laravel-based e-commerce platform designed for modern online shopping experiences. This project was developed to offer a clean, secure, and fully functional web store with admin capabilities, customer features, and seamless shopping cart and checkout experiences.

---

## 🚀 Features

### 🛒 Customer Side
- Browse products with images, descriptions, and prices
- Search and filter products
- Add to cart / Update quantity / Remove items
- Secure customer registration and login
- Order history and account management
- Product reviews and ratings
- Responsive and modern design

### 🔐 Admin Dashboard
- Add / edit / delete products
- Manage inventory and stock
- Order management panel
- Customer and user management
- Admin login authentication
- Laravel middleware protection for admin routes

---

## 🛠️ Tech Stack

- **Framework**: Laravel (PHP)
- **Frontend**: Blade templating, HTML5, CSS3, Bootstrap
- **Backend**: PHP 8.x
- **Database**: MySQL
- **Authentication**: Laravel Breeze / Sanctum
- **Hosting**: Localhost or shared hosting (XAMPP/WAMP)
- **IDE**: VS Code / PHPStorm

---

## 📁 Project Structure
elegance-co/ ├── app/ ├── database/ ├── public/ ├── resources/ │ └── views/ # Blade templates ├── routes/ │ └── web.php ├── .env └── README.md
---

## 📦 Installation Guide

### ✅ Prerequisites
- PHP >= 8.1
- Composer
- MySQL or MariaDB
- Node.js & npm (for assets if using Laravel Mix)

### 🔧 Setup Steps

1. **Clone the repo**
   ```bash
   git clone https://github.com/zaynounjamal/elegance-co.git
   cd elegance-co
Install PHP dependencies
composer install
Configure .env
Copy .env.example to .env
Set your DB credentials and APP_URL
cp .env.example .env
php artisan key:generate
Set up database

Create a MySQL database (e.g., elegance_db)

Run migrations and seeders:
php artisan migrate --seed
Serve the app
php artisan serve
Access it in your browser
http://localhost:8000
🧪 Demo Accounts
🧑‍💼 Admin
Email: admin@elegance.com

Password: admin123

🛍️ User
Email: user@elegance.com

Password: user123

(Optional: update if you have seeders or demo login data)
📍 About the Project
This Laravel-based store was developed to practice and showcase full-stack e-commerce development skills including routing, database relations, authentication, and UI design. It is part of a larger ambition to deliver production-ready projects through The-Z-Agency.

👨‍💻 Developed By
Zaynoun Jamal
📚 Computer Science Student – Lebanese University
📱 +961 76 658 203
📩 zaynounjamal@gmail.com

📜 License
This project is open-source and available under the MIT License. Feel free to fork, use, or improve it!

# AFK Smart Cloud POS System v2.0 🚀

### 📌 Project Overview

**AFK Smart POS** is a modern, web-based Point of Sale system designed for small to medium-sized businesses. It features a sleek interface, real-time inventory management, and a unique **WhatsApp Billing Integration** that eliminates the need for paper receipts.

### ✨ Key Features

* **Dynamic Inventory Terminal:** Add products with name, price, description, and stock levels through a user-friendly panel.
* **Real-time Billing Engine:** A JavaScript-powered billing side-bar that calculates totals on the fly without page reloads.
* **WhatsApp Receipt Integration:** Automatically generates a professional text-based receipt and sends it directly to the customer's WhatsApp.
* **Role-Based Access Control:** Secure login system with Admin and Customer roles.
* **Low Stock Alerts:** Visual indicators when product quantity falls below a certain threshold.

### 🛠️ Technical Stack

* **Frontend:** HTML5, CSS3, JavaScript (Vanilla), Bootstrap 5.3.
* **Backend:** PHP 8.x (Procedural/OOP mix).
* **Database:** MySQL (Relational Schema).
* **Icons:** FontAwesome 6.4.

### 🔄 System Architecture & Data Flow

The system follows a modular architecture where the business logic is separated into the `actions/` folder, and UI components are managed via `partials/`.

### 🚀 Installation Guide

1. Clone the repository to your local server (XAMPP/WAMP).
2. Import the `smart_pos.sql` file into your phpMyAdmin.
3. Configure your database credentials in `config/db.php`.
4. Access the system via `http://localhost/smart-cloud-pos-system/`.

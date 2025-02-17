# ticket-management-system

## 📌 Project Overview
The **ticket-management-system** is a support ticket management designed to facilitate communication between users and support staff. It allows users to create and track support tickets while enabling administrators to manage and respond efficiently.

## 🚀 Features
### 🎫 Ticket Management
- Users can create support tickets.
- Tickets can be categorized (e.g., Technical, Billing, General Inquiry).
- Status updates (Open, In Progress, Closed).
- **📷 File Upload:** Users can attach images to describe their issue.

### 🔐 Authentication & User Roles
- User registration & login with OTP verification.
- Role-based access: Users, Support Agents, Admins.

### 📧 Notifications
- Email or InApp for ticket status changes.
- Dynamic Notification for users.

### 🏷️ Custom Fields
- Admins can define additional fields (e.g., Priority, Department).
- Dynamic validation for custom fields.

### 📊 Dashboard & Reports
- Admin dashboard with ticket statistics.
- Filtering and sorting of tickets.

## 🛠️ Tech Stack
- **Backend:** PHP (Laravel Framework)
- **Database:** MySQL
- **Authentication:** JWT-based authentication
- **Containerization:** Docker

## 📤 File Upload Support
- Users can **attach images** when creating a ticket.
- Supported formats: `jpeg, png, jpg, gif, svg, webp`
- Max file size: **2MB**

## 🔧 Installation
### Prerequisites
- PHP 8+
- Composer
- MySQL
- Docker (optional)

### Steps
```bash
# Clone the repository
git clone git@github.com:kaveh1999nazari/ticket-management-system.git
cd ticket-management-system

# Install dependencies
composer install

# Configure environment
cp .env.example .env

# Run migrations
php artisan migrate

# Start the server
php artisan serve

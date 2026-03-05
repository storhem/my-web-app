# Web Application Portfolio

A collection of web applications demonstrating various PHP, JavaScript, and frontend development skills. This repository contains multiple projects including a holiday reminder, e-commerce template, and several PHP/SQL utilities.

## Table of Contents
- [Projects Overview](#projects-overview)
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Installation & Setup](#installation--setup)
- [Project Details](#project-details)
  - [1. Holiday Reminder](#1-holiday-reminder)
  - [2. Jewelry Store Template](#2-jewelry-store-template)
  - [3. PHP/SQL Utilities](#3-phpsql-utilities)
- [API Documentation](#api-documentation)
- [Requirements](#requirements)
- [Contributing](#contributing)
- [License](#license)

## Projects Overview

This repository contains five distinct web applications:

1. **Holiday Reminder** - A simple web app displaying upcoming holidays and events
2. **Jewelry Store Template** - Responsive e-commerce website template
3. **Page View Counter** - Tracks page visits with server time display
4. **Guestbook Application** - CSV-based message board system
5. **Delivery Calculator** - AJAX-powered shipping cost calculator
6. **RESTful API** - JSON-based product management API

## Technologies Used

- **Backend:** PHP 7.0+
- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **Database:** File-based storage (JSON, CSV, TXT)
- **Frameworks:** Slim Framework (for REST API)
- **Tools:** Composer, jQuery, Modernizr
- **Development:** PHP Built-in Server, PHPStorm recommended

## Project Structure
my-web-app/
├── holiday-reminder/
│   ├── index.php
│   └── holidays.json
├── jewelry-shop/
│   ├── index.html
│   ├── style.css
│   ├── css/
│   │   └── vendor.css
│   ├── js/
│   │   ├── jquery.min.js
│   │   ├── plugins.js
│   │   └── script.js
│   └── images/
├── php-utilities/
│   ├── counter.php
│   ├── counter.txt
│   ├── guestbook.php
│   └── guestbook.csv
├── delivery-calculator/
│   ├── delivery.html
│   ├── getCities.php
│   └── calculate.php
├── rest-api/
│   ├── data/
│   │   └── products.json
│   ├── public/
│   │   └── index.php
│   └── vendor/
├── composer.json
└── README.md

## Installation & Setup

### Prerequisites
- PHP 7.0 or higher installed on your system
- Composer (for REST API project)
- Git (optional, for cloning)

### Quick Start

1. **Clone the repository:**
   git clone https://github.com/yourusername/my-web-app.git
   cd my-web-app

2. **Install dependencies (for REST API):**
   composer install

3. **Start the PHP development server:**
   php -S localhost:8000

4. **Access the applications:**
   - Main index: http://localhost:8000
   - Individual projects (see specific URLs below)

## Project Details

### 1. Holiday Reminder
A lightweight application displaying upcoming holidays sorted by date.

**Features:**
- Dynamic holiday list from JSON data source
- Chronological sorting of events
- Clean, minimalist interface

**Technologies:** PHP, HTML/CSS, JavaScript

**Access:** http://localhost:8000/holiday-reminder/

### 2. Jewelry Store Template
Professional e-commerce template suitable for jewelry stores or any retail website.

**Template Components:**
- **Header:** Logo and responsive navigation menu
- **Hero Banner:** Full-width promotional section
- **Categories Grid:** Product category showcase
- **Popular Products:** Featured items display
- **Blog Section:** Latest articles preview
- **Footer:** Complete with contact info and links

**Access:** Open `/jewelry-shop/index.html` directly in browser

### 3. PHP/SQL Utilities

#### Page View Counter
Tracks page loads and displays server time.

**Implementation:**
- Persistent storage in `counter.txt`
- Auto-incrementing visit counter
- Real-time server time display

**Access:** http://localhost:8000/php-utilities/counter.php

#### Guestbook Application
CSV-based message board with anonymous posting.

**Features:**
- Optional name field (defaults to "Anonymous")
- Semicolon-delimited CSV storage
- Messages displayed newest first
- Automatic file creation

**Access:** http://localhost:8000/php-utilities/guestbook.php

#### Delivery Calculator
AJAX-powered shipping cost calculator with city autocomplete.

**Features:**
- City selection from external API
- Real-time weight-based price calculation
- Client-side caching of city data
- Error handling with visual feedback
- No page reloads (AJAX implementation)

**API Endpoints Used:**
- Cities: `exercise.develop.maximaster.ru/service/city/`
- Delivery Calculation: `exercise.develop.maximaster.ru/service/delivery/`

**Access:** http://localhost:8000/delivery-calculator/delivery.html

### 4. RESTful API
Complete CRUD API for product management using JSON file storage.

**Base URL:** http://localhost:8000/rest-api/public/api/products

#### Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/products` | Retrieve all products |
| GET | `/api/products/{id}` | Get single product by ID |
| POST | `/api/products` | Create new product |
| PUT | `/api/products/{id}` | Update existing product |
| DELETE | `/api/products/{id}` | Remove product |

#### Request Examples

**Create Product (POST):**
curl -X POST http://localhost:8000/rest-api/public/api/products \
  -H "Content-Type: application/json" \
  -d '{"name": "Wireless Keyboard", "price": 2999}'


**Update Product (PUT):**
curl -X PUT http://localhost:8000/rest-api/public/api/products/1 \
  -H "Content-Type: application/json" \
  -d '{"name": "Mechanical Keyboard", "price": 4599}'


#### Sample Data (products.json)
[
  { "id": 1, "name": "Book: PHP Programming", "price": 29.99 },
  { "id": 2, "name": "Smartphone", "price": 299.99 }
]


## Requirements

- **PHP:** Version 7.0 or higher
- **Web Server:** Built-in PHP server or Apache/Nginx
- **Browser:** Modern browser with JavaScript enabled
- **Internet Connection:** Required for delivery calculator API calls
- **Recommended IDE:** PHPStorm, VS Code, or similar

## Testing

### API Testing
Use tools like:
- **Talend API Tester** (Chrome extension)
- **Postman**
- **cURL** (command line)

**Important:** All POST/PUT requests must include header:
```
Content-Type: application/json
```

### Browser Testing
- Chrome DevTools for JavaScript debugging
- Firefox Developer Edition for responsive design testing

## Notes & Limitations

- Data persistence is file-based (no database required)
- No authentication/authorization implemented
- REST API uses Slim Framework for routing
- Delivery calculator requires active internet connection
- All file paths are relative to project root

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is open-source and available under the MIT License.

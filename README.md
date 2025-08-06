# Modern PHP Login & Dashboard System

A modern, responsive user authentication system built with PHP and MySQL, featuring a beautiful Bootstrap 5 dashboard with smooth animations and a professional design.

## 🌟 Features

- **User Authentication**
  - Secure login system
  - Registration with validation
  - Password hashing
  - Session management

- **Modern Dashboard**
  - Responsive design
  - Beautiful UI with Bootstrap 5
  - Smooth animations and transitions
  - Interactive cards and widgets
  - Profile management
  - Security settings

- **Professional UI/UX**
  - Clean and modern interface
  - CSS variables for easy theming
  - Mobile-first approach
  - Smooth hover effects
  - Professional animations

## 🚀 Quick Start

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- [Composer](https://getcomposer.org/) (optional)

### Database Setup

1. Create a new MySQL database
2. Import the provided SQL schema:

```sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

### Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/modern-php-login.git
```

2. Configure the database connection
- Open `database.php`
- Update the database credentials:
```php
$hostName = "your_host";
$dbUser = "your_username";
$dbPassword = "your_password";
$dbName = "your_database";
```

3. Set up your web server
- Point your web server to the project directory
- Ensure PHP has write permissions for session handling

4. Access the application
- Visit `http://your-domain/login.php` to get started

## 📱 Features Overview

### User Authentication
- Secure login with password hashing
- User registration with validation
- Email verification (optional)
- Password reset functionality

### Dashboard
- Overview page with statistics
- Profile management
- Security settings
- Interactive navigation
- Responsive design for all devices

## 🎨 Customization

### Theme Colors
Edit the CSS variables in `style.css` to customize the theme:

```css
:root {
    --color-primary: #0d6efd;
    --color-primary-dark: #0a58ca;
    /* ... other color variables ... */
}
```

### Animations
- All animations are customizable through CSS variables
- Easily adjust timing and effects
- Mobile-optimized transitions

## 🔒 Security Features

- Password hashing using PHP's password_hash()
- SQL injection prevention with prepared statements
- XSS protection
- Session security
- CSRF protection (recommended to implement)

## 📱 Responsive Design

- Mobile-first approach
- Responsive breakpoints
- Touch-friendly interfaces
- Optimized for all screen sizes

## 🛠️ Technical Details

- PHP 7.4+
- MySQL 5.7+
- Bootstrap 5.3.3
- CSS Custom Properties
- Modern JavaScript

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
```bash
git checkout -b feature/YourFeature
```
3. Commit your changes
```bash
git commit -m 'Add some feature'
```
4. Push to the branch
```bash
git push origin feature/YourFeature
```
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details

## 🙏 Acknowledgments

- Bootstrap Team
- PHP Community
- Font Awesome
- Bootstrap Icons

## 📞 Support

If you have any questions or need help, please open an issue in the GitHub repository.

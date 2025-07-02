# LDAP User Management System

This project is a web-based **LDAP User Management and Activation Tool** developed in PHP. It allows administrators to manage LDAP users, activate accounts, export user data, and send activation emails with ease.

---

## 🚀 Features

- 🧑 View & manage LDAP users
- 🔐 Activate/Disable user accounts
- 📤 Send activation emails
- 📄 Export user data to PDF
- 📬 Email integration with PHPMailer
- ✅ Client-side validation using jQuery & Bootstrap Validator
- 🎨 Responsive UI using Bootstrap
## 🗂️ Project Structure
ldap/
├── index.php # Login or main dashboard
├── admin.php # Admin dashboard
├── empfile.php, empcon.php # Employee data handlers
├── activate.php # User activation
├── disable # Disable user accounts
├── export.php, pdfexport.php # Export features
├── sendmail.php, ldapmail.php # Email handlers
├── style.css # Custom styles
├── *.js # Bootstrap, jQuery scripts
## 📦 Requirements

- PHP 8.1
- Apache
- Access to LDAP server
- PHPMailer (already included in `vendor/` if used)
- Internet access (for some JS/CDN features)


## 🔗 Live Demo

You can view the live version hosted at IIT Madras here:  
🌐 [https://web.iitm.ac.in/ldaponline](https://web.iitm.ac.in/ldaponline)

---
- 
## 🙋‍♀️ Author

**Abithaparamachandran**

# Blog System

## Overview
This is a **single-user** blog system developed using **Yii 1.1 Framework** with **Tailwind CSS** for styling. The system allows an admin to manage posts and comments while guest users can read and comment on posts.

## Features

### **Admin Features**
- ✅ Login & Logout
- ✅ Create, Update, and Delete Posts
- ✅ Publish, Unpublish, and Archive Posts
- ✅ Approve and Delete Comments

### **Guest User Features**
- ✅ Read Published Posts
- ✅ Leave Comments on Posts

### **Additional System Features**
- ✅ Displays the most recent posts on the homepage
- ✅ Pagination for posts (max **10 per page**)
- ✅ View post details along with its comments
- ✅ List posts based on tags
- ✅ Tag cloud indicating usage frequency
- ✅ List of the most recent comments
- ✅ Fully themeable (Tailwind CSS)
- ✅ SEO-friendly URLs

---

## **Database Structure**

The blog system consists of **five** main database tables:

### **1. `tbl_user`**
Stores user login credentials.
- `id` (Primary Key)
- `username` (Unique, Required)
- `password` (Hashed, Required)

### **2. `tbl_post`**
Stores blog post details.
- `id` (Primary Key)
- `title` (Required)
- `content` (Required, Markdown Format)
- `status` (Required, **1 = Draft, 2 = Published, 3 = Archived**)
- `tags` (Comma-separated values, Optional)
- `create_time`
- `update_time`

### **3. `tbl_comment`**
Stores comments on blog posts.
- `id` (Primary Key)
- `post_id` (Foreign Key to `tbl_post`)
- `author` (Required)
- `email` (Required)
- `url` (Optional)
- `content` (Required, Plain Text)
- `status` (**1 = Pending, 2 = Approved**)
- `create_time`

### **4. `tbl_tag`**
Stores tag usage frequency.
- `id` (Primary Key)
- `name` (Unique, Required)
- `frequency` (Counts tag occurrences in posts)

### **5. `tbl_lookup`**
Stores generic lookup values for status mapping.
- `id` (Primary Key)
- `name` (Display Name, e.g., "Draft")
- `code` (Integer Representation, e.g., `1`)
- `type` (Category, e.g., `PostStatus`)
- `position` (Sort Order)

---

## **Technologies Used**

### **Backend**
- Yii 1.1 (PHP Framework)
- MySQL (Database)

### **Frontend**
- **Tailwind CSS** (For modern styling)
- FontAwesome (For icons)

### **Other Features**
- AJAX validation for forms
- Dynamic UI with Tailwind classes
- Mobile-responsive design

---

## **Installation Guide**

### **1. Clone the Repository**
```sh
git clone https://github.com/yourusername/blog-system.git
cd blog-system
```

### **2. Configure Database**
- Create a **MySQL database**.
- Update the **`protected/config/main.php`** file:
```php
'db' => array(
    'connectionString' => 'mysql:host=localhost;dbname=your_database_name',
    'emulatePrepare' => true,
    'username' => 'your_db_user',
    'password' => 'your_db_password',
    'charset' => 'utf8',
),
```

### **3. Install Dependencies**
Since Yii 1.1 does not have a package manager, you may need to manually ensure:
- PHP 5.6+ is installed
- MySQL is configured properly
- Tailwind CSS is linked in your layout file

### **4. Run the Application**
```sh
php -S localhost:8080
```
Open your browser and visit: `http://localhost:8080`

---

## **Usage**
### **Admin Login**
- Default Credentials:
  - **Username:** `admin`
  - **Password:** `admin`
- You can create new users directly in the database (`tbl_user`).

### **Creating a Post**
- Navigate to `Manage Posts` and click `Create New Post`.
- Fill in the title, content, tags, and choose a status (`Draft`, `Published`, `Archived`).
- Save the post and it will appear on the homepage if `Published`.

### **Managing Comments**
- Navigate to `Manage Comments`.
- Approve or delete comments.
- Pending comments appear under `Approve Comments`.

---

## **License**
This project is licensed under the **MIT License**. You are free to use, modify, and distribute it.

**Happy Coding! 🚀**

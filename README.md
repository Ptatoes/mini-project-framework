<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Blog Post - README</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        h2 {
            color: #555;
        }
        p {
            margin: 10px 0;
        }
        ul {
            margin: 10px 0 20px 20px;
        }
    </style>
</head>
<body>

    <h1>Travel Blog Post - Laravel 11 CRUD Project</h1>

    <h2>Project Overview</h2>
    <p>
        This project is a simple travel blog application built with Laravel 11. It allows users to manage blog posts related to travel destinations. Users can perform CRUD (Create, Read, Update, Delete) operations on posts and categories.
    </p>

    <h3>Database Structure</h3>
    <p>
        The application features relationships among three tables:
    </p>
    <ul>
        <li><strong>Users:</strong> Stores user information, allowing users to create and manage their own blog posts.</li>
        <li><strong>Posts:</strong> Contains details about each travel blog post, such as title, content, and publication date. Each post is linked to a user.</li>
        <li><strong>Categories:</strong> Classifies posts by travel type or destination, allowing users to easily filter and organize content.</li>
    </ul>
    <p>
        The <strong>Posts</strong> table has foreign key relationships with both the <strong>Users</strong> and <strong>Categories</strong> tables:
    </p>
    <ul>
        <li>Each post is associated with a specific user.</li>
        <li>Each post belongs to a specific category.</li>
    </ul>
    <p>
        This project aims to provide a user-friendly platform for sharing and exploring travel experiences.
    </p>

</body>
</html>

 

# Travel Blog Post - Laravel 11 CRUD Project

## Project Overview

This project is a simple travel blog application built with Laravel 11. It allows users to manage blog posts related to travel destinations. Users can perform CRUD (Create, Read, Update, Delete) operations on posts and categories.

### Database Structure

The application features relationships among three tables:
- **Users:** Stores user information, allowing users to create and manage their own blog posts.
- **Posts:** Contains details about each travel blog post, such as title, content, and publication date. Each post is linked to a user.
- **Categories:** Classifies posts by travel type or destination, allowing users to easily filter and organize content.

The **Posts** table has foreign key relationships with both the **Users** and **Categories** tables:
- Each post is associated with a specific user.
- Each post belongs to a specific category.

This project aims to provide a user-friendly platform for sharing and exploring travel experiences.

# My PHP Web Development Project
This repository contains my web development project for the third year of college. In the first semester, we were tasked with using PHP and a database of our choice to create an interactive website that allows users to register and retrieve information for specific tasks.

For this project, I developed a To-Do list application that enables users to create different pages with specific details. During the project presentation, I was asked to implement a feature that converts text to HTML and vice versa. However, due to time constraints, I was only able to complete part of the task.

## Technologies Used

<p align="center"><a href="https://www.php.net" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/800px-PHP-logo.svg.png" width="150" alt="PHP Logo"></a></p> 

<p align="center">PHP is a widely-used, open-source scripting language primarily designed for web development. It is an essential tool for building dynamic websites and web applications. In this project, PHP was used to handle user input, interact with the database, and display dynamic content. </p>

<p align="center"><a href="https://www.mysql.com" target="_blank"><img src="https://www.mysql.com/common/logos/logo-mysql-170x115.png" width="150" alt="MySQL Logo"></a></p>

<p align="center">MySQL is an open-source relational database management system (RDBMS). It is known for its speed and reliability, making it one of the most popular choices for web applications. In this project, MySQL was used to store and manage user data, including tasks, pages, and details for the To-Do list application. </p>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.</p>

## Features
>User Authentication:

Login and registration functionality built with Laravel authentication.
Errors are displayed for invalid credentials.

>Main Page:

Displays a personalized welcome message for logged-in users.
Users can create new pages dynamically.
Lists all user-specific pages with navigation options.
Includes a logout feature.

>Page Management:

Users can create, view, and update multiple pages.
Pages have editable titles and content.
Inline rich-text editor for formatting (e.g., bold, italic, underline).
Markdown and HTML conversion using turndown.js and markdown-it.

>Persistence:

Page data is stored in a MySQL database.
Changes to page titles and content are submitted and saved via a form.

>Frontend Logic:

JavaScript is used for localStorage-based active page tracking and updating the browser's URL dynamically.
Page transitions and rich-text editing functionalities enhance the user experience.

## Set Up the database

Visit the official MySQL download page and install MySQL Community Server and MySQL Workbench: https://dev.mysql.com/downloads/

Launch MySQL Workbench, create a new connection profile by specifying the host, port, username, and password and connect to the server

You will need the to create a .env file in the root folder with you own information which should look this:
```
ENGINE=django.db.backends.mysql
NAME='your_database'
USER='your_username'
PASSWORD='your_password',
HOST=localhost
PORT=3306
```

# This should be all, just run the php artisan serve command in the terminal and you should be good to go!

# Comrades Social Platform Website

Welcome to **Social Platform**, a modern social networking website built with PHP. This platform allows users to interact, share posts, connect with friends, and explore new content. Whether you're a developer looking to customize the code or a user interested in the platform's features, this README will help you get started.

---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
  - [Setting Up the Environment](#setting-up-the-environment)
  - [Configuring the Database](#configuring-the-database)
  - [Running the Application](#running-the-application)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

---

## Overview

**Social Platform** is a simple and scalable social media website where users can:
- Create accounts and log in securely.
- Post updates, images, and videos.
- Follow and interact with other users.
- Like, comment, and share content.
- Send private messages to friends.

The application is built using **PHP**, **MySQL**, and **Bootstrap** for the frontend. The backend includes basic user authentication, post management, and a responsive design.

---

## Features

- **User Authentication**: Register, login, and logout functionality.
- **Profiles**: Each user has their own profile page, where they can view their posts and edit their information.
- **Posts**: Users can create text-based posts and upload media.
- **Likes & Comments**: Users can like and comment on posts.
- **Friendship**: Ability to send friend requests and manage friends.
- **Private Messaging**: Users can send private messages to other users.
- **Responsive Design**: Fully responsive and mobile-friendly interface.
- **Search Functionality**: Search for users and posts.

---

## Requirements

Before you begin, ensure you have the following installed:

- **PHP** (version 7.4 or above)
- **MySQL**  (for database management)
- A **web server** (e.g., Apache or Nginx)
- **Composer** (for dependency management)
- **Xdebug** (optional, for debugging)

---

## Installation

### Setting Up the Environment

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/social-platform.git
   cd social-platform
   ```

2. **Install dependencies using Composer**:
   Ensure that Composer is installed on your machine. If it's not, download and install it from [here](https://getcomposer.org/download/).

   Then run:
   ```bash
   composer install
   ```

3. **Configure environment variables**:
   Copy the `.env.example` file to `.env`:
   ```bash
   cp .env.example .env
   ```

   Edit the `.env` file to set up your database connection:
   ```
   DB_HOST=localhost
   DB_NAME=comrades
   DB_USER=root
   DB_PASSWORD=
   ```

### Configuring the Database

1. **Create the database**:
   Run the following SQL command to create the database:
   ```sql
   CREATE DATABASE comrades;
   ```

2. **Import the database schema**:
   Import the SQL schema located in the `database/schema.sql` file to set up the required tables and structure.

   ```bash
   mysql -u root -p social_platform < database/schema.sql
   ```

3. **Populate the database with sample data** (optional):
   To help you get started with some initial data, you can import the `sample_data.sql` file.

   ```bash
   mysql -u root -p social_platform < database/sample_data.sql
   ```

### Running the Application

1. **Start your local development server**:
   - If you're using **Apache**:
     - Make sure that the Apache server is running and the project is in your `htdocs` or `www` directory.
     - Access the site via `http://localhost/social-platform`.
   
   - If you're using **PHP's built-in server** (for development):
     ```bash
     php -S localhost:8000 -t public
     ```

     Then navigate to `http://localhost:8000` in your browser.

2. **Access the app**:
   Open your web browser and visit:
   ```http
   http://localhost/comrades
   ```

3. **Login or Register**:
   - If you're running the app for the first time, you'll need to register a new account.
   - Once registered, log in to the platform to begin using it.

---

## Usage

Once the application is set up and running, you can:

- **Sign up** and create a new user account.
- **Login** using your credentials.
- **Update your profile** (add profile picture, bio, etc.).
- **Post updates** (text, images, videos).
- **Like and comment on posts**.
- **Send friend requests** and view friend lists.
- **Private messaging** to communicate with friends.



## Contributing

We welcome contributions to the **Social Platform**! If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -am 'Add new feature'`).
4. Push to your branch (`git push origin feature-name`).
5. Open a Pull Request.

---


**Social Platform** is a community-driven project. If you have any questions, feel free to open an issue or contribute to the development of this platform!

---



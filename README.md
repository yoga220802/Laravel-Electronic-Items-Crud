<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

This project is a Laravel-based web application for managing electronic items. It provides CRUD (Create, Read, Update, Delete) functionalities for electronic items, allowing users to manage their inventory efficiently.

## Getting Started

Follow these steps to set up and run the project after cloning the repository:

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js and npm
- A web server (e.g., Apache, Nginx)

### Installation

1. **Clone the repository:**

    **Repo 1:**
    ```sh
    git clone https://git.aztech.id/yogaa/Laravel-Electronic-Items-Crud.git
    
    
    cd your-repository
    ```

    **Repo 2:**
    ```sh
    git clone https://github.com/yoga220802/Laravel-Electronic-Items-Crud.git
    
    
    cd your-repository
    ```

2. **Install PHP dependencies:**
    ```sh
    composer install
    ```

3. **Install JavaScript dependencies:**
    ```sh
    npm install
    ```

4. **Copy the example environment file and configure the environment variables:**
    ```sh
    cp .env.example .env
    ```
    Open the `.env` file and set the necessary environment variables, such as database connection details.

5. **Generate the application key:**
    ```sh
    php artisan key:generate
    ```

6. **Run database migrations:**
    ```sh
    php artisan migrate
    ```

7. **Create a symbolic link from `storage` to `public`:**
    ```sh
    php artisan storage:link
    ```

8. **Build the front-end assets:**
    ```sh
    npm run dev
    ```

### Running the Application

Start the local development server:
```sh
php artisan serve
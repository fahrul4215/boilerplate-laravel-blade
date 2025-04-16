# Laravel Boilerplate with Blade & Livewire

## Prerequisites

Before starting, ensure your system meets the following requirements:

- **Node.js v20**: Download and install from [Node.js Official Website](https://nodejs.org/).
- **Composer**: Manage PHP dependencies by downloading Composer from [Composer Official Website](https://getcomposer.org/).
- **PHP**: Ensure PHP is installed and compatible with Laravel 12.
- **Laravel v12**: This boilerplate is built on Laravel version 12.
- **Livewire v3**: Utilizes Livewire version 3 for dynamic and reactive components.

## Setup Instructions

1. **Clone the Repository**:

    ```bash
    git clone <repository-url>
    cd boilerplate-laravel-blade
    ```

2. **Install Backend Dependencies**:

    ```bash
    composer install
    ```

3. **Configure Environment**:

    - Copy `.env.example` to `.env`:

        ```bash
        cp .env.example .env
        ```

    - Update `.env` with your database credentials.

4. **Run Migrations**:

    ```bash
    php artisan migrate
    ```

5. **Install Frontend Dependencies**:

    ```bash
    npm install
    npm run dev
    ```

6. **Start the Development Server**:

    ```bash
    php artisan serve
    ```

    Visit `http://localhost:8000` in your browser.

## Features

- **Database Configuration**: Easily configurable via the `.env` file.
- **Livewire Components**: Create dynamic components using:
- **Routing**: Define routes in `routes/web.php` to include Livewire components.
- **Authentication**: Use Laravel Jetstream or Breeze for authentication scaffolding.

## Notes

- Ensure your PHP and Node.js versions are compatible with the project requirements.
- Use `npm run build` for production-ready assets.

---

Enjoy it!

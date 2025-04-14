# Laravel Boilerplate with Blade & Livewire

## Requirements

- **Node.js v20**: Ensure you have Node.js installed. You can download it from [Node.js Official Website](https://nodejs.org/).
- **Composer**: Required for managing PHP dependencies. Download it from [Composer Official Website](https://getcomposer.org/).
- **PHP**: Make sure you have PHP installed (compatible with Laravel 12).
- **Laravel v12**: This boilerplate is built on Laravel version 12.
- **Livewire v3**: This project uses Livewire version 3 for dynamic components.

## Notes

- **Database Configuration**: After cloning the repository, make sure to set up your `.env` file with the correct database credentials. Run `php artisan migrate` to set up the database schema if needed.
- **Frontend Assets**: Use `npm install` to install frontend dependencies and `npm run dev` to compile assets.
- **Livewire Components**: You can create new Livewire components using the command `php artisan make:livewire ComponentName`. The component class will be created in `app/Http/Livewire/` and the corresponding Blade view in `resources/views/livewire/`.
- **Routing**: Ensure that your routes are properly configured in `routes/web.php` to include any Livewire components you create.
- **Authentication**: Consider using Laravel Jetstream or Breeze for authentication scaffolding if your application requires user authentication.

## Getting Started

To get started, clone the repository, install the dependencies, and run the application using `php artisan serve`. Visit `http://localhost:8000` in your browser to see your application in action.

---

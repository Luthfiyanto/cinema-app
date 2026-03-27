# CINEMA APP

Technical Stress Test - Rental Movie APP
Built with Laravel 11

## Installation

1. Clone repository
    ```bash
    git clone https://github.com/Luthfiyanto/cinema-app.git
    ```
2. Install dependencies
    ```bash
    composer install
    ```
    Note: Make sure PHP version >= 8.2
3. Copy environment file
    ```bash
    cp .env.example .env
    ```
4. Configure database in .env
5. Generate app key
    ```bash
    php artisan key:generate
    ```
6. Run migration
    ```bash
    php artisan migrate
    ```
7. Seed database
    ```bash
    php artisan db:seed
    ```
8. Run server
    ```bash
    php artisan serve
    ```

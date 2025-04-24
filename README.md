# Backend Setup for Laravel Project

Follow these steps to set up and run the Laravel backend locally.

## 1. Clone the Project

Clone the repository to your local machine:

```
git clone https://github.com/hixvmx/taskflow-backend.git
```

## 2. Install Dependencies

Navigate to the project directory and install all Composer dependencies:

```
composer install
```

## 3. Connect the Database

1. Copy the `.env.example` file to `.env`:

```
cp .env.example .env
```

2. Open the `.env` file and update the database configuration:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

FRONTEND_URL=http://localhost:9000
```

## 4. Run Migrations

Create the database tables by running:

```
php artisan migrate
```

## 5. Seed the Database

Populate the database with sample data:

```
php artisan db:seed
```

## 6. Serve the Application

Start the Laravel development server:

```
php artisan serve
```

## 7. Visit the Application

Once the server is running, open your browser and visit:

```
http://localhost:8000
```

---

### 🚀 Built by **https://www.hixvm.com**

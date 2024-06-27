# News Website

A small news website built using Laravel and Bootstrap, featuring a responsive design and organized code structure for scalability and maintainability.

## Features

- List of news articles on the homepage
- Detailed article view with related articles, likes, and comments
- AJAX functionality for liking articles
- Responsive design with CSS Grid and Flexbox
- User authentication and article views tracking

## Requirements

- PHP 8.0 or higher
- Composer
- MySQL
- Node.js and npm (for frontend dependencies)

## Installation

### Step 1: Clone the Repository
```bash
git clone https://github.com/NacirChahine/news-site.git
cd news-site
```

### Step 2: Install Dependencies

```bash
composer install
npm install
```

### Step 3: Environment Configuration

Copy the .env.example file to .env and update the necessary environment variables, such as database credentials.
```bash
cp .env.example .env
```

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

### Step 5: Database Migration

Ensure your MySQL server is running and the database specified in the .env file exists. Then run the following command to migrate the database:
```bash
php artisan migrate
```

### Step 6: Database Seeding

Populate the database with sample data:
```bash
php artisan db:seed
```

### Step 7: Run the Application

Start the development server:
```bash
php artisan serve
```
In another terminal, run the JavaScript server:
```bash
npm run dev
```
The application will be accessible at http://127.0.0.1:8000.

# Usage

## Homepage

The homepage lists all the news articles with two different displays:

- A grid of 5 featured articles at the top using CSS Grid.
- A news stream below using Flexbox.

## Article Page

The article page includes:

- The site's title
- The article's title, contents, and images
- Meta tags for search and social media
- Facebook "Share" and Twitter "Tweet" buttons
- A button to increment the article's like counter using AJAX
- A section for related articles and user comments

## User Authentication

Users can register and log in to comment on articles.

# Development

## Frontend

The frontend is built using Bootstrap for responsive design and Blade templates for server-side rendering. CSS Grid and Flexbox are utilized for layout management.

## Backend

The backend is powered by Laravel, featuring:

- MVC architecture for clean code organization
- Eloquent ORM for database interactions
- Built-in security features such as CSRF protection and input validation

## Controllers

Three main controllers manage the functionality:

- `HomeController` for the homepage
- `ArticleController` for individual article pages, including AJAX for likes and comments
- `CommentController` for managing article comments

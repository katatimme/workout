# Workout Organisation Helper

## Development Requirements

-   PHP 7.4
-   [Composer](https://getcomposer.org/) 2.0
-   [Laravel](https://laravel.com/docs/8.x) 8.x

## Installation

### Laravel

Install Laravel according to the [official installation guide](https://laravel.com/docs/8.x/installation). Within you have installed PHP, Composer and mysql.

### Getting Started

```shell
# Install npm dependencies
npm install

# Drop all tables and rerun all migrations
php artisan migrate:fresh --seed

# Run the application
npm run dev

# OR Run the application in watch mode
npm run watch
```

Now you are ready to go. Hit workout.test in the browser and explore.

## Description

### Views

There are five different customly created views included. The home view is as simple as it sounds, motivating the visiter to use this app. The /exercises view shows all the exercises saved in the database with the three different difficulty levels. In the /workouts view you find your dashboard with all the workouts you have saved. From there you can create a new workout or edit your already created ones by clicking on them. Creating a new workout in the /workouts/new view makes you enter a name, choose a difficulty and four exercises. In the /workouts/{id} view you can edit or delete the workout with the specific id. The other views for authentication come with the Laravel Breeze starter kit.

### Database

This app includes three database tables, one for the users, one for the exercises and one for the workouts. In the exercises table we seed the data once starting the app and do not overwrite any of the seeded data. In the workouts table we put in the workouts, edit existing ones and can delete them rows.

### Authentification

For authentification the starter kit Laravel Breeze is used. The password reset functionality is properly added using the mailer host in sendgrid from a different project.

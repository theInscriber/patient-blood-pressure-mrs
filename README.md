# Patient Blood Pressure Medical Records System
Implemented according to the specifications in the assignment document

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x)

#### Assumption!
You are using Laravel Sail to set up your local development environment

Clone the repository

    git clone git@github.com:theInscriber/patient-blood-pressure-mrs.git

Switch to the repo folder

    cd laravel-people-api

Spin up Docker containers with Sail to start the local development environment

    sail up -d

Install all the dependencies using composer

    sail composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    sail artisan key:generate

Create Symbolic Link to Storage Folder in Public Folder

    sail artisan storage:link

Run the database migrations (**Set the database connection in .env before migrating**)

    sail artisan migrate

You can now access the server at http://localhost

**TL;DR command list**

    git clone git@github.com:theInscriber/patient-blood-pressure-mrs.git
    cd patient-blood-pressure-mrs
    sail up -d
    sail composer install
    cp .env.example .env
    sail artisan key:generate
    sail artisan storage:link

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    sail artisan migrate
    sail artisan db:seed


----------

# Authentication
The system requires authentication to use. The assumption is that a User is a Nurse and those have to be registered to use the App.

## Predefined Nurses/Users
You can use the ones below to authenticate with API

    Username : nurse@clinic.com
    Password : Nurse@2021

You can update the default Nurse credentials in the `database/seeders/DatabaseSeeder.php` 

----------

# Testing
Run the command below to run tests


    sail artisan test

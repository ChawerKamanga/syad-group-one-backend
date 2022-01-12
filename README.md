## MUST ONLINE HOSTEL ACCOMODATION MANEGEMENT SYSTEM ##

- This project uses [Laravel](https://laravel.com) for the backend
- We also made use of [Meilisearch](https://www.meilisearch.com/) for smooth search experience
- The frontend has beautiful JavaScript's popup boxes thanks to [SweetAlert](https://sweetalert2.github.io)

### Installation ###


1. Run `git clone https://github.com/ChawerKamanga/syad-group-one-backend.git`
2. cd into the project 
3. Install Composer Dependencies by running `composer install`
4. Install NPM Dependencies by running `npm install`
5. Create a copy of the .env file by running `cp .env.example .env`
6. Generate an app encryption key by running `php artisan key:generate`
7. Create an empty database for the application
8. In the .env file, add database information to allow Laravel to connect to the database
![Image of the .env!](/readmeimages/screenshot.png)
9. Migrate the database by running `php artisan migrate`
10. Run development server by running `php artisan serve`
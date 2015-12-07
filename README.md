# vzb
Vodic za brucose :book:

This project is build in 48h, on Open Data Hakaton from 4. to 6. decembar in Belgrade, Serbia.
There are some known issues, but we hope we will fix those soon. Keep in mind that the hole front-end is built in 2 hours. :smile:

# To build

Create new database

Create .env file from .env.example and update database details

`composer install`

`php artisan key:generate`

`php artisan cache:clear`

`npm install`

# To start

`npm start`


# API URL (GET and POST methods are allowed)
/api/v1/schools - Get all schools

/api/v1/schools/{id} - Get school per ID

/api/v1/schools/type/{type} - Get schools by type
    
    types:
    - strukovne
    - umetnost
    - tehnicke
    - prirodne
    - drustvene
    - medicinske
    
/api/v1/schools/espb/{espb} - Get schools by ESPB

/api/v1/dorms - Get all dorms

/api/v1/dorms/{id} - Get dorm per ID

/api/v1/organizations - Get all organizations

/api/v1/organizations/{id} - Get organization per ID

/api/v1/events - Get all events

/api/v1/events/{id} - Get event per ID

/api/v1/faq - Get all faqs

/api/v1/faq/{id} - Get faq per ID

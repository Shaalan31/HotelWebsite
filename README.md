<p align="center"><img src="https://github.com/Shaalan31/HotelWebsite/blob/master/public/imgs/marriott.png"></p>

## Hotel Website
A website used for viewing the hotel's information, services and for online booking. In addition to an admin tool for the website. 
The customer can sign up/login/logout, view the hotel details in about us page, view the hotel rooms and their types, book available rooms, view his booking request status, rate the hotel, add a review, view others' reviews and view a trip advisor for the chosen hotel branch.
In addition, the admin can login/logout, view bookings from customers, accept or reject a booking request, view rooms in the system, add new room, and block customer to prevent him from booking.

## Screenshots
Some screenshots from the website:
* Customers Interface

    *Home Page*
    
    ![Home][home] 

    *Login Page*
    
    ![Login][login] 
    
    *Book Now Page*
        
    ![Book][book] 
    
* Admin Interface
    
    *Admin Home Page*
    
    ![Admin][admin] 

    *Bookings Page*
    
    ![BookingsAdmin][bookingsAdmin]
    
    *Customers Page*
    
    ![CustomersAdmin][customersAdmin]
    
    *Rooms Page*
      
    ![RoomsAdmin][roomsAdmin]

## Technologies
This project is implemented using:
* Laravel Framework 
* Bootstrap
* Html5
* CSS 
* JavaScript
  
## Getting Started
* Clone the repo
    ```
    $ git clone https://github.com/Shaalan31/HotelWebsite
    ```
* Create database locally on PhpMyAdmin named ys_hotel.
* Import database, run [hotel.sql](https://github.com/Shaalan31/HotelWebsite/blob/master/hotel.sql) on PhpMyAdmin.
* Rename .env.example file to .env inside your project root and fill the database and mail information.
* Cd in your project
    ```
    $ cd HotelWebsite
    ```
* Run Command
    ```
    $ php artisan serve 
    ```

## Prerequisites
* Install Wampserver64
* Install Laravel Composer

## Authors
* **Samar Gamal**  - [SamarGamal](https://github.com/SamarGamal)

See also the list of [contributors](https://github.com/Shaalan31/HotelWebsite/graphs/contributors) who participated in this project.

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


[home]: https://github.com/Shaalan31/HotelWebsite/blob/master/readme_images/Home.JPG "Home Page"
[login]: https://github.com/Shaalan31/HotelWebsite/blob/master/readme_images/login.JPG "Login Page"
[admin]: https://github.com/Shaalan31/HotelWebsite/blob/master/readme_images/admin.JPG "Admin Home Page"
[bookingsAdmin]: https://github.com/Shaalan31/HotelWebsite/blob/master/readme_images/BookingsAdmin.JPG "Bookings Page"
[customersAdmin]: https://github.com/Shaalan31/HotelWebsite/blob/master/readme_images/CustomersAdmin.JPG "Customers Page"
[roomsAdmin]: https://github.com/Shaalan31/HotelWebsite/blob/master/readme_images/RoomsAdmin.JPG "Rooms Page"
[book]: https://github.com/Shaalan31/HotelWebsite/blob/master/readme_images/book.JPG "Book Now Page"
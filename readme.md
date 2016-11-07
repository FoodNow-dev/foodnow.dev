 ##FoodNow 

 FoodNow facilitates the process of planning where to meet for dinner with friends by decreasing the amount of choices people have to make about where to eat. This website was designed to help users choose restaurants without experiencing the decision-paralysis that is so common when eating out in groups. By incorporating Google Maps and the Google Places API into our website, users can view the location, menu, hours of operation, and other restaurant details. Once a user chooses a restaurant, a text message is sent to the group of friends they want to have dinner with, containing the information of the chosen restaurant. I implemented this feature by integrating the Twilio API into our existing Laravel framework. Bootstrap was incorporated to give the user a mobile friendly-experience. Various jquery plugins were also incorporated to provide form validation and aesthetically pleasing alerts. If you would like to learn more about this project, please feel free to contact me.

 Google Maps API:

Google Maps is a desktop web mapping service developed by Google. It offers satellite imagery, street maps, 360° panoramic views of streets (Street View), real-time traffic conditions (Google Traffic), and route planning for traveling by foot, car, bicycle (in beta), or public transportation.

Google Maps began as a C++ desktop program designed by Lars and Jens Eilstrup Rasmussen at Where 2 Technologies. In October 2004, the company was acquired by Google, which converted it into a web application. After additional acquisitions of a geospatial data visualization company and a realtime traffic analyzer, Google Maps was launched in February 2005.[1] The service's front end utilizes JavaScript, XML, and Ajax. Google Maps offers an API that allows maps to be embedded on third-party websites,[2] and offers a locator for urban businesses and other organizations in numerous countries around the world. Google Map Maker allows users to collaboratively expand and update the service's mapping worldwide. -wikipedia

Google Places API:

The Google Places Web Service is a service that returns information about a "place": an establishment, a geographic location, or prominent point of interest using an HTTP request. Place requests specify locations as latitude/longitude coordinates. Two basic Place requests are available: a Place Search request and a Place Details request. Generally, a Place Search request is used to return candidate matches, while a Place Details request returns more specific information about a Place.-programmableweb.com

Twilio API:

The Twilio API is an API that allows users to send text messages, voice messages, videos, and authentication from one's app. 

Twilio uses Amazon Web Services to host telephony infrastructure and provide connectivity between HTTP and the public switched telephone network (PSTN) through its APIs.[20]

Twilio follows a set of architectural design principles to protect against unexpected outages, and received praise for staying online during the widespread Amazon Web Services outage in April 2011.[21]

Twilio supports the development of open-source software and regularly makes contributions to the open-source community. In June 2010 Twilio launched OpenVBX, an open-source product that lets business users configure phone numbers to receive and route phone calls.[22] One month later, Twilio engineer Kyle Conroy released Stashboard, an open-source status dashboard written in the Python programming language that any API or software service can use to display whether their service is functioning properly.[23] Twilio also sponsors Localtunnel, created by now ex-Twilio engineer Jeff Lindsay, which enables software developers to expose their local development environment to the public internet from behind a NAT.[24] -wikipedia

jQuery:

jQuery is a cross-platform JavaScript library designed to simplify the client-side scripting of HTML.[3] jQuery is the most popular JavaScript library in use today, with installation on 65% of the top 10 million highest-trafficked sites on the Web.[4][5][6] jQuery is free, open-source software licensed under the MIT License.[2]

jQuery's syntax is designed to make it easier to navigate a document, select DOM elements, create animations, handle events, and develop Ajax applications. jQuery also provides capabilities for developers to create plug-ins on top of the JavaScript library. This enables developers to create abstractions for low-level interaction and animation, advanced effects and high-level, themeable widgets. The modular approach to the jQuery library allows the creation of powerful dynamic web pages and Web applications. -wikipedia





 Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

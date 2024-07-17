<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

Events Management System using Laravel 10.3 with REST API
This project is a demonstration of my proficiency in using Laravel 10.3 for managing events, attendees, and users through RESTful APIs. It includes:

Database Management: Using MySQLite connection with DB Browser for database management.
API Endpoints: Comprehensive API endpoints for CRUD operations on events, attendees, and users.
Validation: Input validation to ensure data integrity.
Relationships: Proper Eloquent relationships between models (Users, Events, and Attendees).
This project showcases my ability to develop a full-featured application using Laravel, suitable for inclusion in my professional portfolio.

## Code Structure
### Controllers:

#### AttendeeController.php: Manages CRUD operations for attendees.
#### EventController.php: Manages CRUD operations for events.
#### UserController.php: Manages CRUD operations for users.
#### Models:

### User.php: Defines the User model and its relationships.
### Event.php: Defines the Event model and its relationships.
### Attendee.php: Defines the Attendee model and its relationships.

## Endpoints:

### Attendees:
#### GET /api/attendees: List all attendees.
#### POST /api/attendees: Create a new attendee.
#### GET /api/attendees/{id}: Show a specific attendee.
#### PUT /api/attendees/{id}: Update a specific attendee.
#### DELETE /api/attendees/{id}: Delete a specific attendee.
### Events:
#### GET /api/events: List all events.
#### POST /api/events: Create a new event.
#### GET /api/events/{id}: Show a specific event.
#### PUT /api/events/{id}: Update a specific event.
#### DELETE /api/events/{id}: Delete a specific event.
### Users:
#### GET /api/users: List all users.
#### POST /api/users: Create a new user.
#### GET /api/users/{id}: Show a specific user.
#### PUT /api/users/{id}: Update a specific user.
#### DELETE /api/users/{id}: Delete a specific user.

## Endpoints Documentation

### Create a User
**Endpoint:** `POST /api/user`

**Description:** Create a new user.

**Request:**

```bash
curl -X POST "http://localhost:8000/api/user" \
-H "Content-Type: application/json" \
-d '{
  "name": "New User",
  "surname": "User Surname",
  "email": "newuser@example.com",
  "password": "password123",
  "dateOfBirth": "2000-01-01"
}'
```
## Additional Improveents:
### Authentication: Implement user authentication using Laravel Passport or Sanctum.
```bash
composer require laravel/sanctum
```
### Testing: Write unit and feature tests for your controllers and models.
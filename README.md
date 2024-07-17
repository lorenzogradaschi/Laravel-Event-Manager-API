<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

Events management using Laravel 10.3, with Rest API
I used MySqlite connection, open the Database with DB Browser

## Endpoints Documentation
## 1. Create a User
Endpoint: POST /api/user

Description: Create a new user.

Request:

curl -X POST "http://localhost/api/user" \
-H "Content-Type: application/json" \
-d '{
  "name": "New User",
  "surname": "User Surname",
  "email": "newuser@example.com",
  "password": "password123",
  "dateOfBirth": "2000-01-01"
}'
Response:

{
  "id": 1,
  "name": "New User",
  "surname": "User Surname",
  "email": "newuser@example.com",
  "date_of_birth": "2000-01-01",
  "created_at": "2024-07-17T12:34:56.000000Z",
  "updated_at": "2024-07-17T12:34:56.000000Z"
}
## 2. Create an Event
Endpoint: POST /api/events

Description: Create a new event.

Request:

curl -X POST "http://localhost/api/events" \
-H "Content-Type: application/json" \
-d '{
  "name": "Event Name",
  "description": "Event Description",
  "date": "2024-07-17"
}'
Response:


{
  "id": 1,
  "name": "Event Name",
  "description": "Event Description",
  "date": "2024-07-17",
  "created_at": "2024-07-17T12:34:56.000000Z",
  "updated_at": "2024-07-17T12:34:56.000000Z"
}
## 3. Create an Attendee
Endpoint: POST /api/events/{event}/attendees

Description: Create a new attendee for a specific event.

Request:

curl -X POST "http://localhost/api/events/1/attendees" \
-H "Content-Type: application/json" \
-d '{
  "name": "Attendee Name",
  "email": "attendee@example.com"
}'

Response:

{
  "id": 1,
  "name": "Attendee Name",
  "email": "attendee@example.com",
  "event_id": 1,
  "created_at": "2024-07-17T12:34:56.000000Z",
  "updated_at": "2024-07-17T12:34:56.000000Z"
}
## Additional Endpoints
Retrieve a User by ID
Endpoint: GET /api/user/{id}

Request:


curl -X GET "http://localhost/api/user/1"
Response:

json
Copy code
{
  "id": 1,
  "name": "New User",
  "surname": "User Surname",
  "email": "newuser@example.com",
  "date_of_birth": "2000-01-01",
  "created_at": "2024-07-17T12:34:56.000000Z",
  "updated_at": "2024-07-17T12:34:56.000000Z"
}
## Update a User by ID
Endpoint: PUT /api/user/{id}

Request:

curl -X PUT "http://localhost/api/user/1" \
-H "Content-Type: application/json" \
-d '{
  "name": "Updated User Name",
  "surname": "Updated User Surname",
  "email": "updated_user@example.com",
  "password": "newpassword",
  "dateOfBirth": "2000-01-01"
}'

Response:

{
  "id": 1,
  "name": "Updated User Name",
  "surname": "Updated User Surname",
  "email": "updated_user@example.com",
  "date_of_birth": "2000-01-01",
  "created_at": "2024-07-17T12:34:56.000000Z",
  "updated_at": "2024-07-17T12:36:56.000000Z"
}

## Delete a User by ID
Endpoint: DELETE /api/user/{id}

Request:

curl -X DELETE "http://localhost/api/user/1"
Response:

{
  "message": "User deleted successfully"
}

## Retrieve All Events
Endpoint: GET /api/events

Request:

curl -X GET "http://localhost/api/events"
Response:

[
  {
    "id": 1,
    "name": "Event Name",
    "description": "Event Description",
    "date": "2024-07-17",
    "created_at": "2024-07-17T12:34:56.000000Z",
    "updated_at": "2024-07-17T12:34:56.000000Z"
  }
]
## Retrieve All Attendees for an Event
Endpoint: GET /api/events/{event}/attendees

Request:


curl -X GET "http://localhost/api/events/1/attendees"
Response:

[
  {
    "id": 1,
    "name": "Attendee Name",
    "email": "attendee@example.com",
    "event_id": 1,
    "created_at": "2024-07-17T12:34:56.000000Z",
    "updated_at": "2024-07-17T12:34:56.000000Z"
  }
]

## This documentation should help you interact with your Laravel API using cURL


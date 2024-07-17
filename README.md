<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

Events management using Laravel 10.3, with Rest API.
I used MySqlite connection, open the Database with DB Browser.
For the remaining endpoints I will update the Readme
This project is just a proof/demonstration that I know how to use Laravel for My Portfolio, 

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

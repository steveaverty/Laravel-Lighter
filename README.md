# LIGHTER

<!-- [![Build Status](https://travis-ci.org/Zizaco/entrust.svg)](https://travis-ci.org/Zizaco/entrust)
[![Version](https://img.shields.io/packagist/v/Zizaco/entrust.svg)](https://packagist.org/packages/zizaco/entrust)
[![License](https://poser.pugx.org/zizaco/entrust/license.svg)](https://packagist.org/packages/zizaco/entrust)
[![Total Downloads](https://img.shields.io/packagist/dt/zizaco/entrust.svg)](https://packagist.org/packages/zizaco/entrust) -->


Lighter is a package htaht help you improve performances of your request. You can specify which data you want to keep in your model or let the client request what he wants. 

## Installation

In order to install Lighter, just use compose:

```bash
composer require "avertys/lighter"
```

## How to use Lighter

### On model

To use lighter on your model you have to add Saverty\Lighter\LighterTrait to your model

```php
class User extends Model
{
    use LighterTrait;

    protected $appends = ['fullname'];
}
```

Then you just have to write the folling code. In this example, accessors are not calculated. 
```php
$user = User::find(1);

return response()->json(
    $user->lighter()->keep(['name', 'address']);
, 200);

/*
{
    "name" : "Steve",
    "age" : "28" 
}
*/

```
You also can use lighter on collection with the helper.

```php
$users = User::all();

return response()->json(
    lighter($users)->keep(['name', 'address']);
, 200);

/*
{
    "name" : "Steve",
    "age" : "28" 
},
{
    "name" : "John",
    "age" : "35" 
},
*/

```
Helper can be use on model

```php
$user = User::find(1);

return response()->json(
    lighter($user)->keep(['name', 'address']);
, 200);

/*
{
    "name" : "Steve",
    "age" : "28" 
},
{
    "name" : "John",
    "age" : "35" 
},
*/

```

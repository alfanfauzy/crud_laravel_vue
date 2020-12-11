# 🌐 CRUD Laravel VueJS 🌐

This website which allow user to Create, Read, Update and Delete Customer Data. 
Build with VueJS as Frontend , Laravel as Backend.

## ⚒️ Tech

* [VueJS](https://vuejs.org/)
* [Laravel](https://laravel.com/)



## 📗 Installation

**// Get Source Code**
```
$ https://github.com/alfanfauzy/crud_laravel_vue
$ cd crud_laravel_vue
```

**// Create your own Database**

**// Create file .env, update like your Database credential**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE={your_database}
DB_USERNAME={your_username}
DB_PASSWORD={your_password}
```

**// Create Table**
```
$ php artisan migrate
```

**// Generate Key**
```
$ php artisan key:generate
```

**// Deploy VueJS**
```
$ npm run dev
```

**// Run Laravel Server**
```
$ php artisan serve
```
---
Access the website in http://127.0.0.1:8000/ or [localhost:8000](localhost:8000)

---

## 💌 Rest API End Point

| HTTP Verb |         Path          |              Used For               |
| --------- | --------------------- | ----------------------------------- |
| GET       | /customer             | Get all customer data
| POST      | /customer/add         | Add new customer data
| GET       | /customer/edit/{id}   | Get data where {id}
| GET       | /customer/show/{id}   | Show detail data customer where {id}
| PUT       | /customer/update/{id} | Update data customer where {id}
| Delete    | /customer/delete/{id} | Delete data customer where {id}

### License
----
MIT

**Free Software, Hell Yeah!**
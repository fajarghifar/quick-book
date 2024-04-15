## ✨ Laravel Reservations

A reservation management system built with Laravel 10 and MySql.

## 💀 Design Database
![Design Database](https://github.com/fajarghifar/laravel-reservations/assets/71541409/bcaa6b71-054d-4837-bd2e-bed3518948aa)

## 😎 Features
- Admin Role and Company Management
- User Management by Admin
- Company Owner User Management
- Guide Management
- Activity Management and Guide Assignmenttertentu.
- PDF Export for Guides (Reporting)

## 🚀 How to Use
1.  **Clone Repository or Download**

    ```bash
    $ git clone https://github.com/fajarghifar/laravel-reservations.git
    ```

1. **Setup**
    ```bash
    # Go into the repository
    $ cd laravel-reservations

    # Install dependencies
    $ composer install

    # Open with your text editor
    $ code .
    ```

1. **.ENV**

    Rename or copy the `.env.example` file to `.env`
    ```bash
    # Generate app key
    $ php artisan key:generate
    ```

1. **Setup Database**

    Setup your database credentials in your `.env` file.

1. **Migrate Database**
    ```bash
    $ php artisan migrate --seed
    ```

1. **Create Storage Link**
    ```bash
    $ php artisan storage:link
    ```

1. **Run Server**
    ```bash
    $ php artisan serve
    ```

1. **Login**
    - Try logging in as an admin with email: `admin@email.com` and password: `password`
    - Try logging in as a company owner with email: `owner@email.com` and password: `password`
    - Try logging in as a guide with email: `guide@email.com` and password: `password`

## 📝 Contributing

If you have any ideas to make it more interesting, please send a PR, or create an issue for a feature request.

# 🤝 License

### [MIT](LICENSE)

> Github [@fajarghifar](https://github.com/fajarghifar) &nbsp;&middot;&nbsp;
> Youtube [@fajarghifar](https://www.youtube.com/@fajarghifar/) &nbsp;&middot;&nbsp;
> Instagram [@fajarghifar](https://instagram.com/fajarghifar) &nbsp;&middot;&nbsp;
> Linkedin [@fajarghifar](https://www.linkedin.com/in/fajarghifar/)

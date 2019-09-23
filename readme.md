# Тестовое задание

Необходимо сделать поиск видео по названию через API YouTube, при открытии видео показывает его через frame и сохраняет в БД, далее сохраненное видео участвует так же в поиске

## Требования

* PHP >= 7.2
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Sqlite
* Composer

## Установка

> git clone https://github.com/Levsha-cc/testtask.git
> cd testtask
> composer install

В файле .env меняем путь к файлу на свой

> DB_DATABASE=/home/levsha/looklitest/database/database.sqlite

Запускаем сервер

> php -S localhost:8000 -t public

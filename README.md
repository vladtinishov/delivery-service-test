## Установка


Установить зависимости

```sh
composer install
```

Перейти в файл .env (если нет, то нужно создать) и добавить туда переменную CURRENCY_API_TOKEN

```sh
CURRENCY_API_TOKEN=''
```

Затем нужно перейти в https://currencyapi.com/ и авторизоваться.
После входа скопировать Default key с главной страницы и вставить в CURRENCY_API_TOKEN

```sh
CURRENCY_API_TOKEN='{token}'
```

## Запуск
```sh
php artisan server
```

Сайт будет доступен по адресу
```sh
127.0.0.1:8000
```


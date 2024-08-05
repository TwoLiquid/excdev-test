# Тестовое задание Excdev

## Переменные окружения

Создать на базе файла **.env.example** новый файл **.env** (при необходимости запросить данные).

## Окружение

Теперь из корня склонированного проекта собираем **Docker**:

```
docker-compose build
docker-compose up -d
```

Далее заходим в **PHP** контейнер:

```
docker exec -it php bash
```

Отсюда мы уже можем запускать любые **Laravel** команды:

```
composer install
php artisan key:generate
php artisan migrate
```

Ставим всё для **Npm** и миксуем:

```
npm install laravel-mix --save-dev
npm install jquery-ui --save-dev
npx mix
```

Далее - создаем юзера через **Artisan** команду:

```
php artisan user:create --name=TwoLiquid --email=twoliquid@gmail.com --password=qwerty
```

Теперь мы готовы запускать операции с балансом. Для этого надо запустить воркер: 

```
php artisan queue:work
```

И можно запускать **Laravel Queue** события для увеличение / уменьшения балланса:

```
php artisan user:balance --user=twoliquid@gmail.com --type=increase --amount=1000
php artisan user:balance --user=twoliquid@gmail.com --type=decrease --amount=300
```

**P.S.** Если пытаемся уйти в минус - транзакция завернется с исключением

## P.S. Папка storage и права

Убедитесь, что в папке **/storage** созданы все необходимые папки и дайте права на запись в эту папку со всеми вложенными:

```
storage
    app
    framework
        cache
        sessions
        views
    logs
```

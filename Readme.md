# README

Проект создан для того чтоб иметь возможность посмотреть различные виды профайлеров.
В докере установлены
* [XDebug](https://xdebug.org/)
* [XHprof](https://tideways.io/profiler/xhprof-for-php7-php5.6) (вернее совместимая с php 7 версия TideWays) 
* [Blackfire](htpps://blackfire.io) агент
* И небольшой демо проект на базе [silex](https://silex.symfony.com/)

# Запуск

У вас должен быть установлен docker и docker-compose. 
Если не установлен, установить можно по следующей документации
https://docs.docker.com/compose/install/#install-compose

Дальше вам достаточно склонировать проект на локальную машину и выполнить 
`docker-compose -f docker-compose.yml up` если вам не нужен xdebug
или `docker-compose -f docker-compose.yml -f docker-compose-xdebug.yml up`
если вы планируете профилировать с использованием xdebug.

После того как контейнер будет запущен тестовый сайт будет доступен по адресу http://127.0.0.1:1025
По адресу http://127.0.0.1:1026/ будет расположен веб интерфейс xhprof, хотя на результат профилирования можно будет перейти по ссылке из тестового файла

Зайти внутрь php контейрена можно командой `docker-compose exec php-fpm bash`

# Настройка blackfire

для использования вам необходимо зарегестрироваться на сайте профайлера https://blackfire.io
После того как запустите compose, необходимо прописать параметры вашего аккаунта blackfire, выполните  
`docker-compose exec php-fpm blackfire-agent -register`
он запросит ваши данные blackfire которые можно взять на странице https://blackfire.io/docs/up-and-running/installation

После того как данные введены необходимо перезапустить blackfire-agent, достаточно выполнить
`docker-compose exec php-fpm /etc/init.d/blackfire-agent restart`

Для профилирования на странице https://blackfire.io/docs/up-and-running/installation необходимо установить расширение к 
браузеру, зайти на страницу с тестовым приложением http://127.0.0.1:1025 и в приложении выбрать профилировать.

# Использование xdebug profiler

Запускаем контейнеры командой `docker-compose -f docker-compose.yml -f docker-compose-xdebug.yml up`
Результаты профилирования будут доступны в папке проекта `/profiles/tmp/` результаты xdebug в названии файла содержат `cachegrind`
Просмотреть их можно с помощью просмотрщиков cachegrind, часть из них можно увидеть в статье https://habrahabr.ru/post/75166/ 
или же можно воспользоваться встроенным в PHPStorm, меню `Tools/Analize Xdebug Profiler Snapshot...`


# Настройка NewRelic

Необходимо зарегистрировать аккаунт на https://rpm.newrelic.com/
Необходимо ввести параметры аккаунта newrelic для виртуалки выполнив
`docker-compose exec php-fpm newrelic-install`
сам ключ можно посмотреть в https://rpm.newrelic.com/accounts/1738496/applications/setup# раздел `Get your license key`
предварительно нужно выбрать php, затем нажимаем на кнопочку `Reveal license key`

Копируем конфиг
`docker-compose exec php-fpm cp /etc/newrelic/newrelic.cfg.template /etc/newrelic/newrelic.cfg`

После установки может понадобиться перезапуск агента:
`docker-compose exec php-fpm /etc/init.d/newrelic-daemon restart`
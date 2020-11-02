# HopeJobs

A TALL Stack recruitment system

## Instalando

Requires:

- PHP ^7.4
- NodeJs com NPM

Clonando o repo

```
    git clone https://github.com/JoaoRuani/HopeJobs.git
```

Copie o arquivo .env.example para .env e insira suas credenciais do Banco

Com o terminal dentro da pasta do projeto

```
    composer install
    npm install
    npm run dev
    php artisan key:generate
    php artisan migrate
    php artisan serve
```
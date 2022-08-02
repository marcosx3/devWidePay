# DEVWIDEPAY_TEST


Este projeto permite a criação de usuario e um CRUD de URL's.
 As URL's cadastradas pelo usuario são lidas pelo sistema e para cada uma delas é feito constantemente uma requisição, onde o usuario terá acesso ao código da resposta e o corpo da requisição.

## Recursos

O que foi usado:

- PHP.
- Laravel.
- Breeze.
- Bootstrap.
- MYSQL
## Instalação

Para instalação do projeto.

Faça o clone do projeto.
```sh
git clone https://github.com/marcosx3/devWidePay
```

```sh
cd devWidePay
composer install
npm install
```

Faça uma copia do arquivo .env.exemple e retire o .exemple.

```sh
php artisan key:generate
```
Obs: Não se esqueça de criar o banco de dados, os dados estão no arquivo .env

## Para Utilização
```sh
php artisan serve
```
```sh
npm run dev
```
```sh
php artisan queue:work
```

## Acesse 

```sh
127.0.0.1:8000
```

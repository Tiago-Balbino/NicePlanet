# NicePlanet
Projeto desenvolvido como parte do processo seletivo da empresa Niceplanet Geotecnologia.

## Objetivo do Projeto

O objetivo deste projeto é simular a criação de uma API que permite o cadastro e busca de informações em um banco de dados.

## Tecnologias Utilizadas

Este projeto foi desenvolvido utilizando as seguintes tecnologias:

- PHP 8.1
- Laravel
- MySQL
- Sanctum
- Swagger

## Endpoints

Os endpoints da API estarão disponiveis no Swagger do projeto siga abaixo como rodar o projeto para acessar a url correspondente.

## Como Instalar e Executar o Projeto

Para instalar e executar o projeto localmente, siga as instruções abaixo:

1. Clone este repositório para o seu ambiente local:

   ```bash
   git clone https://github.com/Tiago-Balbino/NicePlanet.git


2. Rode o comando:
     ```bash
   composer install


3. apos installar a dependencia copia a pasta .env-exemple e remova o "-exemple"

4. altere dentro do .env as configurações do seu banco de dados e rode:

    ```bash
   php artisan migrate:install

5. depois de rodas as migrações, rode o projeto com o comando: 

    ```bash
    php artisan serve

- acesse a url: [http://127.0.0.1:8000](http://127.0.0.1:8000/api/docs)


Agora e possivel ver a documentação de rotas. 

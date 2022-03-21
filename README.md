# teste Ereciclo

Esta aplicação foi desenvolvida afim de teste para a vaga de pessoa desenvolvedora .

# Tecnologias Utilizadas

- Laravel 9
- Laravel Breeze
- tailwindcss

## Para rodar a aplicação

Ps: De preferencia utilizar powershell ou wsl caso esteja no windows.

1 **Na raiz do projeto rode o comando** -> ``` composer install ```

2 **Depois rode o comando** -> ``` docker-compose up ```

3 **No arquivo .env apenas esse bloco copie e cole e substitua pelo conteudo que está lá**

    ``` DB_CONNECTION=mysql
    
        DB_HOST=database

        DB_PORT=3306

        DB_DATABASE=eureciclo_arquivo

        DB_USERNAME=eureciclo-user

        DB_PASSWORD=eureciclo-password ```


4 **Logo após rode o comando** -> ``` docker-compose exec app php artisan migrate:refresh ```

5 **Depois você pode abrir no navegador a aplicação http://localhost/**

- **Crie um novo usuário com email válido
        Ex: abs@gmail.com e senha de no min 8 caracteres.**



# Swagger-PHP

- [Documentação Swagger-PHP](https://zircote.github.io/swagger-php/)

### Como executar a aplicação
`docker-compose up -d`

### Como instalar as dependências da aplicação
`docker-compose exec php-api composer install`

### Como atualizar o arquivo OpenAPI
`docker-compose exec php-api ./vendor/bin/openapi src -o openapi.yaml`

### Como visualizar a documentação gerada
Conforme especificado no arquivo `docker-compose.yml`, serviço `php-api-doc`, a visualização da documentação
está disponível no endereço `http://127.0.0.1:8181`
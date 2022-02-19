# Api de Listagem de Cliente

Esta api foi construída utilizando um ambiente em container com Docker e Docker-compose para a execução do PHP vesão 7.4-fpm e nginx. Foi utilizado o SQlite como DB e os dados dados são persistidos no aquirvo database.sqlite, na pasta database da aplicação.

# Estrutura do projeto
- api-cliente - pasta onde está o fonte da api
- nginx - pasta com os arquivos de logs do serviço, certificado SSL, arquivo de configuração e o Dockerfile do serviço
- php-fpm - pasta com o Dockerfile para montagem do container PHP

# Executando o projeto
-  clone o repositório para o seu local desejado e em seguida execute o comando docker-compose up -d para criar os containers

# Comandos úteis
- docker-compose start: inicia a execução dos containers
- docker-compose stop: para a execução dos containers
- docker-compose down: paraliza e remove os containers e a rede (network) criada para a comunicação entre os containers

# Acessando os Endpoints da api

Método | Endpoint                                        | Ação
-------|-------------------------------------------------|---------------------------------------------------------------
POST   |localhost:8060/api/cliente/cliente               | Inserir novo registro
PUT    |localhost:8060/api/cliente/{id}                  | Editar um registro
DELETE |localhost:8060/api/cliente/{id}                  | Excluir um registro
GET    |localhost:8060/api/cliente/{id}                  | Consultar registro pelo id
GET    |localhost:8060/api/consulta/final-placa/{numero} | Consultar cliente através, informando o último número da placa
## Repositorio responsável por armazenar Dockerfiles pra facilitar a vida  'DEVOPS basics'


## Comandos uteis:

- Buildar o docker sem cache:
  - docker-compose -f docker-compose.yml build --no-cache

- Subir o docker no modo Detach(poder usar o terminal):
  - docker-compose up -d 

- DELETAR A BOSTA DO CACHE INDELETAVEL DO DOCKER:
  - docker rm docker-id
  - docker image prune -a
  - docker volume prune 

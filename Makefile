up:
	docker compose up -d

down:
	docker compose down

restart:
	docker compose down
	docker compose up -d

logs:
	docker compose logs -f

logs-nginx:
	docker logs nginx -f

logs-phpfpm:
	docker logs phpfpm -f

clean:
	docker compose down -v

remove-images:
	docker rmi $(docker images -a -q)

build:
	docker compose up -d --build

status:
	docker compose ps -a

nginx:
	docker exec -it nginx bash

fpm:
	docker exec -it phpfpm bash
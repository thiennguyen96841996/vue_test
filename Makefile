up:
	docker compose up -d

build:
	docker compose build

clean-build:
	docker compose build --no-cache

shell:
	docker compose exec web bash

web:
	docker-compose exec Vue_web bash

ps:
	docker ps -a

down:
	docker compose stop
	docker compose rm -f

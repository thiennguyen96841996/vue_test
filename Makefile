up:
	docker compose up -d

build:
	docker compose build

clean-build:
	docker compose build --no-cache

shell:
	docker compose exec web bash

db:
	docker compose exec db bash

ps:
	docker ps -a

down:
	docker compose stop
	docker compose rm -f

build: .env
	@docker compose up --build --force-recreate -d

stop:
	@docker compose down

start:
	@docker compose up -d

restart:
	@docker compose down
	@docker compose up -d

clean:
	@docker compose down
	@docker system prune -f --volumes 

.env:
	@cp .env.dev .env

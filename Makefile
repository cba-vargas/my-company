.DEFAULT_GOAL := help

.PHONY: help setup build up down restart ps logs shell artisan composer npm test lint format build-assets quality fresh doctor clean destroy

help: ## Hiển thị danh sách lệnh
	@awk 'BEGIN {FS = ":.*## "; printf "Usage: make <target>\n\n"} /^[a-zA-Z_-]+:.*?## / {printf "  %-16s %s\n", $$1, $$2}' $(MAKEFILE_LIST)

setup: ## Khởi tạo toàn bộ môi trường
	@bash scripts/setup.sh

build: ## Build Docker images
	docker compose build

up: ## Khởi động containers
	docker compose up -d

down: ## Dừng containers
	docker compose down

restart: ## Khởi động lại containers
	docker compose restart

ps: ## Xem trạng thái containers
	docker compose ps

logs: ## Theo dõi log
	docker compose logs -f --tail=200

shell: ## Mở Bash trong PHP container
	docker compose exec app bash

artisan: ## Chạy Artisan: make artisan cmd="route:list"
	docker compose exec app php artisan $(cmd)

composer: ## Chạy Composer: make composer cmd="require vendor/package"
	docker compose exec --user app app composer $(cmd)

npm: ## Chạy npm: make npm cmd="install package"
	docker compose exec node npm $(cmd)

test: ## Chạy Pest
	docker compose exec app php artisan test

lint: ## Kiểm tra Pint, ESLint và Prettier
	docker compose exec app ./vendor/bin/pint --test
	docker compose exec node npm run lint
	docker compose exec node npm run format:check

format: ## Tự động format mã nguồn
	docker compose exec app ./vendor/bin/pint
	docker compose exec node npm run lint:fix
	docker compose exec node npm run format

build-assets: ## Build frontend production
	docker compose exec node npm run build

quality: ## Chạy toàn bộ quality gate
	docker compose exec app composer validate --strict
	docker compose exec app ./vendor/bin/pint --test
	docker compose exec node npm run lint
	docker compose exec node npm run format:check
	docker compose exec node npm run build
	docker compose exec app php artisan test
	docker compose config >/dev/null

fresh: ## Reset database và seed
	docker compose exec app php artisan migrate:fresh --seed

doctor: ## Kiểm tra môi trường
	@bash scripts/doctor.sh

clean: ## Xóa cache ứng dụng và frontend hot file
	docker compose exec app php artisan optimize:clear
	@rm -f public/hot

destroy: ## Xóa containers và toàn bộ volumes
	docker compose down -v --remove-orphans

.DEFAULT_GOAL:=help

.PHONY: up
up: ## start docker container
	docker compose up -d

.PHONY: stop
stop: ## stop docker container
	docker compose stop

.PHONY: composer-install
composer-install: ## install all composer dependencies
	docker compose run mitmarion_php composer install

.PHONY: composer-update
composer-update: ## update all composer dependencies
	docker compose run mitmarion_php composer update

.PHONY: rector
rector: ## Run rector. Rules and folders specified in rector config (rector.php) To run for specific files: make rector filenames=src/....php
	docker compose run mitmarion_php bin/rector process $(filenames)

.PHONY: help
help:
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

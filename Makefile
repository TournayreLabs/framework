# Executables
PHP      = php
COMPOSER = composer

# Misc
.DEFAULT_GOAL = help
.PHONY        : help composer vendor validate qa tests phpstan fix

help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9\./_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

## Composer
composer: ## Run composer, pass the parameter "c=" to run a given command, example: make composer c='require symfony/console'
	@$(eval c ?=)
	@$(COMPOSER) $(c)

vendor: ## Install vendors according to composer.json
vendor: c=install --prefer-dist --no-progress --no-scripts --no-interaction
vendor: composer

validate: ## Validate composer.json
	@$(COMPOSER) validate --strict

## QA
qa: validate phpstan tests ## Run all QA tools

tests: ## Run tests
	@$(PHP) vendor/bin/phpunit

phpstan: ## Run PHPStan
	@$(PHP) vendor/bin/phpstan analyse src tests --memory-limit=4G

fix: ## Run PHP-CS-Fixer
	@$(PHP) vendor/bin/php-cs-fixer fix --diff


META_FOLDER = .engineered
MAIN_SERVICE_NAME = lib
COMPOSE_CMD ?= docker-compose

setup: prepare boot

# Prepares the project to be booted
prepare: build dependencies hooks

# Builds docker images needed for this project from scratch
build:
	$(COMPOSE_CMD) build --no-cache --pull

# Installs dependencies with composer
dependencies:
	$(COMPOSE_CMD) run --rm $(MAIN_SERVICE_NAME) composer install

# Configures the git hooks
hooks:
	$(META_FOLDER)/git-hooks/init.sh make

# Boots all the services in the docker-compose stack
boot:
	$(COMPOSE_CMD) up -d --remove-orphans

# Formats the code according to php-cs-fixer rules
fmt:
	$(COMPOSE_CMD) exec -T $(MAIN_SERVICE_NAME) vendor/bin/php-cs-fixer fix

# Run static analysis on the code
statica:
	$(COMPOSE_CMD) exec -T $(MAIN_SERVICE_NAME) vendor/bin/psalm --stats --no-cache --show-info=true
	$(COMPOSE_CMD) exec -T $(MAIN_SERVICE_NAME) vendor/bin/phpstan analyze --xdebug

# Runs the test suite
test:
	$(COMPOSE_CMD) exec -T $(MAIN_SERVICE_NAME) vendor/bin/phpunit

# Stops all services and destroys all the containers.
# NOTE: Named kill to convey the more accurate meaning that the containers are destroyed
kill:
	$(COMPOSE_CMD) down

# Stops the services. Use this when you are done with development for a while.
stop:
	$(COMPOSE_CMD) stop

# Prepares a PR
pr: fmt statica test

# Opens a shell into the main container so you can run development tasks like composer install more easily
shell:
	$(COMPOSE_CMD) exec $(MAIN_SERVICE_NAME) ash
.PHONY: all

WEB_DIR = web

all: runserver

composer.phar:
	curl -s https://getcomposer.org/installer | php
	touch composer.phar

vendor: composer.phar
	./composer.phar update
	touch vendor

runserver: vendor
	php -S localhost:8080 -t $(WEB_DIR)

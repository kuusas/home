.PHONY: all

all: runserver

composer.phar:
	curl -s https://getcomposer.org/installer | php
	touch composer.phar

vendor: composer.phar
	./composer.phar update
	touch vendor

runserver: vendor
	app/console server:run

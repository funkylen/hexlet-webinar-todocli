install:
	composer install

validate:
	composer validate

todo:
	./bin/todo

lint:
	composer exec phpcs --verbose -- --standard=PSR12 src bin

lint-fix:
	composer exec phpcbf --verbose -- --standard=PSR12 src bin

test:
	composer exec phpunit --verbose

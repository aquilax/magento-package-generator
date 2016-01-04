BASE = $(realpath ./)
SRC_DIR = $(BASE)/src
TESTS_DIR = $(BASE)/tests
COVERAGE_DIR = $(BASE)/coverage
BIN_DIR = $(BASE)/vendor/bin

test:
	$(BIN_DIR)/phpunit

php-lint:
	find $(SRC_DIR) -name "*.php" -print0 | xargs -0 -n1 -P8 php -l

phpmd:
	./vendor/bin/phpmd $(SRC_DIR) text cleancode,codesize,controversial,design,naming,unusedcode

coverage: clear_coverage
	$(BIN_DIR)/phpunit --coverage-html $(COVERAGE_DIR)

clear_coverage:
	rm -rf $(COVERAGE_DIR)

sniff:
	$(BIN_DIR)/phpcs --standard=PSR2 --extensions=php --colors $(SRC_DIR)

sniff-fix:
	$(BIN_DIR)/phpcbf --standard=PSR2 --extensions=php $(SRC_DIR)
	$(BIN_DIR)/phpcbf --standard=PSR2 --extensions=php $(TESTS_DIR)
	$(BIN_DIR)/phpcbf --standard=PSR2 --extensions=php $(TRANSLATIONS_DIR)

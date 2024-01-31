FROM php:8.2-cli-alpine

WORKDIR /test_task_tilda

COPY . /test_task_tilda

CMD ["php", "script.php"]

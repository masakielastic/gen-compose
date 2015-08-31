gen-compose
===========

koa-compose を PHP に移植したものです。

```php
$middleware = [
    function ($next) {
        yield $next;
        $this->body .= '1';
    },
    function ($next) {
        yield $next;
        $this->body .= '2';
    },
    function ($next) {
        yield $next;
        $this->body .= '3';
    },
];

$app = new Application;
$app->run($middleware);
var_dump('321' === $app->body);
```
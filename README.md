gen-compose
===========

koa-compose を PHP に移植したものです。

使い方
-----


```php
class Application
{
    public $body = '';

    function run(array $middleware)
    {
        $noop = function () {
            yield;
        };

        $all = compose($middleware, $this);
        $all($noop)->next();
    }
}

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

ライセンス
---------

MIT

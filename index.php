<?php

function compose(array $middleware)
{
    return function ($next) use ($middleware) {

        $noop = function () { yield; };

        if (!$next) {
            $next = $noop;
        }

        $i = count($middleware);

        while ($i--) {
            $next = $middleware[$i]($next)->next();
        }

        yield $next;
    };
}






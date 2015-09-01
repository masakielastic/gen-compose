<?php

function compose(array $middleware, $context = null)
{
    return function ($next) use ($middleware, $context) {
        $noop = function () { yield; };
        if (!$next) {
            $next = $noop;
        }
        $i = count($middleware);

        if ($context === null) {
            while ($i--) {
                $next = $middleware[$i]($next)->next();
            }
        } else {
            while ($i--) {
                $bound = $middleware[$i]->bindTo($context);
                $next = $bound($next)->next();
            }
        }

        yield $next;
    };
}

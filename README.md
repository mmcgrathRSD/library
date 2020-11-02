# Laravel Container

Ok I did start just taking a crack at this here and there of the past few weeks, and and only becuase i finally had an idea about how we can do incremneal adoption.

well talk soon

So far, i the cotainter properly bootstrapping, which wes probably one of the easier parts.

Envirnment Stuff (like tru .env files like laravel has) and container stuff.

```
$Environment = Rally\Container\LoadEnvironmentVariables(<dir>)->bootstrap();
```

```
$Container = new Rally\Container\Application(<path>);
```

One of the reasons i actually started playing aroudn with this is becuase had an actual idea on how incremental adoption might look.

So one of the biggest problems i couldnt figure out is like, how we are going to replace the bootstrapping process that all the apps have. But then i kinda have a clever idea.

So basically there is this thing thats kind of half due to laravel, and half due to composer. Its called serivce discovery. And it basically allows you to include a little extrea peice in your composer.json, something like this:

```
"extra": {
    "laravel": {
        "providers": [
            "Barryvdh\\Debugbar\\ServiceProvider"
        ],
        "aliases": {
            "Debugbar": "Barryvdh\\Debugbar\\Facade"
        }
    }
}
```

When this came to me, ist was like a light bulb going off. For laravel packages, just including a service provider in the "extra" feild, alllow them to tap int your code during a special point in the composer installation process, and do the exacty type of boot strapping we would neeed. (providing assets, defining routes and controllers, etc); So this is totally something that would work.


So basically instead of every package providing thier stuff ina a boostrap, listenener and routes feile, it would simply be a Service provider per package, and the whole thing would only happen one during intial instsallation of the packages. It honestly might work. We'lll still have plenttttyy of other hurdles tho

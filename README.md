# Laravel Cottainer
```
require_once __DIR__.'/../vendor/autoload.php';

(new Rally\Container\Bootstrap\LoadsEnvirontmentVariables(
    dirname(__DIR__)
))->bootstrap();
```

And there would be and .env file in root dir, instead of the confi.ini's. We could also have the cofig files like laravel does. 

```
$app = new Rally\Container\Application(
    dirname(__DIR__)
);
```

This isnt perfect yet, but it took a damn long time.. and it works. 

My idea is basically that for all of the "apps", we would use something called "service" discovery. Its kind of a half a laravel thing, half a composer thing.

In terms of registering its views and events and etc, instead of a boostrap file, each app would provide a ServiceProvider file, wherein it registered its routes and controllers and events. 

So basically, each app would have something like this in there composer.json file:
```
"extra": {
    "laravel": {
        "providers": [
<<<<<<< HEAD
            "Rallysport\\Shop\\"
        ],
        "aliases": {
            "Shop": "RallySport\\Shop\\Facade"
=======
            "Barryvdh\\Debugbar\\ServiceProvider"
        ],
        "aliases": {
            "Debugbar": "Barryvdh\\Debugbar\\Facade"
>>>>>>> 275209722379f0d8c48b7421d4f188d8ae2dc4b0
        }
    }
}
```
<<<<<<< HEAD
And so basically what composer lets you do is run custom install scripts based on whatever is in thoose "extra" feilds, when when we did the main install in the main repo we'd be boostrapping all the serices based on the service provider definition they provide. Which is also cool becuase most of it can be cached into an array like strucute and not have to run on every request. 

We would also have ALOT of stuff to polyfill in the meantime, becuase all the old stuff would have to work, for a while atleast. 


=======

When this came to me, ist was like a light bulb going off. For laravel packages, just including a service provider in the "extra" feild, alllow them to tap int your code during a special point in the composer installation process, and do the exacty type of boot strapping we would neeed. (providing assets, defining routes and controllers, etc); So this is totally something that would work.


So basically instead of every package providing thier stuff ina a boostrap, listenener and routes feile, it would simply be a Service provider per package, and the whole thing would only happen one during intial instsallation of the packages. It honestly might work. We'lll still have plenttttyy of other hurdles tho
>>>>>>> 275209722379f0d8c48b7421d4f188d8ae2dc4b0

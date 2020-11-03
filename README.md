# Laravel Cottainer

Still very much a work in progress, but the index page would look something like this:

```
$Environment = (new Rally\Container\LoadEnvironmentVariables('/../' . __DIR__ ))->bootstrap();
```

And there would be and .env file in root dir, instead of the confi.ini's. We could also have the cofig files like laravel does. 

```
$Container = new \Rally\Container\Application(
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
            "Rallysport\\Shop\\"
        ],
        "aliases": {
            "Shop": "RallySport\\Shop\\Facade"
        }
    }
}
```
And so basically what composer lets you do is run custom install scripts based on whatever is in thoose "extra" feilds, when when we did the main install in the main repo we'd be boostrapping all the serices based on the service provider definition they provide. Which is also cool becuase most of it can be cached into an array like strucute and not have to run on every request. 

We would also have ALOT of stuff to polyfill in the meantime, becuase all the old stuff would have to work, for a while atleast. 

Laravel Slack Package
=====================

A laravel package for sending Slack messages

For more information see [Slack](https://slack.com/)

## Requirements ##

Laravel 5.1 or later


Installation
------------
Installation is a quick 3 step process:

1. Download laravel-slack using composer
2. Configure your HTTP Adapter
3. Enable the package in app.php
4. Configure your Slack credentials
5. (Optional) Configure the package facade


### Step 1: Download laravel-slack using composer

Add nimbles-nl/laravel-slack by running the command:

```
composer require nimbles-nl/laravel-slack
```

### Step 2: Download laravel-slack using composer

Configure the http adapter in your AppServiceProvider.php

``` php
use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;


$this->app->singleton('http.client', function() {
    return new GuzzleAdapter(new GuzzleClient());
});
```

### Step 3: Enable the package in app.php

Register the Service in: **config/app.php**

``` php
Nimbles\Slack\SlackServiceProvider::class,
````

### Step 4: Configure Slack credentials

```
php artisan vendor:publish
```

Add this in you **.env** file

```
SLACK_ACCESS_TOKEN=your_secret_slack_access_token
```

### Step 5 (Optional): Configure the package facade

Register the Slack Facade in: **config/app.php**

``` php
'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        ...
        'Slack' => Nimbles\Slack\Facade\Slack::class,
````

Usage
-----

``` php
$slackMessage = new SlackMessage('You're looking great today!', '#general', 'AwesomeBot', 'https://www.link-to-avatar.com/image.png');
app('slack')->sendMessage($slackMessage);
````

Or if you want to use facade, add this in your class after namespace declaration:

``` php
use Slack;
```

Then you can use it directly by calling `Slack::` like:
``` php
$url = Slack::sendMessage(new SlackMessage('You're looking great today!'));
````

<?php
/*
* (c) Nimbles b.v. <wessel@nimbles.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Nimbles\Slack;


use Illuminate\Support\ServiceProvider as AppServiceProvider;

/**
 * Class SlackServiceProvider
 */
class SlackServiceProvider extends AppServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    
    /**
     * {@inheritdoc}
     */
    public function register()
    {
        // Slack Client
        $this->app->singleton('slack', function () {
            return new SlackClient(app('http.client'), config('slack.accesstoken'));
        });
    }
    
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/config/slack.php' => config_path('slack.php')]);
    }
}

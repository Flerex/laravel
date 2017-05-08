<?php

namespace Parsedown\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ParsedownServiceProvider
 * @package App\Providers
 */
class ParsedownServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        \Blade::directive('parsedown', function ($expression) {
            return "<?php echo parsedown($expression); ?>";
        });

        $this->app->singleton(\Parsedown::class, function () {
            return new \Parsedown();
        });
    }
}
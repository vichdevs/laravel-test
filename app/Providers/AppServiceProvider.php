<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    public static function fieldAttr($valid, $misc = [])
    {
        $klass = '';
        if (!(isset($misc['class']) && preg_match('/form-check-input|form-control-file/', $misc['class']))) {
            $klass = 'form-control ';
        }
        if ($valid) {
            $klass .= 'is-invalid';
        }

        foreach ($misc as $key => $value) {
            if ($key === 'class') {
                unset($misc['class']);
                $klass .= ' ' . $value;
            }
        }

        $ret = ['class' => $klass];
        $ret = array_merge($ret, $misc);
        return $ret;
    }
}

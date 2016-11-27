<?php namespace App\Providers;

use AdamWathan\BootForms\BootFormsServiceProvider;
use \App\BootForms\BootForm;
use \App\BootForms\CustomFormBuilder;

class CustomBootFormsServiceProvider extends BootFormsServiceProvider
{

    protected function registerBootForm()
    {
        $this->app['bootform'] = $this->app->share(function ($app) {
            return new BootForm(
                $app['bootform.basic'],
                $app['bootform.horizontal'],
                new CustomFormBuilder($app['adamwathan.form'])
            );
        });
    }
}

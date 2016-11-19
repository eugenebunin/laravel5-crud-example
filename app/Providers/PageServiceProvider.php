<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
	function register()
	{
		  $this->app->bind('Page', function($app){
			     return new \App\Http\Services\PageService(new \App\Page);
		  });
	}
}

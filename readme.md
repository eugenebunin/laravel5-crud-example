### Installation

    composer install

    php artisan migrate

    'providers' => [
        App\Providers\CustomBootFormsServiceProvider::class,
      ],

### Using custom form

    BootForm::customOpen()

    BootForm::customText('Name', 'name', 'John Doe', 'glyphicon glyphicon-user')

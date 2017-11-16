slider for galaxycms
====================
slider for galaxycms

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist "yamalweb/slider" "*"

```

or add

```
"galaxycms-slider/galaxycms-slider": "*"
```

to the require section of your `composer.json` file.


Usage
-----
'slider' => [
            'class' => 'yamalweb\slider\Module',
            'controllerNamespace' => 'yamalweb\slider\controllers\backend',
            'viewPath' => '@yamalweb/slider/views/backend',
        ],

'slider' => [
            'class' => 'yamalweb\slider\Module',
            'controllerNamespace' => 'yamalweb\slider\controllers\frontend',
            'viewPath' => '@yamalweb/slider/views/frontend',
        ],

"repositories":[
    {
        "type": "git",
        "url": "https://github.com/yamalweb/galaxycms-slider.git"
    }
]
```



php yii migrate/up --migrationPath=vendor/yamalweb/galaxycms-slider/migrations

Once the extension is installed, simply use it in your code by  :

```php
<?= \yamalweb\slider\AutoloadExample::widget(); ?>```
# Overriding controllers

The default Yii2-user controllers provide a lot of functionality that is sufficient for general use cases. But sometimes
you may need to extend that functionality and add some logic that suits your needs.

> **NOTE:** Overriding the controller requires to duplicate all the logic of the action. Most of the time, it is easier to use
> [the events](using-controller-events.md) to implement the functionality. Replacing the whole controller should be considered
> as the last solution when nothing else is possible.

## Step 1: Create new controller

First of all you should create new controller under your own namespace (it is recommended to use `app\controllers\user`)
and extend it from the controller you want to override.

For example, if you want to override AdminController you should create `app\controllers\user\AdminController` and extend
it from `fedoen\user\controllers\AdminController`:

```php
namespace app\controllers\user;

use fedoen\user\controllers\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    public function actionCreate()
    {
        // do your magic
    }
}
```

## Step 2: Add your controller to controller map

To let Yii2-user know about your controller, you should add it to the module's controller map, as follows:

```php
...
'modules' => [
    ...
    'user' => [
        'class' => 'fedoen\user\Module',
        'controllerMap' => [
            'admin' => 'app\controllers\user\AdminController'
        ],
        ...
    ],
    ...
],
...
```

# Interface Binder
Interface binder provides an easy way to bind interfaces to implementations within a given array of directories

## Installation

using composer:

```bash
composer require netsells/interface-binder
```

Then publish the config file using the following artisan command:
```bash
php artisan vendor:publish --tag=interface-binder
```


## Usage

Add the directories you want to scan for interfaces to the `directories` array in the `interface-binder.php` config file:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Directories to scan for interfaces
    |--------------------------------------------------------------------------
    |
    */

    'directories' => [
        app_path('Features'),
        app_path('Services'),
    ],
];
```

Then all you need to do is give the interface you whish to bind a `BoundTo` attribute to tell the `Binder` which conrete class you wish to bind it to.

```php
namespace App\Features\CodeVerifier;

use App\Models\User;

#[BoundTo(UserCodeVerifier::class)]
interface UserCodeVerifierInterface
{
    public function verifyUserCode(User $user, string $codeGiven): bool;
}

```

Which is implemented by the following concrete class

```php
namespace App\Features\CodeVerifier;

use App\Models\User;

class UserCodeVerifier implements UserCodeVerifierInterface
{
    public function verifyUserCode(User $user, string $codeGiven): bool
    {
        return true;
    }
}
```

And that's it! When you attempt to resolve `UserCodeVerifierInterface` out of the container you'll get an instance of `UserCodeVerifier`.

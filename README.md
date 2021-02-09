# Interface Binder
Interface binder provides an easy way to bind interfaces to implementations within a given array of directories

## Installation

using composer:

```
composer require netsells/interface-binder
```

## Usage

Add the following to the `register` method in your `AppServiceProvider`:

```php
public function register()
{
    app(Binder::class)
        ->bindInterfaces(
            [
                // Directories where interfaces are located
                base_path('app/Features'),
                base_path('app/Services'),
            ]
        );
}
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

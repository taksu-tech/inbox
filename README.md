# Inbox

## Features

- Each user can have their own inbox
- Events will be generated
- Broadcast to multiple inboxes
- Gather user response to an inbox

## Models

- Inbox
- Broadcast

## Events

- InboxSent
- InboxRead
- BroadcastPublished
- ResponseSubmitted
- ResponseExpired


## How to install 
1. Install the package 
```bash
composer require taksu-tech/taksu-inbox
```

2. Modify `app/config.php`, to load the provider.
```php
'providers' => ServiceProvider::defaultProviders()->merge([
    \Taksu\TaksuInbox\InboxServiceProvider::class,
])->toArray(),
```

3. Load seeder by updating `database/seeders/DatabaseSeeder.php` (optional)
```php
$this->call([
    InboxSeeder::class,
]);
```
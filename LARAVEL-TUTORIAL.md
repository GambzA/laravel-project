# laravel-tutorial

## Migrating to database
php artisan migrate

## And to seed
php artisan migrate:seed *[This will insert test data]*

## Run Node JS with Vite [Dev Environment]
npm run dev

## When Running PHPUNIT
./vendor/bin/phpunit
php artisan make:test HomeTest

### How to structure tests
1. Arrange - Prepare everything:
`$object = new BlogPost();`

2. Act - Action that will be done to data prepared:
`$object->save();`

3. Assert - Tells the result:
`$this->assertTrue($object->id !== null);`

## PHP Artisan Clear cache
php artisan config:clear

## PHP Artisan Caching tables to Sqlite
php artisan cache:table

## PHPUnit Storing to database but not fetching.
Probable cause is that the data is being fetched globally in the routers. Try moving it inside the route.

## MessageBag
[Laravel Message Bag Docs](https://laravel.com/api/9.x/Illuminate/Support/MessageBag.html)

## Incase `blog_post` table is missing or not found
`$post = BlogPost::all();` is the culprit

## Eloquent One to One

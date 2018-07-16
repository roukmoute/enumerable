# Enumerable

Provides a set of methods for querying objects.  
Enumerable is a collection library for PHP >= 7.1 that implements most of the sequence operations proposed by [collection pipeline](http://martinfowler.com/articles/collection-pipeline/) object methods.

## Installation
Require this package using Composer.

`composer require roukmoute/enumerable`

## Operation Catalog

Here is a catalog of the operations that you often find in collection pipelines :

### filter

![](https://martinfowler.com/articles/collection-pipeline/collection-pipeline/filter.png)

Runs a boolean function on each element and only puts those that pass into the 
output.

You can use this function to keep only the items of the input you want to work 
with.  
For example:

```php
$query = (new \Enumerable\Enumerable([0, 30, 20, 15, 90, 85, 40, 75]))->filter(
    function ($number, $index) {
        return $number <= $index * 10;
    }
);

foreach ($query as $number) {
    echo $number . PHP_EOL;
}

/*
 This code produces the following output:

 0
 20
 15
 40
*/
```
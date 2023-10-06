# unitscale-mass

An extension of unitscale to use with mass unit (g, gramms), including quintal and ton scales.

## Release notes

Version 1.0.0

- Had to follow core package updates

## Breaking changes

- See ascetik/unitscale-core package README file.

### Mass conversion

Mass conversion is specialized in mass measurement multiples, adding ton (t) and quintal(q).
It uses mass unit (g, gram) as unit to prefix.
Custom converter could be enough but does not use ton and quintal...

To get an instance of the mass converter :

```php

$unit = MassScaler::unit(30);

```

The only argument is the dimension value.
As custom converter, the converter is set with base value :

```php

echo $unit; // prints "3000g"

```

Using ton and quintal is quite simple :

```php

$quintal = MassScaler:::fromQuintal(30);
echo $quintal; // prints "30q"
echo $quintal->toKilo(); // prints "3000kg"

echo MassScaler::fromKilo(300)->toTon(); // prints "3t"

```

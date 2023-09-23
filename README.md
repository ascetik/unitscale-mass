# unitscale-mass

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

$quintal = $unit->fromQuintal();
echo $quintal; // prints "30q"
echo $quintal->toKilo(); // prints "3000kg"
echo $quintal->toTon(); // prints "3t"

```

Of course, you can chain methods :

```php

echo MassScaler::unit(30)
    ->fromQuintal()
    ->toTon(); // prints "3t"

```

# Color

The [Color](../src/Color.php) class implement [ColorInterface](../src/Interface/Color/ColorInterface.php) which gives us the following method:

- `setRgb` - to set Rgb in the hex format. Example: `FFF`, `#FFF`, `FAFAFA`, `#FAFAFA`. The `#`` character is optional. If you want to set the color. You don't have to use this method because the constructor does it implicitly, but if for some reason you want to change the color during the life of the code, you can use this method
- `toInt` - convert hex rgb to int. Color as an integer is required by discord itself. You don't have to use this method either. It is only needed inside the library

Thanks to this class, we are sure about the correctness of the color format. RGB Hex is very easy to get from many tools available on the internet.

## Examples

```php
$color = new Color('FADAEA');
$color = new Color('#FADAEA');
$color = new Color('FFF');
$color = new Color('ffffff');
$color = new Color('FaFaFa');
$color = new Color('#fdc');
```

# HtRadios

This library can be used to generate radio buttons in an easy way.
I recommend you take a look at the documentation of its parent classes in order to grasp all the inherited functionality:

- [HtChoice](https://github.com/flsouto/htchoice)
- [HtWidget](https://github.com/flsouto/htwidget)
- [HtField](https://github.com/flsouto/htfield)

## Installation

Via composer:

```
composer require flsouto/htradios
```



## Usage

In the following example we generate a choice list with three options.

```php
<?php
require_once('vendor/autoload.php');
use FlSouto\HtRadios;

$select = new HtRadios("id_category");
$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);

echo $select;
```

Outputs:

```html

<div class="widget 58c445e037fa2" style="display:block">
 <label>
 <input type="radio" name="id_category" value="1" />Category1</label>
 <br />
 <label>
 <input type="radio" name="id_category" value="2" />Category2</label>
 <br />
 <label>
 <input type="radio" name="id_category" value="3" />Category3</label>
 <br />
 <div style="color:yellow;background:red" class="error">
 </div>
</div>

```

**Notice**: the `options` method also accepts other formats besides an associative array. Take a look at the documentation of the [HtChoice](https://github.com/flsouto/htchoice#options-as-numeric-arrays) class in order to learn more.


## Changing the separator

By default, the separator used to separate the options is a `<br/>` element, that is, a line break. 
But you can change that by using the `separator` method. In the example below we change the separator to be two spaces so that the options are displayed horizontally:

```php
<?php
require_once('vendor/autoload.php');
use FlSouto\HtRadios;

$select = new HtRadios("id_category");
$select->options([1=>'Category1',2=>'Category2',3=>'Category3'])
	->separator("&nbsp;&nbsp;");

echo $select;
```

Outputs:

```html

<div class="widget 58c445e039f00" style="display:block">
 <label>
 <input type="radio" name="id_category" value="1" />Category1</label>
 &nbsp;&nbsp;
 <label>
 <input type="radio" name="id_category" value="2" />Category2</label>
 &nbsp;&nbsp;
 <label>
 <input type="radio" name="id_category" value="3" />Category3</label>
 &nbsp;&nbsp;
 <div style="color:yellow;background:red" class="error">
 </div>
</div>

```


## Selecting an option

If you have read the documentation of the `HtField` and the `HtWidget` parent classes you already know that you are supposed
to use the `context` method in order to set the value of a field/widget: 

```php
<?php
require_once('vendor/autoload.php');
use FlSouto\HtRadios;

$select = new HtRadios('id_category');
$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);
$select->context(['id_category'=>2]);

echo $select;
```

Outputs:

```html

<div class="widget 58c445e03a67b" style="display:block">
 <label>
 <input type="radio" name="id_category" value="1" />Category1</label>
 <br />
 <label>
 <input type="radio" name="id_category" value="2" checked="checked" />Category2</label>
 <br />
 <label>
 <input type="radio" name="id_category" value="3" />Category3</label>
 <br />
 <div style="color:yellow;background:red" class="error">
 </div>
</div>

```
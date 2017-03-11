<?php

use PHPUnit\Framework\TestCase;

#mdx:h al
require_once('vendor/autoload.php');

#mdx:h use
use FlSouto\HtRadios;

/* 
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

*/
class HtRadiosTest extends TestCase{

/*

## Usage

In the following example we generate a choice list with three options.

#mdx:Render

Outputs:

#mdx:Render -o httidy

**Notice**: the `options` method also accepts other formats besides an associative array. Take a look at the documentation of the [HtChoice](https://github.com/flsouto/htchoice#options-as-numeric-arrays) class in order to learn more.

*/
	function testRender(){
		#mdx:Render
		$select = new HtRadios("id_category");
		$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);
		#/mdx echo $select
		$this->expectOutputRegex("/radio.*?id_category.*?1.*?Category1.*?3.*?Category3.*?/s");
		echo $select;
	}

/* 
## Changing the separator

By default, the separator used to separate the options is a `<br/>` element, that is, a line break. 
But you can change that by using the `separator` method. In the example below we change the separator to be two spaces so that the options are displayed horizontally:

#mdx:Separator

Outputs:

#mdx:Separator -o httidy

*/
	function testSeparator(){
		#mdx:Separator
		$select = new HtRadios("id_category");
		$select->options([1=>'Category1',2=>'Category2',3=>'Category3'])
			->separator("&nbsp;&nbsp;");

		#/mdx echo $select
		$this->expectOutputRegex("/radio.*?id_category.*?1.*?Category1.*?".preg_quote('&nbsp;&nbsp;').".*?Category2.*?/s");
		echo $select;		
	}

/*
## Selecting an option

If you have read the documentation of the `HtField` and the `HtWidget` parent classes you already know that you are supposed
to use the `context` method in order to set the value of a field/widget: 

#mdx:SelectedOption

Outputs:

#mdx:SelectedOption -o httidy
*/
	function testSelectedOption(){
		#mdx:SelectedOption
		$select = new HtRadios('id_category');
		$select->options([1=>'Category1',2=>'Category2',3=>'Category3']);
		$select->context(['id_category'=>2]);
		#/mdx echo $select
		$this->expectOutputRegex("/radio.*?2.*checked/");
		echo $select;
	}

}
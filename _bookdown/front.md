## Installation

After you install _Qiq_ via [Composer](https://getcomposer.org) ...

```
composer require qiq/qiq ^1.0
```

.. you can get started [here](/1.x/intro.html).

The Github repository is at [qiqphp/qiq](https://github.com/qiqphp/qiq).


## Why Use Qiq?

Qiq is for developers who prefer native PHP templates, but with less verbosity.
It offers partials, layouts, sections, and a wide range of HTML helpers for
tags and forms, along with explicit but concise escaping.

Qiq is *not* for systems where the templates must be "secured" in some way
against designers or content creators. For that, use something like
[Handlebars](https://pecl.php.net/package/handlebars),
[Mustache](https://pecl.php.net/package/mustache),
or [Twig](https://twig.symfony.com/).

## What Are Qiq Templates?

Qiq is plain old PHP, with a light dusting of syntax sugar when you want it.

For example, escaping in plain old PHP looks like this:

```
<?php echo htmlspecialchars(
    $var,
    ENT_QUOTES|ENT_DISALLOWED,
    'utf-8'
) ?>
```

This is the same thing, using a Qiq helper for HTML escaping:

```
<?= $this->h($var) ?>
```

Finally, this is the same thing with the Qiq syntax sugar:

```
{{h $var }}
```

You can always mix plain PHP and Qiq in the same template. For example:

```
<?php $var = random_int(1, 99) ?>
{{h $var }}
```

Indeed, any unrecognized Qiq code is treated as PHP. For example, the following
Qiq code ...

```qiq
{{ $title = "Prefix: " . $this->title . " (Suffix)" }}
<title>{{h $title}}</title>
```

... is equivalent to this PHP code with Qiq helpers:

```html+php
<?php $title = "Prefix: " . $this->title . " (Suffix)" ?>
<title><?= $this->h($title) ?></title>
```

This makes it easy to use Qiq with existing PHP templates, and allows for a
smooth transition from PHP syntax to [Qiq syntax](/1.x/syntax.html) as desired.

## Why Explicit Escaping?

Qiq does not offer automatic escaping. By design, the `{{ ... }}` tags **do
not** generate output. All output must be explicitly escaped for a specific
context, noted by the first character after the opening tag.

For example, `{{h ... }}` outputs escaped for HTML, whereas `{{j ... }}` outputs
escaped for JavaScript. The `{{= ... }}` notation indicates raw output with no
escaping at all.

This is an intentional design choice for Qiq. Auto-escaping makes it easy to
forget what context you should be escaping for; explicitly marking the context
means you always have to think about what you are doing, and when it comes to
security, that's a good thing.

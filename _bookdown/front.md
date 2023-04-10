## Installation

After you install _Qiq_ via [Composer](https://getcomposer.org) ...

```
composer require qiq/qiq ^2.0
```

.. you can get started [here](/2.x/intro.html).

The Github repository is at [qiqphp/qiq](https://github.com/qiqphp/qiq).

## Why Use Qiq?

Qiq is for developers who prefer native PHP templates, but with less verbosity.
It offers:

- Native `<?php ?>` **and** `{{ qiq }}` syntax
- Concise, explicit, context-specific escaping
- Views, [layouts](./2.x/layouts.html), and [partials](./2.x/partials.html)
- [Blocks](./2.x/blocks.html) and [inheritance](./2.x/inheritance.html)
- Rich and extensible [HTML helpers](./2.x/helpers/overview.html)
- Easy-to-implmenent [static analysis](./2.x/static-analysis.html)
- Full documentation and unit-testing

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
{{ $title = "Prefix: " . $title . " (Suffix)" }}
<title>{{h $title}}</title>
```

... is equivalent to this PHP code with Qiq helpers:

```html+php
<?php $title = "Prefix: " . $title . " (Suffix)" ?>
<title><?= $this->h($title) ?></title>
```

This makes it easy to use Qiq with existing PHP templates, and allows for a
smooth transition from PHP syntax to [Qiq syntax](/2.x/syntax.html) as desired.

## What Are Qiq Helpers?

Qiq helpers are just methods on a _Helper_ object. For example, to add a
`<select>` HTML form element, you can use a helper to generate it for you in
Qiq ...

```qiq
{{= select (
    id: 'country-select',
    name: 'Country',
    value: 'usa',
    placeholder: 'Please pick a country',
    default: 'usa',
    options: [
        'usa' => 'United States',
        'can' => 'Canada',
        'mex' => 'Mexico',
    ],
) }}
```

... or in plain PHP:

```
<?= $this->select (
    id: 'country-select',
    name: 'Country',
    value: 'usa',
    placeholder: 'Please pick a country',
    default: 'usa',
    options: [
        'usa' => 'United States',
        'can' => 'Canada',
        'mex' => 'Mexico',
    ],
) ?>
```

Read more about the [general HTML helpers](./2.x/helpers/general.html), the
[form helpers](./2.x/helpers/forms.html), or learn how to create your own
[custom helpers](./2.x/helpers/custom.html).

## Why Explicit Escaping?

Qiq does not offer automatic escaping. By design, the `{{ ... }}` tags **do
not** generate output. All output must be explicitly escaped for a specific
context, noted by the first character after the opening tag:

- `{{h ... }}` escapes for HTML content
- `{{a ... }}` escapes for HTML attributes
- `{{u ... }}` escapes for URLs
- `{{c ... }}` escapes for CSS
- `{{j ... }}` escapes for JavaScript
- `{{= ... }}` is raw, unescaped output

This is an intentional design choice for Qiq. Auto-escaping makes it easy to
forget what context you should be escaping for. Explicitly marking the context
means you always have to think about what you are doing; when it comes to
security, that's a good thing.

* * *

Want to know more? Get started [here](/2.x/intro.html)!

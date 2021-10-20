<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015-2016 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */
    $cssPrism = getenv('CSS_PRISM') ?: 'ghcolors';
    $cssBootswatch = getenv('CSS_BOOTSWATCH') ?: 'cerulean';
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/<?= $cssBootswatch; ?>/bootstrap.min.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<link rel="stylesheet" href="https://tobiju.github.io/share/prismjs/prism-<?= $cssPrism; ?>.css" />
<link rel="stylesheet" href="https://tobiju.github.io/share/prismjs/prism-linenumbers.css" />
<link rel="stylesheet" href="/style.css" />

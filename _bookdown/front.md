## インストール方法

[Composer](https://getcomposer.org)でQiqをインストールした後に

```
composer require qiq/qiq ^1.0
```

[ここ](/1.x/intro.html)から始められます。

Githubのリポジトリは[qiqphp/qiq](https://github.com/qiqphp/qiq) にあります。

## なぜQiqを使うのか？

Qiqは、ネイティブなPHPテンプレートを好む開発者のためのものですが、冗長性は低くなっています。パーシャル、レイアウト、セクション、そしてタグやフォームのための幅広いHTMLヘルパーを提供し、明示的かつ簡潔なエスケープが可能です。

Qiqは、デザイナーやコンテンツ作成者に対してテンプレートを何らかの方法で「保護」しなければならないようなシステムには向いていません。そのような場合は、[Handlebars](https://pecl.php.net/package/handlebars) 、[Mustache](https://pecl.php.net/package/mustache) 、または[Twig](https://twig.symfony.com/) のようなものを使用してください。


## Qiqテンプレートとは何ですか？

Qiqは古きよきPHPであり、必要なときにだけ、軽くシンタックスシュガーをまぶします。

たとえば、PHPでエスケープを行うには、次のようにします。

```
<?php echo htmlspecialchars(
    $var,
    ENT_QUOTES|ENT_DISALLOWED,
    'utf-8'
) ?>
```

これは、HTMLのエスケープのためのQiqヘルパーを使用するのと同じことです。

```
<?= $this->h($var) ?>
```

最後に、Qiqのシンタックスシュガーと同じです。

```
{{h $var }}
```

同じテンプレートの中で、常にプレーンなPHPとQiqを混在させることができます。例えば

```
<?php $var = random_int(1, 99) ?>
{{h $var }}
```

実際、認識されないQiqコードはPHPとして扱われます。例えば、以下のようなQiqコードは

```qiq
{{ $title = "Prefix: " . $this->title . " (Suffix)" }}
<title>{{h $title}}</title>
```

Qiqヘルパーを使った次のPHPコードと同等です。

```html+php
<?php $title = "Prefix: " . $this->title . " (Suffix)" ?>
<title><?= $this->h($title) ?></title>
```

これにより、既存のPHPテンプレートでQiqを簡単に使用でき、必要に応じてPHP構文から[Qiq構文](/1.x/syntax.html)にスムーズに移行することができます。

## なぜ明示的なエスケープを行うのか？

Qiqは自動的なエスケープを提供しません。設計上、`{{ ... }}`タグは出力を生成**しません**。すべての出力は、開始タグの後の最初の文字で示される特定のコンテキストで明示的にエスケープされる必要があります。

例えば、`{{h ... }}`は HTML 用にエスケープされたものを出力しますが、`{{j ... }}`はJavaScript用にエスケープされたものを出力します。一方、`{{= ... }}`の表記は、エスケープを全くしない生の出力を表します。

これは、Qiqの意図的な設計上の選択です。自動エスケープは、どのような文脈でエスケープすべきかを忘れやすくします。文脈を明示的にマークすることは、自分が何をしているかを常に考えなければならないことを意味し、セキュリティに関して言えば、それは良いことです。

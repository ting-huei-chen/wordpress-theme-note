# WordPress Theme學習筆記

This is a study note for SAIT MMDA324 Wordpress theme class.

## Update

🆕Comments 留言

## Table of contents

- [WordPress Theme](#theme)
  - [層級](#hierarchy)
  - [Templates](#templates)
- [元件](#elements)
  - [Link file](#head)
  - [Header](#header)
  - [Footer](#footer)
  - [h1](#h1)
  - [Useful resources](#useful-resources)
- [Author](#author)

## WordPress Templates

### 層級

### Templates



## 元件

### Link file

```php
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
```


### Header



### Footer



### h1

```php
<h1>
<a href="<?php echo get_home_url(); ?>">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/web-communicaitons-logo.svg" alt="<?php bloginfo('name'); ?>">
</a>
</h1>
```


## Author

- Codepen - [TingHueiChen](https://codepen.io/TingHueiChen)
- Frontend Mentor - [@hejkeikei](https://www.frontendmentor.io/profile/hejkeikei)
- Twitter - [@hej_keikei](https://twitter.com/hej_keikei)

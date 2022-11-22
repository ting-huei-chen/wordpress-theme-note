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
  - [Menu](#menu)
  - [Sidebar](#widgets)
- [Author](#author)

## WordPress Templates

### 層級

### Templates

順序為推薦建檔順序，名稱一定要按照規定取名。
**代表他是一個區塊，需要用include或是get功能放進某一頁裡面才看得到

- style.css -> 最主要的通用CSS，主題資訊要寫在裡面，其他CSS可以依照不同樣板各別開檔案
- functions.php -> 要寫了funciton後臺才會開功能哦!
- index.php -> 最籠統的一頁，沒有特別分類的都是它(預設放blog post的地方也是這裡)
- header.php / footer.php -> 可以共用的區塊**
- page.php -> 所有不是post的頁面
- single.php -> 單個post的頁面
- sidebar.php -> 開啟widgets的地方，跟header一樣可以共用**
- archive.php -> 分類過的頁面，預設是照月份分類
- comments.php -> 留言的區塊**
- searchform.php -> 搜尋欄**
- search.php -> 搜尋結果頁面

## First Step

先幫主題取名才找得到!

```css
@import url('記得先import字體!');
/* 
Theme Name: Client Name 2022
Author: Your Name
Version: 0.1.0
Author URI: https://www.sample.com/
Description: The theme we built in MMDA 324 Web Communication 3 (Fall 2022)
 */
 ```

## 元件

### Link file

如何把CSS連到WordPress?

- 先把連結功能加進functions.php
(實際使用情況詳見functions.php line 3)

```php
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
add_theme_support('title-tag');
```

- 把CSS加入序列(get_stylesheet_uri()是用於自動定位style.css這個檔案的路徑)
(實際使用情況詳見functions.php line 6)
```php
function linked_assets()
{
    wp_enqueue_style('main', get_stylesheet_uri());
    if (is_page()) {
        wp_enqueue_style('page-styles', get_template_directory_uri() . '/page.css');
    } else if (is_single()) {
        wp_enqueue_style('page-styles', get_template_directory_uri() . '/single.css');
    }
}
```

- 把序列裡的檔案(剛剛連的CSS)加入WP
(實際使用情況詳見functions.php line 16)

```php
add_action('wp_enqueue_scripts', 'linked_assets');
```

- 最後在head裡面加入wp_head()
(實際使用情況詳見header.php line 7)
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

#### clickable logo 
用h1和<a>把LOGO圖片包起來，以下範例
(實際使用情況詳見header.php line 12)

```php
<h1>
<a href="<?php echo get_home_url(); ?>">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/web-communicaitons-logo.svg" alt="<?php bloginfo('name'); ?>">
</a>
</h1>
```
#### blog_info()

就是WordPress的基本內容，設定在後台的setting > general
![blog_info](images/blog_info.jpg)
- bloginfo('name') >> 網站名稱 (Website Title)
- bloginfo('description') >> 網站簡述 (Tagline)

### Menu

Menu就是一般會出現在nav裡的東西，以下是操作步驟

- 先在functions.php裡新建menu (詳見 line 19)
```php
function my_menus()
{
    register_nav_menu('header-menu', 'Main Menu (Header)');
    register_nav_menu('mobile-menu', 'Mobile Menu (Header)');
}
//語法是 register_nav_menu(自己取個id, 後臺看見的名字);
```

- 然後加入WP (詳見functions.php line 24)
```php
add_action('after_setup_theme', 'my_menus');
// 這裡的my_menus要跟上面的功能寫一樣的名字
```

- 接下來在WP後台設定好
位置 Appearance > Menus
![menu-setting](images/menu.jpg)

- 最後在需要menu的地方貼上
(實際使用情況和條件式詳見header.php line 20)

```php
wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'container_id' => 'main-nav'
            ));
// 語法 array('theme_location' => '剛剛取的id','container' => '外面包什麼tag','container_id' => '幫外層取個id')
```




### Sidebar
Sidebar === Widgets，可以放社群媒體ICON、近期貼文清單、最新留言等等，以下是操作步驟。

- 先在functions.php裡新建Widget (詳見 line 27)
```php
function widgets()
{
    register_sidebar(array(
        'name' => 'Blog Post Sidebar', //取一個後台看到的名字
        'id' => 'blog-sidebar', //取一個id
        'before_widget' => '<div class="widget">',//前面要放什麼tag?
        'after_widget' => '</div>',//後面要放什麼tag?(以下同理)
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
```

- 加入到WP (現在後台就找的到widgets了)
(詳見functions.php line 27)
```php
add_action('widgets_init', 'widgets');
//'widgets'是上面取的funciton名稱
```
- 在WP後台設定需要的widgets
![widgets](images/sidebar.jpg)

- 新增一個sidebar.php檔案，填入
```html
<aside id="sidebar">通常是用aside tag</aside>
```
- 貼上我們剛剛建立的widgets
(實際使用情況和條件式詳見sidebar.php line 6)
```php
dynamic_sidebar('blog-sidebar');
//這裡的'blog-sidebar'是剛剛我們自己取的id
```

- 最後在需要使用這個sidebar的地方貼上
(實際使用情況和條件式詳見single.php line 25)
```php
if (is_active_sidebar('blog-sidebar')) {
        get_sidebar();
    }
//這裡的'blog-sidebar'是剛剛我們自己取的id
```

### Comments

留言區(Comments)只會在single post底下出現，以下是操作步驟。
> 留言區開關及相關設定: WP面板 > Settings > Discussion Settings

- 新增comments.php檔案，填入
```php
if (comments_open()){
    // 如果留言區有開著，顯示以下
    // ...
}
```
(實際使用詳見comments.php line 3)

- 同上地方，填入需要的內容
```php
if (have_comments()) {
// 如果有人留言，印出以下
    echo '<h3>';
    // 顯示留言數語法 comments_number(0個的話寫這句,一個的話寫這句,二以上的話寫這句)
    comments_number('No comments on this post', 'One comment', '% Comments');
    echo '</h3>';

    echo '<ol id="comment-list">';
    wp_list_comments(array(
        'style' => 'ol',
        'avatar_size' => 64,
        'reverse_top_level' => true //如何排列留言(新到舊)
    ));
    echo '</ol>';
};
//插入回覆表單(留言框)
comment_form();
```

- 然後就在需要的位置放留言區(詳見single.php line 20)

```php
comments_template();
```

## Author

- Codepen - [TingHueiChen](https://codepen.io/TingHueiChen)
- Frontend Mentor - [@hejkeikei](https://www.frontendmentor.io/profile/hejkeikei)
- Twitter - [@hej_keikei](https://twitter.com/hej_keikei)

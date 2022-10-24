<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Previousnext 0.8.16

Show links to previous/next page.

<p align="center"><img src="previousnext-screenshot.png?raw=true" alt="Screenshot"></p>

## How to show links

This extension adds links to previous/next page, which allows users to navigate between pages. Links are shown on blog pages. To show links on other pages use a `[previousnext]` shortcut.

## Examples

Content file with links:

    ---
    Title: Example page
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [previousnext]

Layout file with links:

    <?php $this->yellow->layout("header") ?>
    <div class="content">
    <div class="main" role="main">
    <h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
    <?php echo $this->yellow->page->getContent() ?>
    <?php echo $this->yellow->page->getExtra("previousnext") ?>
    </div>
    </div>
    <?php $this->yellow->layout("footer") ?>

## Settings

The following settings can be configured in file `system/extensions/yellow-system.ini`:

`PreviousnextPagePrevious` = show link to previous page, 1 or 0  
`PreviousnextPageNext` = show link to next page, 1 or 0  

## Installation

[Download extension](https://github.com/annaesvensson/yellow-previousnext/archive/main.zip) and copy zip file into your `system/extensions` folder. Right click if you use Safari.

## Developer

Anna Svensson. [Get help](https://datenstrom.se/yellow/help/).

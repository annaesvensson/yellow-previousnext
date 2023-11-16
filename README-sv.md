<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Previousnext 0.8.18

Visa länkar till föregående/nästa sida.

<p align="center"><img src="SCREENSHOT.png?raw=true" alt="Skärmdump"></p>

## Hur man installerar ett tillägg

[Ladda ner ZIP-filen](https://github.com/annaesvensson/yellow-previousnext/archive/refs/heads/main.zip) och kopiera den till din `system/extensions` mapp. [Läs mer om tillägg](https://github.com/annaesvensson/yellow-update/tree/main/README-sv.md).

## Hur man visar länkar

Det här tillägget lägger till länkar till föregående/nästa sida, vilket gör det möjligt för användare att navigera mellan sidor. Länkar visas på bloggsidor. För att visa länkar på andra sidor använd en `[previousnext]` förkortning.

## Exempel

Innehållsfil med länkar:

    ---
    Title: Exempelsida
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [previousnext]

Layoutfil med länkar:

    <?php $this->yellow->layout("header") ?>
    <div class="content">
    <div class="main" role="main">
    <h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
    <?php echo $this->yellow->page->getContentHtml() ?>
    <?php echo $this->yellow->page->getExtraHtml("previousnext") ?>
    </div>
    </div>
    <?php $this->yellow->layout("footer") ?>

## Inställningar

Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`PreviousnextPagePrevious` = visa länk till föregående sida, 1 eller 0  
`PreviousnextPageNext` = visa länk till nästa sida, 1 eller 0  

## Utvecklare

Anna Svensson. [Få hjälp](https://datenstrom.se/sv/yellow/help/).

<?php
// Previousnext extension, https://github.com/annaesvensson/yellow-previousnext

class YellowPreviousnext {
    const VERSION = "0.8.18";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("previousnextPagePrevious", "1");
        $this->yellow->system->setDefault("previousnextPageNext", "1");
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="previousnext" && ($type=="block" || $type=="inline")) {
            $pages = $this->getRelatedPages($page);
            $page->setLastModified($pages->getModified());
            $pagePrevious = $pageNext = null;
            if ($this->yellow->system->get("previousnextPagePrevious")) $pagePrevious = $pages->getPagePrevious($page);
            if ($this->yellow->system->get("previousnextPageNext")) $pageNext = $pages->getPageNext($page);
            if ($pagePrevious!=null || $pageNext!=null) {
                $output = "<div class=\"previousnext\" role=\"navigation\" aria-label=\"".$this->yellow->language->getTextHtml("previousnextNavigation")."\">\n";
                $output .= "<p>";
                if ($pagePrevious!=null) {
                    $text = preg_replace("/@title/i", $pagePrevious->get("title"), $this->yellow->language->getText("previousnextPagePrevious"));
                    $output .= "<a class=\"previous\" href=\"".$pagePrevious->getLocation(true)."\">".htmlspecialchars($text)."</a>";
                }
                if ($pageNext!=null) {
                    if ($pagePrevious) $output .= " ";
                    $text = preg_replace("/@title/i", $pageNext->get("title"), $this->yellow->language->getText("previousnextPageNext"));
                    $output .= "<a class=\"next\" href=\"".$pageNext->getLocation(true)."\">".htmlspecialchars($text)."</a>";
                }
                $output .= "</p>\n";
                $output .="</div>\n";
            }
        }
        return $output;
    }
    
    // Handle page extra data
    public function onParsePageExtra($page, $name) {
        $output = null;
        if ($name=="previousnext" || $name=="link") {
            $output = $this->onParseContentShortcut($page, "previousnext", "", "block");
        }
        return $output;
    }
    
    // Return related pages
    public function getRelatedPages($page) {
        switch ($page->get("layout")) {
            case "blog":        if ($this->yellow->system->get("blogStartLocation")=="auto") {
                                    $pages = $page->getSiblings();
                                } else {
                                    $pages = $this->yellow->content->index();
                                }
                                $pages->filter("layout", "blog")->sort("published", true);
                                break;
            case "blog-start":  $pages = $this->yellow->content->clean(); break;
            default:            $pages = $page->getSiblings();
        }
        return $pages;
    }
}

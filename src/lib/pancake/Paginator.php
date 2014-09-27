<?php
require_once(getenv("DOCUMENT_ROOT")."/moveit2/lib/autoload.php");
class Paginator {
    public $pages;
    public $num_per_page;
    public $models;
    public $page_buffer = 10;

    public function __construct(Array $models,$num_per_page) {
        if($num_per_page<=0) {
            throw new Exception("Int num_per_page must be a positive integer");
        }
        $this->models = array_chunk($models,$num_per_page,false);
        $this->num_per_page = $num_per_page;
        $this->pages = ceil(count($models)/$num_per_page);
    }

    public function getPage($page) {
        if($page>$this->pages) {
            throw new Exception("Out of page range: 1-".$this->pages);
        }
        return $this->models[$page-1];
    }

    public function getUpper($current_page) {
        $page = $current_page;
        $pages = $this->pages;
        if($page<$this->page_buffer/2) {
            $diff = $this->page_buffer+1 - $page;
            $upper = $page+$diff < $pages ? $page+$diff : $pages;
            return $upper;
        }

        elseif($page>$pages-$this->page_buffer/2) {
            return $pages;
        }
        elseif($page==$this->page_buffer/2) {
            if($page + $this->page_buffer/2 + 1 < $pages) {
                return $page + $this->page_buffer/2 + 1;
            }
            else return $pages;
        }
        else {
            return $page+($this->page_buffer/2);
        }
    }
    public function getLower($current_page) {
        $page = $current_page;
        $pages = $this->pages;
        if($page<($this->page_buffer/2)+1) {
            return 1;
        }

        elseif($page>$pages-($this->page_buffer/2)) {
            $diff = ($page+($this->page_buffer/2)) - $pages;
            $lower = $page-($diff+($this->page_buffer/2)) > 1 ? $page-($diff+($this->page_buffer/2)) : 1;
            return $lower;
        }
        else {
            return $page-($this->page_buffer/2);
        }
    }
}
<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait PaginationTrait
{
    private $paginationTools;

    /**
     * @param Request $request
     * @param $items
     * @param int $itemsPerPage
     * @param int $itemsBeforeAndAfter
     */
    private function parginate(Request $request, $items, $itemsPerPage = 6, $itemsBeforeAndAfter = 2)
    {
        $this->paginationTools = new PaginationTools();
        $this->paginationTools->nextPage = 0;
        $this->paginationTools->previousPage = 0;

        $this->paginationTools->itemsPerPage = $itemsPerPage;
        $this->paginationTools->itemsNumber = $items->count();
        $this->paginationTools->itemsBeforeAndAfter = $itemsBeforeAndAfter;
        $this->paginationTools->pagesNumber = ceil($this->paginationTools->itemsNumber / $this->paginationTools->itemsPerPage);

        //--user page
        if(is_numeric($request->page)) $this->paginationTools->currentPage = $request->page;
        else $this->paginationTools->currentPage = 1;

        //--check that the page is in the range
        if($this->paginationTools->currentPage < 0) $this->paginationTools->currentPage = 1;
        else if ($this->paginationTools->currentPage > $this->paginationTools->pagesNumber) $this->paginationTools->currentPage = $this->paginationTools->pagesNumber;

        $this->paginationTools->displayItems = $items->forPage($this->paginationTools->currentPage, $this->paginationTools->itemsPerPage);
        $this->paginationTools->displayItems->all();

        if($this->paginationTools->currentPage > 1)
            $this->paginationTools->previousPage = $this->paginationTools->currentPage - 1;

        if($this->paginationTools->currentPage != $this->paginationTools->pagesNumber)
            $this->paginationTools->nextPage = $this->paginationTools->currentPage + 1;
    }
}

class PaginationTools
{
    public $nextPage;
    public $itemsNumber;
    public $currentPage;
    public $pagesNumber;
    public $displayItems;
    public $previousPage;
    public $itemsPerPage;
    public $itemsBeforeAndAfter;
}
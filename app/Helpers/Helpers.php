<?php

use Illuminate\Pagination\LengthAwarePaginator;

require 'DateProccessHelper.php';
require 'MetronicHelper.php';

if (!function_exists('pager')) {
    function pager($items)
    {
        if ($items instanceof LengthAwarePaginator) {
            return [
                'current_page' => $items->currentPage(),
                'total_items' => $items->total(),
                'total_pages' => $items->lastPage()
            ];
        }

        return $items;
    }
}

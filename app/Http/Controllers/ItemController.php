<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ItemRepositories;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->item = new ItemRepositories();
    }

    public function index()
    {
       $items =  ($this->item->index())->paginate(15);
        return view('items.index', compact('items'));
    }
}

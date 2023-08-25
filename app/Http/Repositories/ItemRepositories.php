<?php

namespace App\Http\Repositories;

 use App\Models\Item;
use Carbon\Carbon;

class ItemRepositories
{
    public function index()
    {
        return Item::orderBy('id', 'DESC');
     }

    public function show($id)
    {
        return Item::findOrFail($id);
    }

    public function store($data)
    {
        return Item::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'seller' => $data['seller'],
        ]);
    }

    public function statistics()
    {
        $data['current_month_total_price'] = Item::whereMonth('created_at', Carbon::now()->month)->sum('price');
        $data['average_price'] = Item::avg('price');
        return $data;
    }
}

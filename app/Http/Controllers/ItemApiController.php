<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ItemRepositories;
use App\Http\Requests\Item\ItemRequest;
use App\Http\Resources\ITemResource;

class ItemApiController extends Controller
{

    public function __construct()
    {
        $this->item = new ItemRepositories();
    }

    public function index()
    {
        $items = $this->item->index();
        return responseWithSuccess(__('messages.list_item_successful'), ITemResource::collection($items->get()), getPaginateDetails($items));
    }

    public function show($id)
    {
        $item = $this->item->show($id);
        return  responseWithSuccess(__('messages.list_item_successful'),new ITemResource($item));
    }

    public function store(ItemRequest $request)
    {
        $item = $this->item->store($request);
        return  responseWithSuccess(__('messages.list_item_successful'),new ITemResource($item));

    }

    public function statistics()
    {
        $item = $this->item->statistics();
        return response()->json($item);
    }
}

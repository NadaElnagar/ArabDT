<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('responseWithSuccess')) {
    function responseWithSuccess($message,$data=null,$meta=null)
    {
        $status = \Illuminate\Http\Response::HTTP_OK;
        $success['status'] = true;
        $success['message'] = $message;
        if ($data != null) $success['data'] = $data;
        if ($meta != null) $success['meta'] = $meta;
        return response()->json($success, $status);
    }
}

if (!function_exists('responseWithFailure')) {
    function responseWithFailure( $message,$status=null)
    {
        $fail['status'] = false;
        $status = !empty($status)? $status : 500;
        if ($message != null) $fail['errors'] = $message;
        return response()->json($fail, $status);
    }
}

if (!function_exists('getPaginationNumber')) {

    function getPaginationNumber()
    {
        // Set the default pagination number
        $defaultPaginationNumber = 10;
        return request('pagination',$defaultPaginationNumber);
    }
}

if (!function_exists('getPaginateDetails')) {

    function getPaginateDetails($items)
    {
        $total = $items->count();
        $number = getPaginationNumber();
        $result = $items->simplePaginate($number);

        return $paginationDetails = [
        'total' => $items->count(),
        'per_page' => getPaginationNumber(),
        'current_page' => $result->currentPage(),
        'last_page' =>  ceil($total/$number),
    ];
    }
}

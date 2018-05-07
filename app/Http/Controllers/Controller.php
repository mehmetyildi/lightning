<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Collection;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Pagination\Paginator;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Contracts\Support\Arrayable;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function paginate($collection,$perPage,$pageName='page',$fragment=null){

        $currentPage=LengthAwarePaginator::resolveCurrentPage($pageName);
        $currentPageItems=$collection->slice(($currentPage-1)*$perPage,$perPage);
        parse_str(request()->getQueryString(),$query);
        unset($query[$pageName]);
        $paginator=new LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $currentPage,
            [
                'pageName'=>$pageName,
                'path'=>LengthAwarePaginator::resolveCurrentPath(),
                'query'=>$query,
                'fragment'=>$fragment
            ]
        );
        return $paginator;
    }
}

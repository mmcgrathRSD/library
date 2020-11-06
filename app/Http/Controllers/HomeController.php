<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class HomeController extends Controller
{
    
    public function index(){

        $files = collect(Storage::files('requests'))->map(function($file){
                return [
                    'data' => Storage::get($file),
                    'meta' => Storage::getMetaData($file),
                ];
        })->sortByDesc(function($file){
            return $file['meta']['timestamp'];
        });

        $results = new \Illuminate\Pagination\LengthAwarePaginator($files->all(), $files->count(), 10);

        return view('welcome')->with('files', $files);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrewResource;
use App\Models\Brew;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class BrewController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function brews(Request $request): string
    {
        $page = $request->get('page',1);
        $search = $request->get('search');

        $brews = Brew::query()
            ->orderBy('since')
            ->when($search, function ($query) use($search){
                return $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->paginate(20);

        return json_encode(["brews" => BrewResource::collection($brews)->toJson(), "total" => $this->total()]);
    }

    public function total()
    {
        return Cache::remember('brew_total', Carbon::now()->addDays(3), function() {
         return Brew::query()->count();
        });

    }

    public  function show(Brew $brew)
    {
        return view('brew', ["brew" => $brew]);
    }

}

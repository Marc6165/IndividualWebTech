<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->query('query');

        if (!$query || strlen($query) < 2) {
            return response()->json([]);
        }

        $searchResults = Product::whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($query) . '%'])
            ->take(10)
            ->get();

        return response()->json($searchResults);
    }
}

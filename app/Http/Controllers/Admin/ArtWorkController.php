<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ArtWork;
use Illuminate\Http\Request;

class ArtWorkController extends Controller
{
    public function artWorkList()
    {
        $data['title'] = "Art Work List";
        $data['artworks'] = ArtWork::paginate(10);

        return view('backend.art_work.index', $data);
    }
}

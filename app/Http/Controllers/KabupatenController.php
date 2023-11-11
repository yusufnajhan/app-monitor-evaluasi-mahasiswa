<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function index(Request $request)
    {
        $kode_prov = $request->get('kode_prov');
        $kabupaten = Kabupaten::where('kode_prov', $kode_prov)->get();

        return $kabupaten;
    }
}

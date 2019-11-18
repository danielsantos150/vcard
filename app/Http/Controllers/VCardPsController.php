<?php

namespace App\Http\Controllers;

use App\VCardP;
use App\Http\Requests;


use Illuminate\Http\Request;

class VCardPsController
{
    public function index()
    {
        $vcards = VCardP::get();
        return response()->json($vcards);
    }

    public function show($id)
    {
        $vcard = VCardP::find($id);

        if(!$vcard) {
            return response()->json([
                'message'   => 'VCardP não localizado, colaborador não cadastrado na base',
            ], 404);
        }

        dd($vcard);
        return response()->json($vcard);
    }
}

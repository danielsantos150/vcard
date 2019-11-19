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
        $aInfo = VCardP::find($id);

        $aInfo = $aInfo->toArray();
        
        $vCard = VCardP::geraVCardFuncionario($aInfo);
        
        if(!$aInfo) {
            return response()->json([
                'message'   => 'VCardP não localizado, colaborador não cadastrado na base',
            ], 404);
        }else{
                        
            $elementVCard = rawurlencode($vCard);

            $vCardEncoded2 = \str_replace('END%3AVCARD%0A', 'END%3AVCARD',
                            \str_replace('%0AURL', '+URL',
                            \str_replace('%3B%3B%0ALABEL', '%0ALABEL',
                            \str_replace('%0D', '', 
                            \str_replace('%0AREV', '+REV',
                            \str_replace('%20', '+',
                            \str_replace('POSTAL%3BCHARSET%3Dutf-8%3A', 'POSTAL%3BCHARSET%3Dutf-8%3A%3A%3A',
                            $elementVCard)))))));

            return view('uservcard', ['linkvcard' => "https://api.qrserver.com/v1/create-qr-code/?data=".$vCardEncoded2]);
        }
    }
}

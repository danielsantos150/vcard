<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use JeroenDesloovere\VCard\VCard;

use App\Response;

class VCardP extends Model
{
    protected $fillable = ['funcionariosid', 'idcliente', 'nome', 'cpf', 'email', 'telefone', 
                            'situacao', 'pa_intranet', 'codpa_intranet', 'codpa_sisbr', 'setor',
                            'codsetor', 'pa_sisbr', 'dt_atualizacao', 'funcao', 'setor_intranet',
                            'celular', 'pa_intranet_secundario', 'codpa_intranet_secundario',
                            'codpa_ref_sisbr_secundario'];

    //protected $dates = ['deleted_at'];

    protected $primaryKey = 'idcliente';

    protected $table = 'funcionarios';


    
    public static function geraVCardFuncionario($aInfo){
        $vcard = new VCard();
                
        $name = \explode(' ', $aInfo["NOME"]);
        
        $lastname = $name[sizeof($name) -1];
        $firstname = $name[0];
        // add personal data
        $vcard->addName($lastname, $firstname);

        // add work data
        $vcard->addCompany('SICOOB CREDICOM');
        $vcard->addJobtitle($aInfo["FUNCAO"]);
        $vcard->addRole($aInfo["SETOR"]);
        $vcard->addEmail($aInfo["EMAIL"]);
        $vcard->addPhoneNumber($aInfo["TELEFONE"], 'PREF;WORK');
        $vcard->addPhoneNumber($aInfo["CELULAR"], 'WORK');
        $vcard->addAddress('Avenida do Contorno 4265', 'São Lucas', '30110-021', 'Belo Horizonte - MG');
        $vcard->addLabel('Rua/Avenida Nº, Bairro, CEP, Cidade');
        $vcard->addURL('https://www.sicoobcredicom.com.br');

        return $vcard->getOutput();        
    }

}

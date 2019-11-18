<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use JeroenDesloovere\VCard\VCard;

class VCardP extends Model
{
    protected $fillable = ['firstname', 'lastname', 'company', 'jobtitle', 'role', 'email', 'phonenumber', 'phonenumber_sec', 'address', 'label', 'url'];

    protected $dates = ['deleted_at'];

    protected $table = 'v_cards';


    
    public function geraVCardFuncionario($aInfo){
        $vcard = new VCard();

        $lastname = 'Desloovere';
        $firstname = 'Jeroen';
        $additional = '';
        $prefix = '';
        $suffix = '';

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add work data
        $vcard->addCompany('Siesqo');
        $vcard->addJobtitle('Web Developer');
        $vcard->addRole('Data Protection Officer');
        $vcard->addEmail('info@jeroendesloovere.be');
        $vcard->addPhoneNumber(1234121212, 'PREF;WORK');
        $vcard->addPhoneNumber(123456789, 'WORK');
        $vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
        $vcard->addLabel('street, worktown, workpostcode Belgium');
        $vcard->addURL('http://www.jeroendesloovere.be');

        $vcard->addPhoto(__DIR__ . '/landscape.jpeg');

        // return vcard as a string
        //return $vcard->getOutput();

        // return vcard as a download
        return $vcard->download();

    }

}

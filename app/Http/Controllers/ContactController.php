<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreContactRequest;
use App\Http\Classes\MailJet;

class ContactController extends Controller
{
    public function contact()
    {
        // get options enum for form contact
        $options = DB::select(DB::raw('SHOW COLUMNS FROM contacts WHERE Field = "objet"'))[0]->Type;
        preg_match_all("/'([^']+)'/", $options, $matches);

        return view('contact', [
            'options' => $matches[1],
        ]);
    }

    public function sendContact(StoreContactRequest $request)
    {
        $newContact = new Contact;

        $newContact->name = $request->input('name');
        $newContact->email = $request->input('email');
        $newContact->phone = $request->input('phone');
        $newContact->objet = $request->input('objet');
        $newContact->content = $request->input('content');

        // dd($newContact);

        $newContact->save();

        // new mail
        $email = new MailJet;

        // send mail
        $email->sendContact(
            'Message Contact pour ' .  $request->input('objet'),
            'Envoyé par ' . $request->input('name') . '<br>' . 'Email : ' . $request->input('email'),
            $request->input('content')
        );

        return redirect('/contact')->with('success', 'Votre demande de contact à bien été envoyé !');
    }
}

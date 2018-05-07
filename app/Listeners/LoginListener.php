<?php

namespace App\Listeners;

use \Aacotroneo\Saml2\Events\Saml2LoginEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Saml2LoginEvent  $event
     * @return void
     */
    public function handle(Saml2LoginEvent $event)
    {

        $user = $event->getSaml2User();

		$userData = [
			'id' => $user->getUserId(),
			'attributes' => $user->getAttributes(),
            'assertion' => $user->getRawSamlAssertion(),
            'sessionIndex' => $user->getSessionIndex(),
            'nameId' => $user->getNameId(),
        ];

		//check if email already exists and fetch user
		$user = \App\User::where('email', $userData['attributes']['mail'][0])->first();

		//if email doesn't exist, create new user
		if($user === null)
		{
			$user = new \App\User;
			$user->username = sprintf('%s %s', $userData['attributes']['sn'][0], $userData['attributes']['givenName'][0]);
			$user->email = $userData['attributes']['mail'][0];
			$user->password = bcrypt(str_random(8));
            $user->last_name = $userData['attributes']['sn'][0];
            $user->first_name = $userData['attributes']['givenName'][0];
			$user->role = "writer";
			$user->save();

			$partecipant = new \App\Participant();
			$partecipant->first_name = $userData['attributes']['givenName'][0];
            $partecipant->last_name = $userData['attributes']['sn'][0];
            $partecipant->save();
		}
        
        //insert sessionIndex and nameId into session
        session(['sessionIndex' => $userData['sessionIndex']]);
        session(['nameId' => $userData['nameId']]);

		//login user
		\Auth::login($user);
    }
}

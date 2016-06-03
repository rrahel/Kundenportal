Klicken Sie hier Ihr Passwort zurücksetzen zu können: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>

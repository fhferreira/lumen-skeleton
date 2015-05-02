Hi {{ $user->name }},

A brand new Acme account has been created specially for you.
Please find the credentials right bellow:

- login: {{ $user->email }}
- password: {{ $event->password }}

See you there.
{{ $homepage }}

Cheers!

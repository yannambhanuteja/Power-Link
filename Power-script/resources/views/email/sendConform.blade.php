<h3>Hey {{$user->name}} thank you for signing up with us </h3> <br>

you are only a step ahead <br>

To verify email <a href="{{route('sendEmail',["email"=>$user->email,"verifytoken"=>$user->verifytoken])}}" >click here </a>
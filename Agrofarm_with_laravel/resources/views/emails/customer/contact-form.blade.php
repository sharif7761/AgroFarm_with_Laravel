@component('mail::message')

#Thank you for the message

<strong>Name: </strong><b>{{$data['name']}}</b><br>
<strong>Email: </strong><b>{{$data['email']}}</b><br>
<strong>Message: </strong><br>

{{$data['message']}}

@endcomponent

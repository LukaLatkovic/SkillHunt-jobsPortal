@component('mail::message')

<strong>Name:</strong> {{$data['name']}}<br/>
<strong>Reply to:</strong> {{$data['email']}}<br/>
<strong>Subject:</strong> {{$data['subject']}}<br/>

> {{$data['message']}}

@endcomponent

<p>
    {!! trans('emails.homecontact.intro') !!}
</p>
<hr>
<h4>
    {!! trans('emails.homecontact.details') !!}
</h4>
<ul>
    @if($name)
        <li>
            {!! trans('emails.homecontact.labels.name') !!} <strong>{{ $name }}</strong>
        </li>
    @endif
    @if($email)
        <li>
            {!! trans('emails.homecontact.labels.email') !!} <strong>{{ $email }}</strong>
        </li>
    @endif
    @if($subject)
        <li>
            {!! trans('emails.homecontact.labels.subject') !!} <strong>{{ $subject }}</strong>
        </li>
    @endif
</ul>
<hr>
@if($messageLines)
    <h4>
        {!! trans('emails.homecontact.labels.message') !!}
    </h4>
    <p>
        @foreach ($messageLines as $messageLine)
            {{ $messageLine }}<br>
        @endforeach
    </p>
    <hr>
@endif

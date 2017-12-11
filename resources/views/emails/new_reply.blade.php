@component('mail::message')

**{{ $reply->replyAble()->author()->name() }}** has replied to this thread.

@component('mail::panel')
@md($reply->body())
@endcomponent

You are receiving this because you are subscribed to this thread.<br>
[View it on Laravel.io]({{ route('thread', $reply->replyAble()->slug()) }}),
or [unsubscribe]({{ route('threads.unsubscribe', $reply->replyAble()->slug()) }}).

@endcomponent

<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="d-flex p-2 justify-content-center">
    <div class="card alert col-md-9 ftco-animate">
        <div class="card-head">
            <div class="row ">
                <div class="col-md-6">
                    <h4>
                        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
                    </h4>
                </div>
                @if($thread->userUnreadMessagesCount(Auth::id()) > 0)
                <div class="col-md-6 text-right">
                    <h5>
                        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
                    </h5>
                </div>
                @endif
            </div>
        </div>
        <hr>
        <div class="card-body">
            <p>
               Last message: {{ $thread->latestMessage->body }}
            </p>
            <p>
                <small>
                    <strong>From:</strong>
                    @if($thread->creator()->id == Auth::id())
                        You
                    @else
                        {{ $thread->creator()->name }}
                    @endif
                </small>
                {{-- <br/>
                <small>
                    <strong>To:</strong>
                    @if($thread->participantsString(Auth::user()->name) == Auth::id())
                        You
                    @elseif($thread->participantsString() !== Auth::id())
                     {{ $thread->participantsString(Auth::user()) }}
                    @endif
                </small> --}}
            </p>
            {{-- <p>
                <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
            </p> --}}
        </div>
    </div>
</div>
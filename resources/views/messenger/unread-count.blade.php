<?php $count = Auth::user()->newThreadsCount(); ?>
@if($count > 0)
    <span class="badge badge-light"> {{ $count }}</span>
@endif

@extends('layouts.master1')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="tab-content" style="align:center">


            <div class="card ftco-animate" style="padding:20px">
                <div class="col-md-12">
                <h2>Create a new message</h2>
                </div>
            <br/>
                <form action="{{ route('messages.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <!-- Subject Form Input -->
                        <div class="form-group">
                            <label class="control-label">Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="Subject"
                                value="{{ old('subject') }}" required>
                        </div>

                        <!-- Message Form Input -->
                        <div class="form-group">
                            <label class="control-label">Message</label>
                            <textarea name="message" class="form-control" required>{{ old('message') }}</textarea>
                        </div>
                 
                        <div class="form-group">
                        <input class="form-control" id="searchItem" placeholder="Recipient" required>
                        <input type="hidden" id="userId" name="recipients">
                        </div>
   

                        {{-- @if($users->count() > 0)
                        <div class="checkbox">
                            @foreach($users as $user)
                            <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                    value="{{ $user->id }}">{!!$user->name!!}</label>
                            @endforeach
                        </div>
                        @endif --}}

                        <!-- Submit Form Input -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <h1>Create a new message</h1>
    <form action="{{ route('messages.store') }}" method="post">
{{ csrf_field() }}
<div class="col-md-6">
    <!-- Subject Form Input -->
    <div class="form-group">
        <label class="control-label">Subject</label>
        <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}">
    </div>

    <!-- Message Form Input -->
    <div class="form-group">
        <label class="control-label">Message</label>
        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
    </div>

    @if($users->count() > 0)
    <div class="checkbox">
        @foreach($users as $user)
        <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                value="{{ $user->id }}">{!!$user->name!!}</label>
        @endforeach
    </div>
    @endif

    <!-- Submit Form Input -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</div>
</form> --}}

<script type="text/javascript">
    $( function() {
      $( "#searchItem" ).autocomplete({
        source: "http://127.0.0.1:8000/autocomplete",
        focus: function( event, ui ) {
            $( "#searchItem" ).val( ui.item.label );
            return false;
        },
        select: function( event, ui ) {
            $( "#searchItem" ).val( ui.item.label );
            $( "#userId" ).val( ui.item.value );
            return false;
        }
      });
    } );
    </script>

{{-- <script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
    $('#test').autocomplete({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script> --}}
@stop
@props(['messages'])

@if ($messages)
    <ul>
        @foreach ((array) $messages as $message)
            <li class="error_message hel_reg">{{ $message }}</li>
        @endforeach
    </ul>
@endif

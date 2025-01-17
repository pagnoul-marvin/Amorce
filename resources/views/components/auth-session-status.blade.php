@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'hel_reg success_message'])}}>
        <p class="success_message_text"></p>{{ $status }}
    </div>
@endif

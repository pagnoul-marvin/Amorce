@props(['class', 'id', 'label'])
<x-layout.label-and-input class="{{$class}}">

    <label class="label hel_bold" for="{{$id}}">{{$label}}</label>
    <div class="input_error_message flex">

        {{$slot}}

    </div>

</x-layout.label-and-input>

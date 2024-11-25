@props(['class'])

<div @if($class) class="{{$class}} input_label_container flex" @endif>

    {{$slot}}

</div>

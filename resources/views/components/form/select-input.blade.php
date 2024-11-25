@props(['type', 'id', 'label', 'placeholder', 'value', 'required', 'class'])

<x-layout.label-and-input :class="$class">

    <label class="label hel_bold" for="{{$id}}">{{$label}}</label>
    <div class="input_error_message flex">

        <select class="input" type="{{$type}}" id="{{$id}}" name="{{$id}}"
                @if($placeholder) placeholder="{{$placeholder}}" @endif
                @if($required) required @endif
                @if($value) value="{{$value}}" @else value="{{old($id)}}" @endif>

            {{$slot}}

        </select>

        @error($id)
        <x-input-error :messages="$errors->get($id)"/>
        @enderror

    </div>

</x-layout.label-and-input>

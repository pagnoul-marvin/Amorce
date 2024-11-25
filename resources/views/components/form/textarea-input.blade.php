@props(['id', 'label', 'placeholder', 'value', 'required', 'class'])

<x-layout.label-and-input :class="$class">

    <label class="label hel_bold" for="{{$id}}">{{$label}}</label>
    <div class="input_error_message flex">

        <textarea name="{{$id}}" id="{{$id}}" placeholder="{{$placeholder}}" class="input" @if($required) required @endif>

           {{ $value ?? old($id) }}

        </textarea>

        @error($id)
        <x-input-error :messages="$errors->get($id)"/>
        @enderror

    </div>

</x-layout.label-and-input>

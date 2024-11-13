@props(['type', 'id', 'label', 'placeholder', 'required', 'class'])

<div @if($class) class="{{$class}} flex" @endif>

    <label class="label hel_bold" for="{{$id}}">{{$label}}</label>
    <div class="input_error_message flex">

        <input class="input" type="{{$type}}" id="{{$id}}" name="{{$id}}"
               @if($placeholder) placeholder="{{$placeholder}}" @endif
               @if($required) required @endif value="{{old($id)}}">

        @error($id)
        <x-input-error :messages="$errors->get($id)"/>
        @enderror

    </div>

</div>

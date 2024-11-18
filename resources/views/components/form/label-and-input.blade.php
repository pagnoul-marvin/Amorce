@props(['type', 'id', 'label', 'placeholder', 'value', 'required', 'class'])

<div @if($class) class="{{$class}} input_label_container flex" @endif>

    <label class="label hel_bold" for="{{$id}}">{{$label}}</label>
    <div class="input_error_message flex">

        @if($type === 'textarea')
            <textarea name="{{$id}}" id="{{$id}}" placeholder="{{$placeholder}}" class="input" @if($required) required @endif>



            </textarea>
        @else

            <input class="input" type="{{$type}}" id="{{$id}}" name="{{$id}}"
                   @if($placeholder) placeholder="{{$placeholder}}" @endif
                   @if($required) required @endif
                   @if($value) value="{{$value}}" @else value="{{old($id)}}" @endif>
        @endif

        @error($id)
        <x-input-error :messages="$errors->get($id)"/>
        @enderror

    </div>

</div>

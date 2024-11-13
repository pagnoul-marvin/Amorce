@props(['id', 'label', 'placeholder', 'required', 'class'])

<div @if($class) class="{{$class}} flex" @endif>

    <label class="label hel_bold" for="{{$id}}">{{$label}}</label>
    <div class="input_error_message flex">

        <input class="input" type="{{$showPassword ? 'text' : 'password'}}" id="{{$id}}" name="{{$id}}"
               @if($placeholder) placeholder="{{$placeholder}}" @endif
               @if($required) required @endif>

        <button type="button" wire:click="togglePasswordVisibility" class="input_error_message_show_password_button">

            @if($showPassword)

                <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.5 18.5">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: none;
                                stroke: #fff;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                                stroke-width: 2.5px;
                            }
                        </style>
                    </defs>
                    <path class="cls-1" d="M1.25,9.25S5.25,1.25,12.25,1.25s11,8,11,8c0,0-4,8-11,8S1.25,9.25,1.25,9.25Z"/>
                    <path class="cls-1" d="M12.25,12.25c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"/>
                    <line class="cls-1" x1="1.25" y1="1.25" x2="23.25" y2="17.25"/>
                </svg>

            @else

                <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24.5 18.5">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: none;
                                stroke: #fff;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                                stroke-width: 2.5px;
                            }
                        </style>
                    </defs>
                    <path class="cls-1" d="M1.25,9.25S5.25,1.25,12.25,1.25s11,8,11,8c0,0-4,8-11,8S1.25,9.25,1.25,9.25Z"/>
                    <path class="cls-1" d="M12.25,12.25c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z"/>
                </svg>

            @endif

        </button>

        @error($id)
        <x-input-error :messages="$errors->get($id)"/>
        @enderror

    </div>

</div>


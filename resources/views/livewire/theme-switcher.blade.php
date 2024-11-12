<div class="themes flex {{ $isLightTheme ? 'light_is_active' : 'dark_is_active' }}">

    <button class="themes_light" wire:click="setTheme('light')">

        <svg class="{{$isLightTheme ? 'move' : ''}} svg" id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.27 16.27">
            <defs>
                <style>
                    .cls-2 {
                        fill: none;
                        stroke: rgba(0, 0, 0, .6);
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        stroke-width: 1.6px;
                    }
                </style>
            </defs>
            <path class="cls-2" d="M8.13.8v1.33M8.13,14.13v1.33M13.32,2.95l-.95.95M3.89,12.37l-.95.95M15.47,8.13h-1.33M2.13,8.13H.8M13.32,13.32l-.95-.95M3.89,3.89l-.95-.95M4.8,8.13c0,1.84,1.49,3.33,3.33,3.33s3.33-1.49,3.33-3.33-1.49-3.33-3.33-3.33-3.33,1.49-3.33,3.33Z"/>
        </svg>

        <svg class="{{$isLightTheme ? '' : 'move'}} svg" id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16.27 16.27">
            <defs>
                <style>
                    .cls-1 {
                        fill: none;
                        stroke: #fff;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                        stroke-width: 1.6px;
                    }
                </style>
            </defs>
            <path class="cls-1" d="M8.13.8v1.33M8.13,14.13v1.33M13.32,2.95l-.95.95M3.89,12.37l-.95.95M15.47,8.13h-1.33M2.13,8.13H.8M13.32,13.32l-.95-.95M3.89,3.89l-.95-.95M4.8,8.13c0,1.84,1.49,3.33,3.33,3.33s3.33-1.49,3.33-3.33-1.49-3.33-3.33-3.33-3.33,1.49-3.33,3.33Z"/>
        </svg>

    </button>

    <button class="themes_dark" wire:click="setTheme('dark')">

        <svg class="{{$isLightTheme ? 'move' : ''}} svg" id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.97 12.97">
            <defs>
                <style>
                    .cls-1 {
                        fill: none;
                        stroke: #fff;
                        stroke-linecap: round;
                        stroke-linejoin: round;
                    }
                </style>
            </defs>
            <path class="cls-1" d="M12.47,7.03c-.1,1.13-.53,2.22-1.23,3.12-.7.9-1.64,1.59-2.71,1.97-1.07.39-2.23.46-3.34.21-1.11-.25-2.13-.81-2.94-1.61-.81-.81-1.37-1.82-1.61-2.94-.25-1.11-.17-2.27.21-3.34.39-1.07,1.07-2.01,1.97-2.71.9-.7,1.98-1.12,3.12-1.23-.66.9-.98,2.01-.9,3.12.08,1.11.56,2.16,1.35,2.95s1.84,1.27,2.95,1.35c1.11.08,2.22-.24,3.12-.9Z"/>
        </svg>

        <svg class="{{$isLightTheme ? '' : 'move'}} svg" id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12.97 12.97">
            <defs>
                <style>
                    .cls-2 {
                        fill: none;
                        stroke: rgba(0, 0, 0, .6);
                        stroke-linecap: round;
                        stroke-linejoin: round;
                    }
                </style>
            </defs>
            <path class="cls-2" d="M12.47,7.03c-.1,1.13-.53,2.22-1.23,3.12-.7.9-1.64,1.59-2.71,1.97-1.07.39-2.23.46-3.34.21-1.11-.25-2.13-.81-2.94-1.61-.81-.81-1.37-1.82-1.61-2.94-.25-1.11-.17-2.27.21-3.34.39-1.07,1.07-2.01,1.97-2.71.9-.7,1.98-1.12,3.12-1.23-.66.9-.98,2.01-.9,3.12.08,1.11.56,2.16,1.35,2.95s1.84,1.27,2.95,1.35c1.11.08,2.22-.24,3.12-.9Z"/>
        </svg>

    </button>

</div>

<div class="app_nav flex"
     x-data="{ open: @entangle('isNavVisible'), openHeaderWidth: '14.3125em', closeHeaderWidth: '4em' }"
     x-bind:style="{ width: open ? openHeaderWidth : closeHeaderWidth }">

    <div class="flex app_nav_logo_and_close_icon">

        <div x-show="open">

            <x-logo class="logo_small"/>

        </div>

        <svg x-show="open" wire:click="toggleNav" class="app_nav_logo_and_close_icon_icon" clip-rule="evenodd" fill-rule="evenodd"
             stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m13.789 7.155c.141-.108.3-.157.456-.157.389 0 .755.306.755.749v8.501c0 .445-.367.75-.755.75-.157 0-.316-.05-.457-.159-1.554-1.203-4.199-3.252-5.498-4.258-.184-.142-.29-.36-.29-.592 0-.23.107-.449.291-.591 1.299-1.002 3.945-3.044 5.498-4.243z"/>
        </svg>
        <svg x-show="!open" wire:click="toggleNav" class="app_nav_logo_and_close_icon_icon" clip-rule="evenodd" fill-rule="evenodd"
             stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path transform="scale(-1, 1) translate(-24, 0)"
                  d="m13.789 7.155c.141-.108.3-.157.456-.157.389 0 .755.306.755.749v8.501c0 .445-.367.75-.755.75-.157 0-.316-.05-.457-.159-1.554-1.203-4.199-3.252-5.498-4.258-.184-.142-.29-.36-.29-.592 0-.23.107-.449.291-.591 1.299-1.002 3.945-3.044 5.498-4.243z"/>
        </svg>
    </div>

    <div x-show="open">

        <livewire:navigations.main-links/>

    </div>

    <div class="app_nav_theme_switcher_and_profile flex" x-show="open">

        <livewire:theme-switcher/>

        <livewire:navigations.profile-nav/>

    </div>

</div>


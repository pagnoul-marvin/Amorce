<div class="themes flex {{ $isLightTheme ? 'light_is_active' : 'dark_is_active' }}">

    <button class="themes_light" wire:click="setTheme('light')"></button>

    <button class="themes_dark" wire:click="setTheme('dark')"></button>

</div>

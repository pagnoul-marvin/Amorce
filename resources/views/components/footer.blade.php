<footer class="footer flex" x-data="{openMarginLeft: '16.8125em', closeMarginLeft: '6.50em', marginLeft: '16.8125em'}"
        @toggle-nav.window="marginLeft = $event.detail[0].isNavVisible ? openMarginLeft : closeMarginLeft"
        x-bind:style="{ marginLeft: marginLeft }">

    <p class="footer_copy hel_bold">&copy; Amorce 2025</p>

    <x-logo class="logo_small"/>

</footer>

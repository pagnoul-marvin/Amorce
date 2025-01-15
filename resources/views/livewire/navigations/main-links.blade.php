<nav class="app_nav_main">

    <h2 class="hidden">{{$main_nav_title}}</h2>

    <ul class="app_nav_main_list flex">

        @foreach($main_links as $main_link)

            <li wire:key="main-link-{{$main_link['name']}}" class="app_nav_main_list_item {{request()->segment(1) == ltrim($main_link['url'], '/') ? 'active' : 'inactive'}}">
                <a class="hel_reg app_nav_main_list_item_link" wire:navigate
                   href="{{$main_link['url']}}"
                   title="{{__('texts.page_link')}} {{$main_link['name']}}">{{$main_link['name']}}</a>
            </li>

        @endforeach

    </ul>

</nav>

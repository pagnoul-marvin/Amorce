<div>

    <nav>

        <h2 class="hidden">{{$title}}</h2>

        <ul>

            @auth

                @foreach($links as $link)

                    <li><a href="{{$link['url']}}" title="Aller vers la page {{$link['name']}}">{{$link['name']}}</a></li>

                @endforeach

            @endauth

        </ul>

    </nav>

</div>

@props(['title', 'description', 'model'])
<div class="page_title_and_description">

    <h1 class="page_title hel_reg">{{$title}} @if($model) <span class="hel_bold">{{$model}}</span> @endif</h1>
    <p class="page_description hel_reg">{{$description}}</p>

</div>

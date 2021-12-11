<div class="sidebar__item sidebar__item__color--option">
    <h4>Colors</h4>
    @foreach ($colors as $color)
        <style>
            .sidebar__item__color.sidebar__item__color--{{$color->value}} label:after{
                background: {{$color->value}};
                 border: 1px solid hsl(0, 0%, 5%);
            }
        </style>
        <div class="sidebar__item__color sidebar__item__color--{{$color->value}}">

        <label for="{{$color->value}}">
            {{$color->value}}
            <input type="radio" id="{{$color->value}}" wire:model="color" value="{{$color->value}}">
        </label>
    </div>
    @endforeach
</div>
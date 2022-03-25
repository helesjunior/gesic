@php
    $menu = new \App\Aid\Menu();
    $mainMenu = $menu->makeMainMenu();
@endphp

@foreach($mainMenu as $item)
    @include('backpack::menu.item')
@endforeach

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('cost-center') }}'><i class='nav-icon la la-question'></i> Cost centers</a></li>
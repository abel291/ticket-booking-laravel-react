@php
    $navigations_1 = [
        [
            'name' => 'Home',
            'route' => 'dashboard.home',
            'icon' => 'heroicon-s-home',
        ],
        // [
        //     'name' => 'Usuarios',
        //     'route' => 'dashboard.users',
        //     'icon' => 'heroicon-s-user',
        // ],
        // [
        //     'name' => 'Categorias',
        //     'route' => 'dashboard.categories',
        //     'icon' => 'heroicon-s-tag',
        // ],
    
        // [
        //     'name' => 'Promociones',
        //     'route' => 'dashboard.promotions',
        //     'icon' => 'heroicon-s-star',
        // ],
    
        [
            'name' => 'Eventos',
            'route' => 'dashboard.events',
            'icon' => 'heroicon-s-square-2-stack',
        ],
        // [
        //     'name' => 'Equipo y permisos',
        //     'route' => 'dashboard.members',
        //     'icon' => 'heroicon-s-user-group',
        // ],
        [
            'name' => 'Recintos',
            'route' => 'dashboard.locations',
            'icon' => 'heroicon-s-map-pin',
        ],
        [
            'name' => 'Ordenes',
            'route' => 'dashboard.orders',
            'icon' => 'heroicon-s-ticket',
        ],
        // [
        //     'name' => 'Configuraciones',
        //     'route' => 'dashboard.orders',
        //     'icon' => 'heroicon-s-cog-6-tooth',
        // ],
        [
            'name' => 'Oradores',
            'route' => 'dashboard.orders',
            'icon' => 'heroicon-s-cog-6-tooth',
        ],
    ];
    
    $navigation_2 = [
        [
            'name' => 'Post',
            'route' => 'dashboard.blog',
            'icon' => 'heroicon-s-newspaper',
        ],
        // [
        //     'title' => 'Autores',
        //     'route' => 'dashboard.authors',
        //     'icon' => 'heroicon-s-pencil',
        // ],
    ];
@endphp
<div class="w-72 flex bg-gray-900 z-40">
    <div class="px-6 pb-4 pt-0 flex flex-col gap-y-6 overflow-y-auto grow ">
        <div class="text-white h-16 flex items-center ">
            <x-application-logo />
        </div>
        <nav class="flex flex-col flex-1">

            <ul role="list" class="flex flex-col  gap-y-7 flex-1">
                <li>
                    <ul role="list" class="space-y-1 -mx-2">
                        @foreach ($navigations_1 as $item)
                            <li>
                                <a href="{{ route($item['route']) }}"
                                    class="font-semibold text-sm leading-6 rounded-md flex gap-x-3 p-2
									{{ request()->routeIs($item['route'] . '*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
                                    @svg($item['icon'], 'w-6 h-6')
                                    {{ $item['name'] }}
                                </a>
                            </li>
                        @endforeach

                    </ul>
                </li>

                {{-- <li>
                    <div class="text-xs font-semibold leading-6 text-gray-400">Blog</div>
                    <ul role="list" class="space-y-1 -mx-2">
                        @foreach ($navigation_2 as $item)
                            <li>
                                <a href="{{ route($item['route']) }}"
                                    class="font-semibold text-sm leading-6 rounded-md flex gap-x-3 p-2
											{{ request()->routeIs($item['route'] . '*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
                                    @svg($item['icon'], 'w-6 h-6')
                                    {{ $item['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li> --}}
                <li class="mt-auto">
                    <ul role="list" class="space-y-1 -mx-2">
                        <li>
                            <a href="{{ route('dashboard.home') }}"
                                class="font-semibold text-sm leading-6 rounded-md flex gap-x-3 p-2
									{{ request()->routeIs('dashboard.home' . '*') ? 'text-white bg-gray-800' : 'text-gray-400 hover:text-white hover:bg-gray-800' }}">
                                @svg('heroicon-s-cog-6-tooth', 'w-6 h-6 flex-shrink-0')
                                Configuraciones
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

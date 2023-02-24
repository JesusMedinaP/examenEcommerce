<div>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de productos
            </h2>
            <x-button-link class="ml-auto" href="{{route('admin.products.create')}}">
                Agregar producto
            </x-button-link>
        </div>
    </x-slot>

    <x-table-responsive>

        <x-jet-label value="Paginación" class=""></x-jet-label>
        <select class="w-full form-control" wire:model="pagination">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>

        <div class="px-6 py-4">
            <x-jet-input class="w-full"
                         wire:model="search"
                         type="text"
                         placeholder="Introduzca el nombre del producto a buscar">
            </x-jet-input>
        </div>


{{--        <x-jet-label value="Filtros"></x-jet-label>--}}
{{--        <x-jet-input wire:model="options" type="checkbox" placeholder="Filtrar los elementos mostrados">--}}
{{--            @foreach($options as $option)--}}
{{--                <input type="checkbox" id="{{$option}}">{{$option}}</label><br>--}}
{{--            @endforeach--}}
{{--        </x-jet-input>--}}
{{--        <label><input type="checkbox" id="category">Categorías</label><br>--}}

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            <h2 class="font-semibold text-center mb-2">Categorías</h2>
            <ul class="divide-y divide-gray-200">
{{--                @foreach($categories as $category)--}}
{{--                    <li class="py-2 text-sm ">--}}
{{--                        <a class="cursor-pointer hover:text-orange-500 capitalize--}}
{{--                        {{ $categoria == $category->slug ? 'text-orange-500 font-semibold' : '' }}"--}}
{{--                           wire:click="$set('subcategoria', '{{ $category->slug }}')">--}}
{{--                            {{ $category->name }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
            </ul>
        </aside>

        <aside>
            <h2 class="font-semibold text-center mt-4 mb-2">Marcas</h2>
            <ul class="divide-y divide-gray-200">
                @foreach($brands as $brand)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-orange-500 capitalize"
                           {{ $marca == $brand->name ? 'text-orange-500 font-semibold' : ''}}
                           wire:click="$set('marca', '{{ $brand->name }}')">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <x-jet-button class="mt-4" wire:click="limpiar">
                Eliminar Filtros
            </x-jet-button>

        </aside>
        </div>

    @if($products->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="">Nombre</a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="">Categoría</a>
                    </th>

                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="">Marca</a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Vendidos
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha
                    </th>

                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="">Precio</a>
                    </th>

                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Editar</span>
                    </th>

                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($products as $product)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 object-cover">
                                    <img class="h-10 w-10 rounded-full" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $product->name }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Categoría y Subcategoría-->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$product->subcategory->category->name}}</div>
                            <div class="text-sm text-gray-500">{{$product->subcategory->name}}</div>
                        </td>
                        <!-- Marcas -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$product->brand->name}}</div>
                        </td>
                        <!-- Número de Productos que se han vendido -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$product->quantity - $product->stock}}</div>
                        </td>
                        <!-- Stock -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$product->stock}}</div>
                        </td>
                        <!-- Fecha -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$product->created_at}}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $product->status == 1 ? 'red' : 'green'}}-100 text-{{ $product->status == 1 ? 'red' : 'green' }}-800">
                            {{ $product->status == 1 ? 'Borrador' : 'Publicado' }}
                        </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $product->price }} &euro;
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            <div class="px-6 py-4">
                No existen productos coincidentes
            </div>
        @endif

        @if($products->hasPages())
            <div class="px-6 py-4">
                {{ $products->links() }}
            </div>
        @endif

    </x-table-responsive>

</div>

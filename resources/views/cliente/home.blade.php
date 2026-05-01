<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Menú del Restaurante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col md:flex-row gap-6">
            
            <!-- Menú de Platillos (Columna Izquierda) -->
            <div class="w-full md:w-2/3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-4">¿Qué se te antoja pedir hoy?</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Ejemplo de Tarjeta 1 (Aquí irá el @foreach cuando Josue conecte la BD) -->
                        <div class="border border-gray-300 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                            <h4 class="text-xl font-semibold">Hamburguesa Clásica</h4>
                            <p class="text-gray-600 text-sm mt-1 h-10">Carne de res, queso, lechuga, tomate y papas fritas.</p>
                            <p class="text-lg font-bold mt-2 text-indigo-600">$120.00</p>
                            
                            <!-- Formulario de envío -->
                            <form action="/carrito/agregar" method="POST" class="mt-4 flex items-center">
                                @csrf
                                <input type="hidden" name="platillo_id" value="1">
                                <label for="cantidad_1" class="mr-2 text-sm font-medium text-gray-700">Cant:</label>
                                <input type="number" id="cantidad_1" name="cantidad" value="1" min="1" class="w-16 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-3 text-center">
                                <button type="submit" class="bg-gray-800 text-white px-3 py-1.5 rounded-md hover:bg-gray-700 transition font-semibold text-sm">
                                    Agregar
                                </button>
                            </form>
                        </div>

                        <!-- Ejemplo de Tarjeta 2 -->
                        <div class="border border-gray-300 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                            <h4 class="text-xl font-semibold">Tacos al Pastor (Orden)</h4>
                            <p class="text-gray-600 text-sm mt-1 h-10">5 deliciosos tacos con piña, cilantro, cebolla y su respectiva salsa.</p>
                            <p class="text-lg font-bold mt-2 text-indigo-600">$85.00</p>
                            
                            <form action="/carrito/agregar" method="POST" class="mt-4 flex items-center">
                                @csrf
                                <input type="hidden" name="platillo_id" value="2">
                                <label for="cantidad_2" class="mr-2 text-sm font-medium text-gray-700">Cant:</label>
                                <input type="number" id="cantidad_2" name="cantidad" value="1" min="1" class="w-16 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm mr-3 text-center">
                                <button type="submit" class="bg-gray-800 text-white px-3 py-1.5 rounded-md hover:bg-gray-700 transition font-semibold text-sm">
                                    Agregar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resumen de Orden / Carrito (Columna Derecha) -->
            <div class="w-full md:w-1/3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg sticky top-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-4 flex items-center border-b pb-2">
                            <!-- Ícono de carrito usando SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Tu Orden
                        </h3>
                        
                        <ul class="mb-4 border-b border-gray-200 pb-4 space-y-3 mt-4">
                            <!-- Ejemplo de items en el carrito (Para visualización) -->
                            <li class="flex justify-between items-center text-sm">
                                <div>
                                    <span class="font-bold text-gray-700">2x</span> Tacos al Pastor
                                </div>
                                <span class="font-semibold text-gray-900">$170.00</span>
                            </li>
                            <li class="flex justify-between items-center text-sm">
                                <div>
                                    <span class="font-bold text-gray-700">1x</span> Hamburguesa Clásica
                                </div>
                                <span class="font-semibold text-gray-900">$120.00</span>
                            </li>
                        </ul>
                        
                        <div class="flex justify-between font-bold text-xl mb-6 text-gray-900">
                            <span>Total:</span>
                            <span>$290.00</span>
                        </div>
                        
                        <!-- Formulario para mandar la orden completa a la tabla 'ordenes' -->
                        <form action="/ordenes" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-md hover:bg-green-700 transition font-bold text-center shadow-md">
                                Confirmar Orden
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
<x-guest-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Declaratie autenticitate proiect de diploma
            </h2>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-10 sm:mt-0">
                        <div class="md:grid md:grid-cols-2 md:gap-6">
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <form action="{{ route('dashboard.documents.downloadda') }}" method="POST">
                                    @csrf
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Nume</label>
                                                    <input type="text" name="last_name" id="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="first_name" class="block text-sm font-medium text-gray-700">Prenume</label>
                                                    <input type="text" name="first_name" id="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="domiciliu" class="block text-sm font-medium text-gray-700">Domiciliu in</label>
                                                    <input type="text" name="domiciliu" id="domiciliu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="judet" class="block text-sm font-medium text-gray-700">Judet</label>
                                                    <input type="text" name="judet" id="judet" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="strada" class="block text-sm font-medium text-gray-700">Strada</label>
                                                    <input type="text" name="strada" id="strada" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="nr" class="block text-sm font-medium text-gray-700">Nr</label>
                                                    <input type="text" name="nr" id="nr" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="data_nastere" class="block text-sm font-medium text-gray-700">Data nastere</label>
                                                    <input type="text" name="data_nastere" id="data_nastere" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="identificat" class="block text-sm font-medium text-gray-700">Identificat prin</label>
                                                    <input type="text" name="identificat" id="identificat" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="serie" class="block text-sm font-medium text-gray-700">Serie buletin</label>
                                                    <input type="number" name="serie" id="serie" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="numar" class="block text-sm font-medium text-gray-700">Numar</label>
                                                    <input type="number" name="numar" id="numar" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                    <label for="program" class="block text-sm font-medium text-gray-700">Programul de studii</label>
                                                    <input type="text" name="program" id="program" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                    <label for="perioada" class="block text-sm font-medium text-gray-700">Intre anii</label>
                                                    <input type="text" name="perioada" id="perioada" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                    <label for="titlu" class="block text-sm font-medium text-gray-700">Titlul lucrarii</label>
                                                    <input type="text" name="titlu" id="titlu" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                    <label for="data" class="block text-sm font-medium text-gray-700">Data</label>
                                                    <input type="text" name="data" id="data" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                    <label for="coordonator" class="block text-sm font-medium text-gray-700">Coordonator stiintific</label>
                                                    <input type="text" name="coordonator" id="coordonator" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Descarca document
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

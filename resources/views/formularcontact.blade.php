<x-guest-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Formular date de contact
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
                                <form action="{{ route('dashboard.documents.downloadformular') }}" method="POST">
                                    @csrf
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="facultate" class="block text-sm font-medium text-gray-700">Facultatea absolvita</label>
                                                    <input type="text" name="facultate" id="facultate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="cnp" class="block text-sm font-medium text-gray-700">CNP</label>
                                                    <input type="number" name="cnp" id="cnp" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Nume</label>
                                                    <input type="text" name="last_name" id="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="first_name" class="block text-sm font-medium text-gray-700">Prenume</label>
                                                    <input type="text" name="first_name" id="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                    <label for="data_nastere" class="block text-sm font-medium text-gray-700">Data nasterii</label>
                                                    <input type="text" name="data_nastere" id="data_nastere" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                    <label for="program" class="block text-sm font-medium text-gray-700">Programul de studii</label>
                                                    <input type="text" name="program" id="program" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                    <label for="an_absolvire" class="block text-sm font-medium text-gray-700">Anul absolvirii</label>
                                                    <input type="text" name="an_absolvire" id="an_absolvire" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-6 lg:col-span-3">
                                                    <label for="sesiune" class="block text-sm font-medium text-gray-700">Sesiunea/Anul sustinerii</label>
                                                    <input type="text" name="sesiune" id="sesiune" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="telefon" class="block text-sm font-medium text-gray-700">Telefon absolvent</label>
                                                    <input type="number" name="telefon" id="telefon" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div>
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail absolvent</label>
                                                    <input type="text" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
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

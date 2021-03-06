<x-guest-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Inscriere
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
                                @if(is_null(Auth::user()->student->request))
                                <form method="POST" enctype="multipart/form-data" action = "{{ route('dashboard.storerequest') }}">
                                    @csrf
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-6">
                                                    <label for="title" class="block text-sm font-medium text-gray-700">Titlu</label>
                                                    <input type="text" name="title" id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                                                </div><br>
                                                <div>
                                                    <label for="file">Cerere inscriere</label>
                                                    <input type="file" id="file" name="uploadedFile" accept="application/pdf" required>
                                                </div><br>
                                                <div>
                                                    <label for="projectfile">Lucrare licenta</label>
                                                    <input type="file" id="projectfile" name="projectFile" accept="application/pdf" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Salveaza
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <span class="text-xl">Titlu licenta: {{ Auth::user()->student->request->title }}</span><br>
                                    <span class="text-xl">Status cerere: </span>
                                    @if (Auth::user()->student->request->status == 1)
                                        <span class="text-sm font-medium bg-red-100 py-1 px-2 rounded text-red-500 align-middle">In asteptare (verificare autenticitate)</span>
                                    @elseif (Auth::user()->student->request->status == 2)
                                        <span class="text-sm font-medium bg-red-100 py-1 px-2 rounded text-red-500 align-middle">In asteptare (verificare documente)</span>
                                    @elseif (Auth::user()->student->request->status == 3)
                                        <span class="text-sm font-medium bg-green-100 py-1 px-2 rounded text-green-500 align-middle">Acceptata</span>
                                    @endif
                                <div class="mt-10">
                                    <a href=" {{ route('dashboard.showupload') }}"><button type="button" class="mb-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg flex items-center">
                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                        Vezi documente
                                        </button></a>

                                    <a href=" {{ route('dashboard.showproject') }}"><button type="button" class="mb-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg flex items-center">
                                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                            </svg>
                                            Vezi proiect
                                        </button></a>

                                    <form action="{{ route('dashboard.deleterequest') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="mb-2 focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-red-500 hover:bg-red-600 hover:shadow-lg flex items-center">
                                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                                        </svg>
                                        Anuleaza cererea
                                    </button>
                                    </form>
                                </div>
                                        <a href="{{ route('dashboard') }}"><button class="text-blue-500 bg-transparent border border-solid border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-500 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
                                        >
                                            Inapoi
                                        </button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

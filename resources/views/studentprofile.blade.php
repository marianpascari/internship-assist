<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $student->first_name }} {{ $student->last_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <span class="text-lg">Facultate: {{ $student->faculty }}</span><br>
                    <span class="text-lg">Specializare: {{ $student->specialization }}</span><br>
                    <span class="text-lg">Adresa email: {{ $student->user->email }}</span><br>
                    <button class="bg-blue-500 px-4 py-2 text-sm font-semibold tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-blue-600 mt-5">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z"/></svg>
                </span>
                        <span>
                    Trimite mail
                </span>
                    </button>
                </div>
            </div>
            <a href="{{ route('dashboard.mystudents') }}"><button class="text-blue-500 bg-transparent border border-solid border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-500 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
            >
                Inapoi
            </button></a>
        </div>
    </div>
</x-app-layout>

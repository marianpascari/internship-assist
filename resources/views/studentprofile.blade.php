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
                    @if (!is_null($student->request))
                    <div class="text-sm text-gray-900 mt-1">
                        <form action="{{ route('dashboard.studentprofile.project') }}" method="GET">
                            @csrf
                            <input type="hidden" name="projectFilename" value="{{ $student->request->project_filename }}"/>
                            <button type="submit" class="focus:outline-none text-purple-600 text-sm py-2.5 px-5 rounded-md border border-purple-600 hover:bg-purple-50 flex items-center">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Vezi proiect
                            </button>
                        </form>
                    </div>
                    @endif
                    <form action="{{ route('dashboard.studentprofile.mailpage') }}">
                        @csrf
                        <input type="hidden" name="studentId" value="<?=$student->id?>"/>
                        <button type="submit" class="bg-blue-500 px-4 py-2 text-sm font-semibold tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-blue-600 mt-5">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z"/></svg>
                    </span>
                            <span>
                    Trimite mail
                </span>
                    </button>
                    </form>
                </div>
            </div>
            <a href="{{ route('dashboard.mystudents') }}"><button class="text-blue-500 bg-transparent border border-solid border-blue-500 hover:bg-blue-500 hover:text-white active:bg-blue-500 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
            >
                Inapoi
            </button></a>
        </div>
    </div>
</x-app-layout>

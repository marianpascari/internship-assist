<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Trimite mail
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="w-full max-w-lg" action="{{ route('dashboard.studentprofile.mailpage.sendmail') }}" method="POST">
                        @csrf
                        <input type="hidden" name="studentId" value="<?=$student->id?>"/>
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="subject">
                                    Subiect
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="subject" type="text" name="subject">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="body">
                                    Mesaj
                                </label>
                                <textarea class="no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="body" name="body"></textarea>
                            </div>
                        </div>
                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3">
                                <button type="submit" class="bg-blue-500 px-4 py-2 text-sm font-semibold tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-blue-600 mt-5">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z"/></svg>
                                </span>
                                    <span>
                                    Trimite
                                    </span>
                                </button>
                            </div>
                            <div class="md:w-2/3"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

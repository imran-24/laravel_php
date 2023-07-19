<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Entry To Reference Table') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    
                    <form 
                        method="POST" 
                        action="{{ route('references.store')}}" 
                        enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-12 ">
                        <div class=" border-gray-900/10 pb-12 ">
                            
                            <div class="disflex flex-col gap-10">
                                
                                <div>
                                    <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900">Full name</label>
                                    <div class="mt-2">
                                    <input type="text" name="fullname" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">             
                                    </div>
                                </div>
                                

                                <div>
                                    <label for="ref" class="block text-sm font-medium leading-6 text-gray-900">Reference </label>
                                    <div class="mt-2">
                                        <select name="refId"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                            <option
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                            value=0 >Select an option</option>
                                            @foreach ($users as $user)
                                                <option
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                    
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">Save</button>
                        </div>
                    </form>
  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!--- Test --->
                <div class="mt-10 sm:mt-0">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="#" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="mt-4">
                                    <x-jet-label for="gender" value="{{ __('Gender') }}" />
                                    <select id="gender" name="gender" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="M">Male</option>
                                        <option value="S">Female</option>
                                        <option value="U">Unspecified</option>
                                    </select>
                                
                                </div>
                            <fieldset>
                                <div>
                                <legend class="text-base font-medium text-gray-900">Push Notifications</legend>
                                <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p>
                                </div>
                                <div class="mt-4 space-y-4">
                                <div class="flex items-center">
                                    <input id="push_everything" name="push_notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                                    Everything
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="push_email" name="push_notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                                    Same as email
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="push_nothing" name="push_notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="push_nothing" class="ml-3 block text-sm font-medium text-gray-700">
                                    No push notifications
                                    </label>
                                </div>
                                </div>
                            </fieldset>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
                <!--- Test --->


            </div>
        </div>
    </div>

</x-app-layout>
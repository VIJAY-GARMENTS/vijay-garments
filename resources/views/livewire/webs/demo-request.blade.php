<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <x-assets.logo.cxlogo :icon="'light'" class="h-20 ml-4 mx-auto w-auto  block"/>
        </div>
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form action="{{ route('demo-requests') }}">

                <x-input.model-text wire:model="company_name" :label="'Company Name'"/>
                <x-input.model-text wire:model="contact_person" :label="'Contact Person'"/>
                <x-input.model-text wire:model="email" :label="'Email'"/>
                <x-input.model-text wire:model="ph_no" :label="'Mobile No'"/>
                <div class="flex items-center justify-end mt-4">
                    <button wire:click="getSave" class="inline-block text-white transition-all rounded-md shadow-md
                bg-gradient-to-r from-blue-600 to-blue-500 hover:bg-gradient-to-b dark:shadow-blue-900
                shadow-blue-200 hover:shadow-2xl hover:shadow-blue-400 hover:-tranneutral-y-px p-2">Book Demo</button>
                </div>
                <div>

                    @if (session()->has('message'))

                        <div class="alert alert-success text-green-500">

                            {{ session('message') }}

                        </div>

                    @endif

                </div>
            </form>
        </div>
    </div>
</x-guest-layout>


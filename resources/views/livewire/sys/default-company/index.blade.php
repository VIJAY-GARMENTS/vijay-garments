<div>
    <button type="button" wire:click="create" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100
    focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white
    dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Select Company</button>

    <x-jet.modal wire:model.defer="showEditModal" >
        <div class=" px-6 pt-4 text-xl font-semibold text-blue-600/100 dark:text-blue-500/100 ">
            Choose Company
        </div>
        <x-forms.section-border class="py-2"/>
    <div class=" mt-4 mb-5 px-6  pt-4">
    <div class="flex justify-between w-full mb-3">
        <div>
            @if(isset($company_1))
                {{$company_1}}
            @endif
        </div>

        <button wire:click.prevent="switchCompany">
            Select Company
        </button>
    </div>
    @if($showCompanies === true)
        <table class="w-full">
            @forelse ($companies as $index =>  $row)
                <x-table.row>
                    <x-table.cell>
                        <p class="flex px-3 text-gray-600 truncate text-xl text-left">
                            {{ $row->vname}}
                        </p>
                    </x-table.cell>

                    <x-table.cell>
                        <button wire:click.prevent="setDefault({{$row->id}})"
                                class="flex px-2 text-gray-600 text-xl justify-end w-full">
                            Set as Default
                        </button>
                    </x-table.cell>

                </x-table.row>
            @empty
                <x-table.empty/>
            @endforelse
        </table>
    @endif
    </div>
    </x-jet.modal>
</div>

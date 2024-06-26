<div>
    <x-slot name="header">Bank Details</x-slot>
    <div class="w-full border-t-2 border-purple-400 rounded-md shadow-lg bg-opacity-5">
        <div class="p-6 pt-12 pb-6 bg-white rounded-md">


            <div class="flex flex-row gap-2">
                <div class="w-28 text-xl text-gray-500 py-2">Client Id:</div>
                <div
                    class="w-12 text-2xl bg-amber-200 rounded-full px-2 py-1 flex items-center justify-center">{{$bank->client_id}}</div>
                <div class="w-full text-center text-3xl font-semibold tracking-widest">{{$bank->vname}}</div>
                <div>
                    <x-input.model-select :label="''">
                        @foreach($banks as $i)
                            <option wire:click.prevent="switch({{$i->id}})" value="{{$i->id}}">{{$i->vname}}</option>
                        @endforeach
                    </x-input.model-select>
                </div>
            </div>

            <!-- Table -->
            <div class="flex-col space-y-4 mt-10">
                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-cool-gray-200">
                        <tbody class="border-none">
                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Company Name
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$bank->client->vname}}
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        CUS ID
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$bank->customer_id}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Account No
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$bank->acno}}
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        USER ID
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$bank->customer_id2}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        IFSC CODE
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$bank->ifsc}}
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        PKS
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$bank->pks}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        BANK
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$bank->bank}}
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        TRS
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$bank->trs}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        BRANCH
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3 justify-between gap-3">
                                    <p class="text-gray-600 text-xl text-left tracking-wider">
                                        {{$bank->branch}}
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        PROFILE
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left tracking-wider">
                                        {{$bank->profileps}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        &nbsp;
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        &nbsp;
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Mobile
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell>
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$bank->mobile}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>


                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Email
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell colspan="3">
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$bank->email}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        DVCATM
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell colspan="3">
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$bank->dvcatm}}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        <x-table.row>
                            <x-table.cell class="w-36">
                                <div class="flex px-3">
                                    <p class="text-gray-400 truncate text-xl text-left">
                                        Entry By
                                    </p>
                                </div>
                            </x-table.cell>
                            <x-table.cell colspan="3">
                                <div class="flex px-3">
                                    <p class="text-gray-600 truncate text-xl text-left">
                                        {{$bank->user->name}}
                                        - {{$bank->updated_at ?  date('d-m-Y h:i A',strtotime($bank->updated_at )) : '' }}
                                    </p>
                                </div>
                            </x-table.cell>
                        </x-table.row>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-5">
                <a href="{{route('banks')}}" class="mt-5 bg-gray-400 text-white tracking-wider px-4 py-1
                rounded-md flex items-center w-24 hover:bg-gray-500" >
                    <x-icons.icon :icon="'chevrons-left'" class="h-8 w-auto inline-block items-center"/>
                    Back
                </a>
            </div>

        </div>
    </div>
</div>

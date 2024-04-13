<div>
    <x-controls.lookup.model :show-model="$showModel" >
        <x-input.lookup-text wire:model.live="vname"  x-ref="vname" :label="'Despatch NO'" :name="'vname'"/>
        <x-input.lookup-date wire:model.live="date"  x-ref="date" :label="'Despatch Date'" :name="'date'"/>
    </x-controls.lookup.model>
</div>

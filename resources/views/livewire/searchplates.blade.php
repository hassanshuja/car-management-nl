<div>
    <form wire:submit.prevent="getplates">
        <input wire:model="search" type="text" placeholder="Search users..."/>
        <button>Save</button>
    </form>

    @foreach($result as $res)
        @php print_r($res); @endphp
    @endforeach
</div>
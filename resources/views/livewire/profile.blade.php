<div>
    <br>
    <br>
    Hello form liveiwre
    <p>This component is for life cycle hook</p>
    {{$hook_message}}
    {{$count}}
    
    <button wire:click="update_now('New message from hydrate')">Check hydrate</button>
    <input type="text" wire:model="hook_message">

    @livewire('child-profile')
    
</div>

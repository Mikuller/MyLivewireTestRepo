<div>
    <h1>{{ $title }}</h1>
    <h1>{{ count($users) }}</h1>
    @if (session('success'))
        <span>{{session('success')}}</span>
    @endif
    <form class="p-5" wire:submit="createNewUser">
        <input class="block rounded border border-gray px-3 py-1 mb-1" wire:model="name" type="text"
            placeholder="Name">
        @error('name')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <input class="block rounded border border-gray px-3 py-1 mb-1" wire:model="email" type="email" 
            placeholder="Email">
        @error('email')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <input class="block rounded border border-gray px-3 py-1 mb-1" wire:model="password" type="password"
             placeholder="Password">
        @error('password')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <button class="block rounded border-gray bg-black px-3 py-1 mb-1 text-white">
            Add User
        </button>
    </form>
    @foreach ($users as $user)
        <h3>{{ $user->name }}</h3>
    @endforeach
{{$users->links()}}
</div>

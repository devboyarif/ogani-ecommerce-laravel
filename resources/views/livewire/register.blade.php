<div>
    <form wire:submit="user_register" class="position-relative">
        <input wire:model="name" class="mb-3" type="text" placeholder="Enter Full Name" />
        @error('name')<span class="text-danger" style="position: absolute;top: 38px;font-weight:bold;">{{ $message }}<span></span> </span> @enderror
        <input wire:model="email" class="mb-3" type="email" placeholder="Enter Email" />
        @error('email')<span class="text-danger" style="position: absolute;top: 100px;font-weight:bold;">{{ $message }}<span></span> </span> @enderror
        @error('password')<span class="text-danger" style="position: absolute;top: 160px;font-weight:bold;">{{ $message }}<span></span> </span> @enderror
        <input wire:model="password" type="password" placeholder="Enter Password" />
        <div class="button-box">
            @if ($errors->any())
            <button class="disabled_button"><span>Register</span></button>
            @else
            <button type="submit">Register</button>
            @endif
        </div>
    </form>
</div>


<div>
    <form wire:submit.prevent="user_login" class="position-relative">
        <input wire:model="email" type="text" placeholder="Enter Email"/>
        @error('email')<span class="text-danger" style="position: absolute;top: 38px;font-weight:bold;">{{ $message }}<span></span> </span> @enderror
        @error('password')<span class="text-danger" style="position: absolute;top: 118px;font-weight:bold;">{{ $message }}<span></span> </span> @enderror
        <input wire:model="password" type="password" placeholder="Enter Password"/>

        <div class="button-box">
            <div class="login-toggle-btn">
                <input type="checkbox" />
                <a class="flote-none" href="javascript:void(0)">Remember me</a>
                <a href="#">Forgot Password?</a>
            </div>
            @if ($errors->any())
            <button class="disabled_button"><span>Login</span></button>
            @else
            <button type="submit"><span>Login</span></button>
            @endif
        </div>
    </form>
</div>

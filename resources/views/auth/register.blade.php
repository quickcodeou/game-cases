<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <p id="status" class="text-red-500 mt-2"></p>
            @error('code')
                <div id="errorStep" data-step="{{ session('step') }}" class="text-red-500 mt-2">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div id="codeInput" class="hidden">
            <x-input-label for="code" :value="__('Code')" />
            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            
            <x-primary-button type="button" id="getVerifyCode" class="ms-4">
                {{ __('Get key') }}
            </x-primary-button> 

            <x-primary-button type="submit" id="sendVerifyCode" class="ms-4 hidden">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("getVerifyCode").addEventListener("click", sendCode);
                const codeError = document.getElementById('errorStep');
                if (codeError) {
                    const step = codeError.getAttribute('data-step');
                    if(step == 2){
                        console.log('Step: ok', step);
                        document.getElementById('getVerifyCode').classList.add('hidden');
                        document.getElementById('sendVerifyCode').classList.remove('hidden');
                        document.getElementById('codeInput').classList.remove('hidden');
                    }else{
                        console.log('Step: no', step);
                    }
                }
            });
            async function sendCode() {
                const name      = document.getElementById("name").value;
                const phone     = document.getElementById("phone").value;
                const code      = document.getElementById("code").value;
                const password      = document.getElementById("password").value;
                const password_confirmation      = document.getElementById("password_confirmation").value;
                const statusElement = document.getElementById("status");
                            
                axios.post('/api/send-code', {
                    name: name,
                    password: password,
                    password_confirmation: password_confirmation,
                    phone: phone
                })
                .then(response => {
                    if(response.data.status == 'success'){
                        console.log("Код отправлен!", response.data);
                        document.getElementById('getVerifyCode').classList.add('hidden');
                        document.getElementById('sendVerifyCode').classList.remove('hidden');
                        document.getElementById('codeInput').classList.remove('hidden');
                    }
                    console.log(response.data.message);
                    statusElement.textContent = response.data.message;
                })
                .catch(error => {
                    console.error("Ошибка:", error.response?.data?.message || error.message);
                });
            }
        </script>
    @endpush
</x-guest-layout>

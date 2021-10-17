<div class="flex flex-col items-center">
    <div class="w-6/12">
        <form method="POST" wire:submit.prevent="submit">
            @csrf
            <div class="m-5">
                <label for="first-name" class="block">First Name</label>
                <input id="first-name" wire:model="firstName" class="block w-full rounded" type="text" value="{{old('firstName')}}" required/>
                @error('firstName')
                <div class="text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-5">
                <label for="last-name" class="block">Last Name</label>
                <input id="last-name" wire:model="lastName" class="block w-full rounded" type="text" value="{{old('lastName')}}" required/>
                @error('lastName')
                <div class="text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="m-5">
                <label for="sex" class="block">Sex</label>
                <div>
                    <label for="sex">Male</label>
                    <input id="sex" wire:model="sex" type="radio" value="Male"/>
                    <label for="sex">Female</label>
                    <input id="sex" wire:model="sex" type="radio" value="Female"/>
                </div>
                @error('sex')
                <div class="text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="m-5">
                <label for="birth-date" class="block">Date of Birth</label>
                <input id="birth-date" wire:model="birthDate" class="block w-full rounded" type="date" value="{{old('birthDate')}}"/>
                @error('birthDate')
                <div class="text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="m-5">
                <label for="address" class="block">Address</label>
                <input id="address" wire:model="address" class="block w-full rounded" type="text" value="{{old('address')}}"/>
                @error('address')
                <div class="text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-5 flex justify-end">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-2" type="submit">Save</button>
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-900 font-bold py-2 px-4 rounded" wire:click="cancelForm" type="button">Cancel</button>
            </div>
            <div wire:loading wire:target="submit">
                Creating ... <br> You will be redirected to the Login Page when all is done.
            </div>
        </form>
    </div>
</div>

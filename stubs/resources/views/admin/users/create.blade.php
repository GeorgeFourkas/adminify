@php use Spatie\Permission\Models\Role; @endphp
<x-layouts.admin>
    <div
        class="container mx-auto flex w-11/12 items-center justify-center rounded-lg bg-white px-5 py-14 shadow-soft-2xl lg:w-2/3">
        <form action="{{ route('user.store') }}" enctype="multipart/form-data" method="POST" autocomplete="off"
              class="flex w-full items-center justify-center">
            <div class="w-full">
                @csrf
                <div class="flex w-full flex-col items-center justify-center lg:flex-row">
                    <div class="w-full lg:w-1/2">
                        <div class="mt-5 flex flex-col items-center justify-center">
                            <x-filepond class="h-48 w-48" :circular="true" name="profile_picture_url"
                                        :previews="old('profile_picture_url')"
                            />
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="w-full lg:w-2/3">
                            <x-admin.select
                                name="role"
                                id="user_roles_select"
                                :label="__('adminify.users.role')"
                                :select-texts="Role::all()->pluck('name')"
                            />
                        </div>
                    </div>
                </div>
                <div class="mt-14 w-full">
                    <div class="flex flex-col items-center justify-between lg:space-x-4 lg:flex-row">
                        <div class="flex w-full flex-col items-start justify-center lg:w-1/2">
                            <x-input-label class="capitalize" for="name" :value="__('adminify.users.name')"/>
                            <x-text-input id="name" class="mt-1 block w-10/12" type="text" name="name" required
                                          autofocus :value="old('name')"
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                        </div>
                        <div class="flex w-full flex-col items-start justify-center lg:w-1/2">
                            <x-input-label class="capitalize" for="email" :value="__('adminify.users.email')"/>
                            <x-text-input id="email" class="mt-1 block w-10/12" type="email"
                                          name="email" :value="old('email')" required
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>
                    </div>
                </div>
                <div class="mt-10 flex flex-col items-center justify-between lg:space-x-4 lg:flex-row">
                    <div class="flex w-full flex-col items-start justify-center lg:w-1/2">
                        <x-input-label class="capitalize" for="password" :value="__('adminify.users.password')"/>
                        <x-text-input id="password" class="mt-1 block w-10/12" type="password" name="password"
                                      required/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                    <div class="flex w-full flex-col items-start justify-center lg:w-1/2">
                        <x-input-label class="capitalize" for="confirm_password"
                                       :value="__('adminify.users.password_confirmation')"/>
                        <x-text-input id="confirm_password" class="mt-1 block w-10/12" type="password" required
                                      name="confirm_password"/>
                        <x-input-error :messages="$errors->get('confirm_password')" class="mt-2"/>
                    </div>
                </div>
                <div class="mt-10 flex w-full items-center justify-center">
                    <input type="submit" class="cursor-pointer rounded-lg p-2 capitalize text-white gradient-app-theme"
                           value="{{ __('adminify.submit') }}">
                </div>
            </div>
        </form>
    </div>
</x-layouts.admin>

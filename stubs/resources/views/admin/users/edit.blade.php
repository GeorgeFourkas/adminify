@php use Spatie\Permission\Models\Role; @endphp
<x-layouts.admin>
    <div
        class="container mx-auto flex w-11/12 items-center justify-center rounded-lg bg-white px-5 py-14 shadow-soft-2xl lg:w-2/3">
        <form action="{{ route('user.update', $user) }}" enctype="multipart/form-data" method="POST" autocomplete="off"
              class="flex w-full items-center justify-center">
            <div class="w-full">
                @csrf
                <div class="flex w-full flex-col items-center justify-center lg:flex-row">
                    <div class="w-full lg:w-1/2">
                        <x-input-error :messages="$errors->get('profile_picture_url')" class="mt-2"/>
                        <div class="mt-5 flex flex-col items-center justify-center">
                            <x-filepond class="h-48 w-48" :circular="true" name="profile_picture_url"
                                        :previews="$user->media"/>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="w-full lg:w-2/3">
                            <x-admin.select
                                id="user_roles_select" name="role" :label=" __('adminify.users.role') "
                                :value="$user->roles->first()->name ?? ''" :select-texts="Role::all()->pluck('name')"
                            />
                        </div>
                    </div>
                </div>
                <div class="mt-14 w-full">
                    <div class="flex flex-col items-center justify-between lg:space-x-5 lg:flex-row">
                        <div class="flex w-full flex-col items-start justify-center lg:w-1/2">
                            <x-input-label for="name" class="capitalize" :value="__('adminify.users.name')"/>
                            <x-text-input id="name" class="mt-1 block w-10/12" type="text"
                                          name="name" :value="$user->name" autofocus autocomplete="off"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div class="flex w-full flex-col items-start justify-center lg:w-1/2">
                            <x-input-label class="capitalize" for="email" :value="__('adminify.users.email')"/>
                            <x-text-input id="email" class="mt-1 block w-10/12" type="email"
                                          name="email" :value="$user->email" autofocus/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>
                    </div>
                </div>
                <div class="mt-10 flex w-full items-center justify-center">
                    <input type="submit"
                           class="cursor-pointer rounded-lg p-2 text-sm capitalize text-white gradient-app-theme"
                           value="{{ __('adminify.update') }}">
                </div>
            </div>
        </form>
    </div>
    <div
        class="container mx-auto mt-3 w-11/12 items-center justify-center rounded-lg bg-white px-5 py-14 shadow-soft-2xl lg:w-2/3">
        <h1 class="text-center text-lg">{{ __('adminify.users.update_password') }}</h1>
        <div class="mt-4 flex w-full items-center justify-center">
            <form action="{{ route('user.password.update', $user) }}" method="POST" class="w-full">
                @csrf
                @method('PUT')
                <div class="flex flex-col items-center justify-between lg:space-x-5 lg:flex-row">
                    <div class="flex w-full flex-col items-start justify-center lg:w-1/2">
                        <x-input-label class="capitalize" for="password" :value="__('adminify.users.new_password')"/>
                        <x-text-input id="password" class="mt-1 block w-full"
                                      type="password" name="password" autocomplete="off"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                    <div class="flex w-full flex-col items-start justify-center lg:w-1/2">
                        <x-input-label class="capitalize" for="password_confirmation"
                                       :value="__('adminify.users.password_confirmation')"/>
                        <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                                      name="password_confirmation" autocomplete="off"/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>
                </div>
                <div class="mt-10 flex w-full items-center justify-center">
                    <input type="submit"
                           class="cursor-pointer rounded-lg p-2 text-sm capitalize text-white gradient-app-theme"
                           value="{{ __('adminify.users.update_password') }}">
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>

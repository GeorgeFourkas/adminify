@php use Spatie\Permission\Models\Role; @endphp
<x-layouts.admin>
    @vite(['resources/js/admin/dropzone.js'])
    <div
        class="container mx-auto flex w-11/12 lg:w-2/3 items-center justify-center rounded-lg bg-white px-5 py-14 shadow-soft-2xl">
        <form action="{{route('user.update', $user)}}" enctype="multipart/form-data" method="POST" autocomplete="off"
              class="flex w-full items-center justify-center">
            <div class="w-full">
                @csrf
                <div class="flex flex-col lg:flex-row w-full items-center justify-center">
                    <div class="w-full lg:w-1/2">
                        <x-input-error :messages="$errors->get('profile_picture_url')" class="mt-2"/>
                        <x-admin.dropzone
                            id="profile_picture_url"
                            name="profile_picture_url"
                            acceptedFileTypes="image/*"
                            class="h-48 w-48 rounded-full text-xs {{$errors->has('profile_picture_url') ? 'border-red-500 text-red-400' :'' }}"
                            :previewUrl="$user->media->first()?->url ?? ''"
                            :actionText="__('Click To Upload')"
                            :title="__('User Profile Photo')"
                            :description="__('Or Drag')"
                        />
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="w-full lg:w-2/3">
                            <x-admin.select
                                id="user_roles_select"
                                name="role"
                                :label=" __('Role') "
                                :value="$user->roles->first()->name ?? ''"
                                :select-texts="Role::all()->pluck('name')"
                            />
                        </div>
                    </div>
                </div>
                <div class="mt-14 w-full">
                    <div class="flex flex-col lg:flex-row items-center justify-between">
                        <div class="flex lg:w-1/2 w-full flex-col items-start justify-center">
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input id="name" class="mt-1 block w-10/12" type="text"
                                          name="name" :value="$user->name" autofocus autocomplete="off"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div class="flex lg:w-1/2 w-full flex-col items-start justify-center">
                            <x-input-label for="email" :value="__('Email')"/>
                            <x-text-input id="email" class="mt-1 block w-10/12" type="email"
                                          name="email" :value="$user->email" autofocus/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>
                    </div>
                </div>
                <div class="mt-10 flex w-full items-center justify-center">
                    <input type="submit" class="cursor-pointer rounded-lg p-2 text-sm text-white gradient-app-theme"
                           value="{{__('Update')}}">
                </div>
            </div>
        </form>
    </div>
    <div
        class="container mx-auto w-11/12 lg:w-2/3 items-center justify-center rounded-lg bg-white px-5 py-14 shadow-soft-2xl mt-3">
        <h1 class="text-center text-lg">{{ __('Update Password') }}</h1>
        <div class="flex w-full items-center justify-center">
            <form action="{{ route('user.password.update', $user) }}" method="POST" class="w-full">
                @csrf
                @method('PUT')
                <div class="flex flex-col lg:flex-row items-center justify-between lg:space-x-5">
                    <div class="flex lg:w-1/2 w-full flex-col items-start justify-center">
                        <x-input-label for="password" :value="__('New Password')"/>
                        <x-text-input id="password" class="mt-1 block w-full"
                                      type="password" name="password" autocomplete="off"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                    <div class="flex lg:w-1/2 w-full flex-col items-start justify-center">
                        <x-input-label for="password_confirmation" :value="__('Re-Type Password')"/>
                        <x-text-input id="password_confirmation" class="mt-1 block w-full" type="password"
                                      name="password_confirmation" autocomplete="off"/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>
                </div>
                <div class="mt-10 flex w-full items-center justify-center">
                    <input type="submit" class="cursor-pointer rounded-lg p-2 text-sm text-white gradient-app-theme"
                           value="{{  __('Update Password') }}">
                </div>
                <x-admin.already-uploaded-media-chooser></x-admin.already-uploaded-media-chooser>

            </form>
        </div>
    </div>

</x-layouts.admin>

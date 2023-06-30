@php use Spatie\Permission\Models\Role; @endphp
<x-layouts.admin>
{{--    @php--}}
{{--        $locales = array_keys(config('translatable.locales'))--}}
{{--    @endphp--}}
    <div
        class="container mx-auto flex w-11/12 lg:w-2/3 items-center justify-center rounded-lg bg-white px-5 py-14 shadow-soft-2xl">
        <form action="{{route('user.store')}}" enctype="multipart/form-data" method="POST" autocomplete="off"
              class="flex w-full items-center justify-center w-full">
            <div class="w-full">
                @csrf
                <div class="flex flex-col lg:flex-row w-full items-center justify-center">
                    <div class="w-full lg:w-1/2">
                        <x-admin.dropzone
                            id="profile_picture_url"
                            name="profile_picture_url"
                            acceptedFileTypes="image/*"
                            class="h-36 w-36  lg:h-48 lg:w-48 rounded-full text-xs"
                            :actionText="__('Click To Upload')"
                            :title="__('User Profile Photo')"
                            :description="__('Or Drag')"
                        />
                    </div>
                    <div class="w-full lg:w-1/2">
                        <div class="w-full lg:w-2/3">
                            <x-admin.select
                                name="role"
                                id="user_roles_select"
                                :label="__('Roles')"
                                :select-texts="Role::all()->pluck('name')"
                            />
                        </div>
                    </div>
                </div>
                <div class="mt-14 w-full">
                    <div class="flex flex-col lg:flex-row items-center justify-between">
                        <div class="flex lg:w-1/2 w-full flex-col items-start justify-center">
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input
                                id="name"
                                class="mt-1 block w-10/12"
                                type="text"
                                name="name"
                                required
                                autofocus
                                :value="old('name')"
                            />
                            <x-input-error
                                class="mt-2"
                                :messages="$errors->get('name')"
                            />
                        </div>
                        <div class="flex lg:w-1/2 w-full flex-col items-start justify-center">
                            <x-input-label for="email" :value="__('Email')"/>
                            <x-text-input id="email" class="mt-1 block w-10/12" type="email"
                                          name="email" :value="old('email')" required autofocus/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>
                    </div>
                </div>
                <div class="mt-10 flex flex-col lg:flex-row items-center justify-between">
                    <div class="flex lg:w-1/2 w-full flex-col items-start justify-center">
                        <x-input-label for="password" :value="__('Password')"/>
                        <x-text-input id="password" class="mt-1 block w-10/12" type="password"
                                      name="password"
                                      :value="old('password')" required autofocus/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                    <div class="flex lg:w-1/2 w-full flex-col items-start justify-center">
                        <x-input-label for="confirm_password" :value="__('Confirm Password')"/>
                        <x-text-input id="confirm_password" class="mt-1 block w-10/12"
                                      type="password"
                                      name="confirm_password"
                                      :value="old('password')" required autofocus/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                </div>
                <div class="mt-10 flex w-full items-center justify-center">
                    <input type="submit" class="cursor-pointer rounded-lg p-2 text-white gradient-app-theme"
                           value="{{__('Submit')}}">
                </div>
            </div>
            <x-admin.already-uploaded-media-chooser></x-admin.already-uploaded-media-chooser>
        </form>
    </div>
</x-layouts.admin>

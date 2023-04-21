<x-layouts.admin>
    <x-slot:head>
        @vite([
            'resources/js/admin/toggle-permission-submit.js',
            'resources/js/admin/publish_language_modal.js',
            'resources/js/admin/feature-settings-form.js',
            'resources/js/admin/add-new-language.js',
            'resources/js/admin/confirm-modal.js',
            'resources/js/admin/confirm-modal.js',
            'resources/js/flash-timeout.js',
        ])
    </x-slot:head>

    <x-slot:title>
        {{ __('Nalcom Admin - Settings') }}
    </x-slot:title>

    <div class="mt-2 flex w-full items-start justify-between px-10">
        <div class="min-h-screen w-full rounded-2xl bg-white px-5 py-5 shadow-soft-2xl lg:mx-5 lg:w-11/12">
            @if(Session::has('success'))
                <div class="">
                    <div
                        class="flex h-10 w-full items-center justify-center rounded-lg bg-lime-500 text-white"
                        id="flash-container">
                        <p>{{Session::get('success')}}</p>
                    </div>
                </div>
            @endif
            @if(Session::has('error'))
                <div class="">
                    <div
                        class="flex h-10 w-full items-center justify-center rounded-lg bg-red-500 text-white"
                        id="flash-container">
                        <p>{{Session::get('error')}}</p>
                    </div>
                </div>
            @endif

            @foreach($errors->all() as $errors)
                <div class="">
                    <div
                        class="flex h-10 w-full items-center justify-center rounded-lg bg-red-500 text-white"
                        id="flash-container">
                        <p>{{ $errors }}</p>
                    </div>
                </div>
            @endforeach

            <div class="mt-3 border-b border-b-gray-200 pb-3">
                <h1 class="text-3xl font-bold tracking-wide text-black">{{ __('Website Settings') }}</h1>
                <p class="mt-3 text-sm">
                    {{__("Here you can manage your website's settings regarding the overall behaviour")}}
                </p>
            </div>
            <div class="flex flex-col items-start justify-between border-b py-4 border-b-100 lg:flex-row">
                <div class="w-full py-2 text-start lg:w-1/3 lg:px-5">
                    <div class="flex flex-col items-start justify-between">
                        <h3 class="text-black text-md">
                            {{__('Website Features')}}
                        </h3>
                        <p class="text-xs">
                            {{__('Enable or disable certain website features such as Comments, and user registration')}}
                        </p>
                    </div>
                </div>
                <form action="{{route('settings.features')}}" method="POST" settings-form class="mt-5">
                    @csrf
                    <div class="flex flex-col items-center">
                        <div
                            class="flex w-full flex-col-reverse items-start justify-start px-5 py-2 lg:w-2/3 lg:flex-row lg:items-center">
                            <div class="py-5 lg:mx-5">
                                <x-admin.radio-toggler label="" name="registration_enabled"
                                                       value="{{$settings['registration_enabled'] ?? ''}}"/>
                            </div>
                            <div class="">
                                <h3 class="capitalize text-black text-md">{{__('User Registration')}}</h3>
                                <p class="text-xs">
                                    {{__('Allow website visitors to register to this website?')}}
                                </p>
                            </div>
                        </div>
                        <div
                            class="flex w-full flex-col-reverse items-start justify-center px-5 py-2 lg:w-2/3 lg:flex-row">
                            <div class="py-5 lg:mx-5">
                                <x-admin.radio-toggler label="" value="{{$settings['comments_enabled']}}"
                                                       name="comments_enabled"/>
                            </div>
                            <div class="">
                                <h3 class="capitalize text-black text-md">
                                    {{__('Enable Comments on Posts')}}
                                </h3>
                                <p class="text-xs">
                                    {{__('Allow website visitors to leave comment on your posts')}}
                                </p>
                            </div>
                        </div>
                        <div
                            class="flex w-full flex-col-reverse items-start justify-center px-5 py-2 lg:w-2/3 lg:flex-row">
                            <div class="py-5 lg:mx-5">
                                <x-admin.radio-toggler label="" value="{{$settings['unregistered_users_can_comment']}}"
                                                       name="unregistered_users_can_comment"/>
                            </div>
                            <div class="">
                                <h3 class="capitalize text-black text-md">
                                    {{__('Enable unregistered users to add comments')}}
                                </h3>
                                <p class="text-xs">
                                    {{__('Allow users that are not authenticated or even registered to add comments to your posts')}}
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="border-b py-4 border-b-100">
                <div class="flex items-start justify-between">
                    <div class="w-full py-2 text-start lg:w-1/3 lg:px-5">
                        <h3 class="text-black text-md">{{__('Localization')}}</h3>
                        <p class="text-xs">
                            {{ __('Add or remove languages to your website including your posts and users.')}}
                        </p>
                    </div>
                </div>

                <div class="relative grid w-full grid-cols-1 gap-3 py-2 md:grid-cols-2 lg:grid-cols-3 lg:px-20 lg:py-10"
                     id="locale-container">
                    @foreach($languages as $key => $status)
                        <div class="">
                            <form action="{{route('language.delete')}}" class="h-full" method="POST"
                                  registered-language-form deletion-form
                                  data-locale="
                              {{
                                     json_encode([
                                            'name'=> $key,
                                            'published'=>in_array('published', $status),
                                            'default' => $key == config('app.fallback_locale'),
                                            'default_lang_text' => __('Default Language'),
                                            'make_default_lang_text' => __('Set Default Language')
                                    ])
                              }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="lang" value="{{$key}}">
                                <div
                                    class="relative h-full cursor-pointer select-none rounded-lg py-5 transition duration-100 shadow-soft-2xl hover:bg-gray-100">
                                    <div class="flex items-center justify-center px-5">
                                        <img src="{{ asset("vendor/blade-flags/language-$key.svg") }}" alt=""
                                             class="mr-5 h-5 w-5"/>
                                        <p class="text-sm text-black">{{Locale::getDisplayLanguage($key, App::getLocale())}}</p>
                                    </div>
                                    <div class="mt-2 w-full">
                                        <div class="flex items-center justify-center space-x-2">
                                            @if($key == config('app.fallback_locale'))
                                                <span
                                                    class="inline-block whitespace-nowrap rounded-md py-1 text-center align-baseline text-xs capitalize leading-none text-white gradient-app-theme px-1.5">
                                              <p class="text-xs font-normal tracking-wider">
                                                  {{ __('Default') }}
                                              </p>
                                            </span>
                                            @endif
                                            @if(in_array($key, $published_languages))
                                                <span
                                                    class="inline-block whitespace-nowrap rounded-md bg-lime-400 py-1 text-center align-baseline text-xs capitalize leading-none text-white px-1.5">
                                                      <p class="text-xs font-normal tracking-wider">
                                                          {{ __('Published') }}
                                                      </p>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <button class="absolute top-1 right-1 hover:bg-red-200" remove-lange-btn>
                                        <x-icons.cross class="h-4 w-4"></x-icons.cross>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div
                        class="relative h-full cursor-pointer select-none rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 transition duration-100 shadow-soft-2xl hover:bg-gray-100"
                        id="add_lang">
                        <div class="flex items-center justify-center px-5 py-8">
                            <x-icons.add></x-icons.add>
                            <p class="mx-3 text-xs">{{ __('Add Translation') }}</p>
                        </div>
                    </div>
                    <div
                        class="relative hidden cursor-pointer select-none rounded-lg transition duration-100 shadow-soft-2xl hover:bg-gray-100"
                        id="locale-form">
                        <div class="flex h-full items-center justify-center lg:px-5">
                            <form action="{{ route('language.add') }}" method="POST" id="add_new_language_form">
                                @csrf
                                <select name="lang"
                                        class="block w-full rounded-md border-0 pr-10 pl-3 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        id="select_language">
                                    <option value=""></option>
                                    @foreach($available_languages as $localeKey => $lang)
                                        <option value="{{$localeKey}}">
                                            {{ $lang }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="mt-3 border-b border-b-gray-200 pb-3 relative group">
                <div
                    class="{{ !$credentials_dir_is_empty ? 'bg-gray-100 opacity-40 hover:bg-transparent hover:opacity-100 transition duration-200' : '' }}">
                    <div class="flex items-start justify-between py-4">
                        <div class="w-full  py-2 text-start lg:mx-10 lg:w-1/3">
                            <h3 class="text-black text-md">{{ __('Google Analytics Credentials JSON File') }}</h3>
                            <p class="text-xs">
                                {{ __('This JSON file contains the authentication credentials to access Google Analytics API.') }}
                            </p>
                        </div>
                    </div>
                    <div class="lg:px-16 w-full lg:w-1/3 flex items-center justify-center">
                        <form method="POST" action="{{ route('json.credentials.store') }}" class=""
                              enctype="multipart/form-data">
                            @csrf
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="credentials_json">
                                {{ __('Upload Json FIle') }}
                            </label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer"
                                id="credentials_json" type="file" name="credentials">
                            <div class="w-full flex items-center justify-center mt-4 lg:block">
                                <button class="p-2 gradient-app-theme text-white rounded-md">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @if(!$credentials_dir_is_empty)
                    <div
                        class="hidden lg:block absolute top-1/4 left-1/4 w-1/4 bg-white shadow-soft-2xl p-4 group-hover:hidden ">
                        <h1 class="font-bold text-lg text-center text-orange-600">
                            {{__('Warning!')}}
                        </h1>
                        <br>
                        <h1 class="font-semibold text-center text-sm">
                            {{ __('Your website already has an uploaded credentials file') }}
                        </h1>
                    </div>
                @endif
            </div>
            <div class="flex items-start justify-between py-4 mt-5">
                <div class="w-full px-5 py-2 text-start lg:mx-10 lg:w-1/3">
                    <h3 class="text-black text-md">{{__('Roles & Permissions')}}</h3>
                    <p class="text-xs">
                        {{__('Manage what permission each role of user has access to on the website')}}
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-3">
                @foreach($roles as $role)
                    <form action="{{route('permission.alter', $role)}}" method="POST" class="permissions-form">
                        @csrf
                        <div class="my-4 place-self-end rounded-lg py-2 xl:px-5">
                            <h1 class="text-left capitalize text-black">{{$role->name}}</h1>
                            @foreach($grouped as $key => $group)
                                <div class="my-4 rounded-lg border border-gray-100 xl:px-3 py-5 shadow-soft-xl">
                                    <h1 class="text-left text-sm capitalize">{{$key}}</h1>
                                    <div class="grid grid-cols-1 gap-2">
                                        @foreach($group as $permission)
                                            <div class="my-1 flex w-2/3 items-center justify-start px-5 py-2">
                                                <div class="mx-5 py-5">
                                                    <x-admin.radio-toggler
                                                        value="{{in_array($permission, $role->permissions->pluck('name')->toArray())}}"
                                                        name="{{$permission}}" label=""
                                                    />
                                                </div>
                                                <div class="w-full">
                                                    <h3 class="text-sm capitalize text-md">{{str_replace('-', ' ', $permission)}}</h3>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>


    <div
        class="fixed top-0 left-0 flex hidden min-h-screen w-full items-center justify-center bg-overlay-body z-1000"
        publish_lang data-progress="{{ __('Hold on! This might take some time') }}">
        <div class="relative w-11/12 rounded-lg bg-white py-5 lg:w-1/3">
            <div class="mt-1">
                <h1 class="text-center text-lg font-semibold text-slate-800">{{ __('Language Status') }}</h1>
            </div>
            <div class="mt-3 flex flex-col items-center justify-center space-x-5">
                <div class="" make_default_lang_container>
                    <div class="my-2 flex items-center justify-center space-x-4" default_langage_content>
                        <div>
                            <x-icons.check class="h-6 w-6 text-lime-500"></x-icons.check>
                        </div>
                        <div>
                            <h1 class="text-sm">{{ __('Default language') }}</h1>
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    <form action="{{ route('language.status') }}" method="post" id="change_language_status_form">
                        @csrf
                        <input type="hidden" name="language_name" value="" id="language_name">
                        <x-admin.radio-toggler value="" id="language_status" name="language_status"
                                               label="{{ __('Publish Language?') }}"/>
                    </form>
                </div>

                <div class="my-1" id="change_default_language">
                    <form action="{{ route('language.change.default') }}" method="post">
                        @csrf
                        <input type="hidden" value="" id="default_language_name" name="default_locale">
                        <input type="submit" value="{{ __('Set Default Language') }}"
                               class="mb-10 cursor-pointer rounded-md px-5 py-2 text-sm font-normal text-white gradient-app-theme">
                    </form>
                </div>

                <div
                    class="absolute top-3 right-3 flex items-center justify-center rounded-md group hover:bg-red-200">
                    <button>
                        <x-icons.cross class="group-hover:text-white"></x-icons.cross>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <x-admin.posts.delete-post-modal></x-admin.posts.delete-post-modal>

</x-layouts.admin>

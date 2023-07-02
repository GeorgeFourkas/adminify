@pushonce('scripts')
    @vite('resources/js/admin/modal-overlay.js')
@endpushonce

<div modal_overlay
     {{ $attributes->merge(['class' => 'min-h-screen w-full fixed top-0 left-0 bg-overlay-body z-999 px-10 flex items-center justify-center hidden']) }}>

    {{ $slot }}

</div>

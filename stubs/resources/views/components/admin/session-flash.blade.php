@pushonce('scripts')
    @vite('resources/js/admin/toast.js')
@endpushonce
<div class="hidden" toast
         data-toasts="{{
        json_encode(['success' => session()->get('success') ?? '', 'error' => session()->get('error') ?? ''] + ['bag'  => $errors->all()])
    }}"
>
</div>

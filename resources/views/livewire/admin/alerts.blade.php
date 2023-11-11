<div>
    @if (session()->has('error'))
        <div class='mb-lg-15 alert alert-danger'>
            <div class='alert-text font-weight-bold'>{{ session('error') }}</div>
        </div>
        {{-- <span class="font-medium">Danger alert!</span>  --}}
    @elseif (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
             role="alert">
            {{-- <span class="font-medium">Success alert!</span>  --}}
            {{ session('success') }}
        </div>
    @elseif(session('info'))
        <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
             role="alert">
            {{-- <span class="font-medium">Infoq alert!</span>  --}}
            {{ session('info') }}
        </div>
    @elseif(session('warning'))
        <div class="p-4 mb-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg dark:bg-yellow-200 dark:text-yellow-800"
             role="alert">
            {{-- <span class="font-medium">Info alert!</span>  --}}
            {{ session('warning') }}
        </div>
    @endif

</div>

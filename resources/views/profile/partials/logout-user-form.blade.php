<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Log out') }}
        </h2>
    </header>

    <form method="post" action="{{ route('logout') }}">
        @csrf
        <x-primary-button>{{ __('Log out') }}</x-primary-button>
    </form>
</section>

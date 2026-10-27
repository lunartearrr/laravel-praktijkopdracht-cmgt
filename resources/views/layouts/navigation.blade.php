<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                {{-- Moet nog een logo maken... --}}
{{--                <div class="shrink-0 flex items-center">--}}
{{--                    <a href="{{ route('home') }}">--}}
{{--                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>--}}
{{--                    </a>--}}
{{--                </div>--}}

                <div class="flex space-x-4 sm:space-x-8 sm:-my-px sm:ms-10">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')"> {{ __('Home') }}</x-nav-link>
                    <x-nav-link :href="route('about-us')" :active="request()->routeIs('about-us')"> {{ __('About us') }}</x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')"> {{ __('Contact') }} </x-nav-link>
                </div>
            </div>

            <div class="flex space-x-4 sm:space-x-8 sm:-my-px">
                @auth
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"> {{ __('Dashboard') }}</x-nav-link>
                @endauth

                @auth
                    @if (auth()->user()->role === 'admin')
                        <x-nav-link :href="route('admin')" :active="request()->routeIs('admin-panel')"> {{ __('Admin Panel') }} </x-nav-link>
                    @endif
                @endauth

                @auth
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')"> {{ __('Profile') }} </x-nav-link>
                @endauth

                @guest
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')"> {{ __('Login') }}</x-nav-link>
                @endguest
            </div>

        </div>
    </div>
</nav>

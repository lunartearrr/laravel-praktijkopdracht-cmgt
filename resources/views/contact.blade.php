<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h1>
    </x-slot>
    <div class="max-w-2xl mx-auto p-6">
        <div class="mb-3">
            <h2 class="text-3xl font-bold">We'd love to hear from you!</h2>
        </div>
        <div class="mb-3">
            <p class="text-m">Have a question, found a bug, or know an indie game that's missing from IndieCritic? Let
                us know!</p>
        </div>

        <div class="mb-3">
            <div class="flex">
                <p class="text-m font-bold pr-2">Email:</p>
                <p>contact@indiecritic.test</p>
            </div>

            <div class="flex">
                <p class="text-m font-bold pr-2">Phone:</p>
                <p>+1234567810</p>
            </div>
        </div>
    </div>
</x-app-layout>

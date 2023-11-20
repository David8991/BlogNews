<x-app-layout>
    <x-slot name="header" class="header-sticky">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="flex gap-3">
            @if (Auth::id() == $admin->id) 
                    <a href="#adminUsersPosts" class="btn btn-light">Users posts</a>
                    <a href="#adminPosts" class="btn btn-light">My posts</a>
            @else
                <a href="#" class="btn btn-light">Back to top</a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
                @include("inc.dashboardUserNews")
            </div>
        </div>
    </div>
</x-app-layout>

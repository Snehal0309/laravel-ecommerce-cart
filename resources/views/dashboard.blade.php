<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

        <div class="row">
    <div class="col-md-3">
        <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <i class="fas fa-box fa-3x mb-2 text-primary"></i>
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">Manage all products</p>
                </div>
            </div>
        </a>
    </div>
</div>
</x-app-layout>

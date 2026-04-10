<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 italic">
                    {{ __("Halaman ini berisi informasi biodata mahasiswa.") }}
                </div>
                
                <div class="p-6 bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Nama Lengkap</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $name }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">NIM</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $nim }}</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Program Studi</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $prodi }}</p>
                            </div>
                            <div>
                                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Hobi</h3>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $hobi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

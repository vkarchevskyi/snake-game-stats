<x-layouts.app>
    <x-slot:title>{{ $user->name }}</x-slot:title>

    <div class="relative overflow-x-auto">
        <h1 class="font-semibold text-4xl pb-6 text-gray-700 dark:text-white hidden md:block">
            Ranking table 📊
        </h1>

        <a href="{{ route('score.index') }}" class="hidden md:block mb-6">← Back to main page</a>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 hidden md:block">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Score
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($scores as $score)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="block truncate w-40 md:w-72">{{ $score->user->name }}</span>
                    </th>
                    <td class="px-6 py-4">
                        <strong>{{ $score->value }}</strong>
                    </td>
                    <td class="px-6 py-4">
                        {{ $score->created_at->timezone('Europe/Kyiv')->format('d.m.Y H:i') }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="flex flex-col items-center justify-center gap-y-6">
            <h1 class="font-semibold text-4xl text-gray-700 dark:text-white md:hidden">
                Ranking table 📊
            </h1>

            <a href="{{ route('score.index') }}" class="md:hidden">← Back to main page</a>

            @foreach($scores as $score)
                <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700 md:hidden">
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 w-56 truncate dark:text-white">
                                            {{ $score->user->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            {{ $score->created_at->timezone('Europe/Kyiv')->format('d.m.Y H:i') }}
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        {{ $score->value }}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mx-auto my-6">
        <div class="w-48 mx-auto">
            {{ $scores->links('vendor/pagination/simple-tailwind') }}
        </div>
    </div>
</x-layouts.app>

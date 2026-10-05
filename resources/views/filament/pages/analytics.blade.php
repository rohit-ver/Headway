<x-filament-panels::page>

    {{-- ========================================================= --}}
    {{-- SUMMARY CARDS --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Total Visitors --}}
        <x-filament::section>

            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-primary-50 dark:bg-primary-500/10">

                    <x-heroicon-o-users
                        class="h-6 w-6 text-primary-600 dark:text-primary-400"
                    />

                </div>

                <div>

                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Total Visitors
                    </p>

                    <p class="text-2xl font-semibold text-gray-950 dark:text-white">
                        {{ number_format($this->getTotalVisitors()) }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        All time
                    </p>

                </div>

            </div>

        </x-filament::section>


        {{-- Today's Visitors --}}
        <x-filament::section>

            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-success-50 dark:bg-success-500/10">

                    <x-heroicon-o-chart-bar
                        class="h-6 w-6 text-success-600 dark:text-success-400"
                    />

                </div>

                <div>

                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Today's Visitors
                    </p>

                    <p class="text-2xl font-semibold text-gray-950 dark:text-white">
                        {{ number_format($this->getTodayVisitors()) }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        Today
                    </p>

                </div>

            </div>

        </x-filament::section>


        {{-- Customers --}}
        <x-filament::section>

            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-warning-50 dark:bg-warning-500/10">

                    <x-heroicon-o-user-group
                        class="h-6 w-6 text-warning-600 dark:text-warning-400"
                    />

                </div>

                <div>

                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Customers
                    </p>

                    <p class="text-2xl font-semibold text-gray-950 dark:text-white">
                        {{ number_format($this->getCustomersCount()) }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        Registered customers
                    </p>

                </div>

            </div>

        </x-filament::section>


        {{-- Product Inquiries --}}
        <x-filament::section>

            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-danger-50 dark:bg-danger-500/10">

                    <x-heroicon-o-envelope
                        class="h-6 w-6 text-danger-600 dark:text-danger-400"
                    />

                </div>

                <div>

                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Product Inquiries
                    </p>

                    <p class="text-2xl font-semibold text-gray-950 dark:text-white">
                        {{ number_format($this->getInquiriesCount()) }}
                    </p>

                    <p class="mt-1 text-xs text-gray-400">
                        Total inquiries
                    </p>

                </div>

            </div>

        </x-filament::section>

    </div>


    {{-- ========================================================= --}}
    {{-- 7 DAYS VISITOR CHART --}}
    {{-- ========================================================= --}}

    <x-filament::section class="mt-6">

        <x-slot name="heading">
            Website Visitors
        </x-slot>

        <x-slot name="description">
            Visitor activity over the last 7 days.
        </x-slot>


        @php

            $visitorData = $this->getVisitorChart();

            $maxVisitors = max(
                collect($visitorData)->max('count'),
                1
            );

        @endphp


        <div class="mt-6">

            <div class="flex h-72 items-end justify-between gap-3 sm:gap-6">

                @foreach ($visitorData as $day)

                    @php

                        $height = $day['count'] > 0
                            ? max(($day['count'] / $maxVisitors) * 100, 8)
                            : 4;

                    @endphp


                    <div class="flex h-full flex-1 flex-col items-center justify-end">

                        {{-- Count --}}
                        <div class="mb-2 text-xs font-medium text-gray-500 dark:text-gray-400">

                            {{ number_format($day['count']) }}

                        </div>


                        {{-- Bar --}}
                        <div
                            class="w-full max-w-16 rounded-t-lg bg-primary-500 transition-all duration-300 hover:bg-primary-600"
                            style="height: {{ $height }}%;"
                            title="{{ $day['date'] }} - {{ $day['count'] }} visitors"
                        >
                        </div>


                        {{-- Day --}}
                        <div class="mt-3 text-xs font-medium text-gray-500 dark:text-gray-400">

                            {{ $day['day'] }}

                        </div>


                        {{-- Date --}}
                        <div class="mt-1 text-[10px] text-gray-400">

                            {{ $day['date'] }}

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </x-filament::section>


    {{-- ========================================================= --}}
    {{-- SECOND ROW --}}
    {{-- ========================================================= --}}

    <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-2">


        {{-- ===================================================== --}}
        {{-- MOST VISITED PAGES --}}
        {{-- ===================================================== --}}

        <x-filament::section>

            <x-slot name="heading">
                Most Visited Pages
            </x-slot>

            <x-slot name="description">
                Pages receiving the most visits.
            </x-slot>


            <div class="mt-4 divide-y divide-gray-100 dark:divide-white/5">

                @forelse ($this->getTopPages() as $page)

                    <div class="flex items-center justify-between gap-4 py-4">

                        <div class="flex min-w-0 items-center gap-3">

                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-800">

                                <x-heroicon-o-document-text
                                    class="h-5 w-5 text-gray-500"
                                />

                            </div>

                            <div class="min-w-0">

                                <p class="truncate text-sm font-medium text-gray-900 dark:text-white">

                                    {{ $page->page_url }}

                                </p>

                            </div>

                        </div>


                        <span class="shrink-0 rounded-full bg-primary-50 px-3 py-1 text-xs font-medium text-primary-700 dark:bg-primary-500/10 dark:text-primary-400">

                            {{ number_format($page->visits) }} visits

                        </span>

                    </div>

                @empty

                    <div class="py-10 text-center">

                        <x-heroicon-o-document-text
                            class="mx-auto h-10 w-10 text-gray-300"
                        />

                        <p class="mt-3 text-sm text-gray-500">
                            No page visit data available yet.
                        </p>

                    </div>

                @endforelse

            </div>

        </x-filament::section>

    {{-- ========================================================= --}}
    {{-- MOST VIEWED PRODUCTS --}}
    {{-- ========================================================= --}}

    <x-filament::section class="mt-6">

        <x-slot name="heading">
            Most Viewed Products
        </x-slot>

        <x-slot name="description">
            Products viewed most by visitors.
        </x-slot>


        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">

            <div class="flex items-center justify-between rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                <div>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">Total Product Views</p>
                    <p class="text-xs text-gray-500">All time</p>
                </div>
                <p class="text-xl font-semibold text-gray-950 dark:text-white">
                    {{ number_format($this->getTotalProductViews()) }}
                </p>
            </div>

            <div class="flex items-center justify-between rounded-xl bg-gray-50 p-4 dark:bg-gray-800">
                <div>
                    <p class="text-sm font-medium text-gray-900 dark:text-white">Products Viewed</p>
                    <p class="text-xs text-gray-500">Unique products</p>
                </div>
                <p class="text-xl font-semibold text-gray-950 dark:text-white">
                    {{ number_format($this->getProductsViewedCount()) }}
                </p>
            </div>

        </div>


        <div class="mt-4 divide-y divide-gray-100 dark:divide-white/5">

            @forelse ($this->getMostViewedProducts() as $index => $product)

                <div class="flex items-center justify-between gap-4 py-4">

                    <div class="flex min-w-0 items-center gap-3">

                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-gray-100 text-sm font-semibold text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                            {{ $index + 1 }}
                        </div>

                        <p class="truncate text-sm font-medium text-gray-900 dark:text-white">
                            {{ $product->name }}
                        </p>

                    </div>

                    <span class="shrink-0 rounded-full bg-primary-50 px-3 py-1 text-xs font-medium text-primary-700 dark:bg-primary-500/10 dark:text-primary-400">
                        {{ number_format($product->views_count) }} views
                    </span>

                </div>

            @empty

                <div class="py-10 text-center">

                    <x-heroicon-o-cube class="mx-auto h-10 w-10 text-gray-300" />

                    <p class="mt-3 text-sm text-gray-500">
                        No product views recorded yet.
                    </p>

                </div>

            @endforelse

        </div>

    </x-filament::section>

        {{-- ===================================================== --}}
        {{-- WEBSITE OVERVIEW --}}
        {{-- ===================================================== --}}

        <x-filament::section>

            <x-slot name="heading">
                Website Overview
            </x-slot>

            <x-slot name="description">
                Current website statistics.
            </x-slot>


            <div class="mt-4 space-y-4">


                {{-- Products --}}
                <div class="flex items-center justify-between rounded-xl bg-gray-50 p-4 dark:bg-gray-800">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-info-50 dark:bg-info-500/10">

                            <x-heroicon-o-cube
                                class="h-5 w-5 text-info-600 dark:text-info-400"
                            />

                        </div>

                        <div>

                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                Products
                            </p>

                            <p class="text-xs text-gray-500">
                                Total products
                            </p>

                        </div>

                    </div>


                    <p class="text-xl font-semibold text-gray-950 dark:text-white">

                        {{ number_format($this->getProductsCount()) }}

                    </p>

                </div>


                {{-- Customers --}}
                <div class="flex items-center justify-between rounded-xl bg-gray-50 p-4 dark:bg-gray-800">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-warning-50 dark:bg-warning-500/10">

                            <x-heroicon-o-user-group
                                class="h-5 w-5 text-warning-600 dark:text-warning-400"
                            />

                        </div>

                        <div>

                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                Customers
                            </p>

                            <p class="text-xs text-gray-500">
                                Registered customers
                            </p>

                        </div>

                    </div>


                    <p class="text-xl font-semibold text-gray-950 dark:text-white">

                        {{ number_format($this->getCustomersCount()) }}

                    </p>

                </div>


                {{-- Inquiries --}}
                <div class="flex items-center justify-between rounded-xl bg-gray-50 p-4 dark:bg-gray-800">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-danger-50 dark:bg-danger-500/10">

                            <x-heroicon-o-envelope
                                class="h-5 w-5 text-danger-600 dark:text-danger-400"
                            />

                        </div>

                        <div>

                            <p class="text-sm font-medium text-gray-900 dark:text-white">
                                Product Inquiries
                            </p>

                            <p class="text-xs text-gray-500">
                                Customer inquiries
                            </p>

                        </div>

                    </div>


                    <p class="text-xl font-semibold text-gray-950 dark:text-white">

                        {{ number_format($this->getInquiriesCount()) }}

                    </p>

                </div>


            </div>

        </x-filament::section>

    </div>


    {{-- ========================================================= --}}
    {{-- RECENT VISITORS --}}
    {{-- ========================================================= --}}

    <x-filament::section class="mt-6">

        <x-slot name="heading">
            Recent Visitors
        </x-slot>

        <x-slot name="description">
            Latest website visits.
        </x-slot>


        <div class="mt-4 overflow-x-auto">

            <table class="w-full text-left">

                <thead>

                    <tr class="border-b border-gray-200 dark:border-white/10">

                        <th class="px-4 py-3 text-xs font-semibold uppercase text-gray-500">
                            Page
                        </th>

                        <th class="px-4 py-3 text-xs font-semibold uppercase text-gray-500">
                            IP Address
                        </th>

                        <th class="px-4 py-3 text-xs font-semibold uppercase text-gray-500">
                            Time
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100 dark:divide-white/5">

                    @forelse ($this->getRecentVisitors() as $visitor)

                        <tr>

                            <td class="max-w-xs truncate px-4 py-4 text-sm text-gray-900 dark:text-white">

                                {{ $visitor->page_url ?? 'Unknown' }}

                            </td>


                            <td class="px-4 py-4 text-sm text-gray-500">

                                {{ $visitor->ip_address ?? 'Unknown' }}

                            </td>


                            <td class="px-4 py-4 text-sm text-gray-500">

                                {{ $visitor->created_at?->diffForHumans() }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="3"
                                class="px-4 py-10 text-center text-sm text-gray-500"
                            >

                                No visitors recorded yet.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </x-filament::section>


</x-filament-panels::page>
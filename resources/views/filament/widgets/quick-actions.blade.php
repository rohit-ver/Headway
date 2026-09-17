<x-filament::section>

    <div class="headway-quick-actions w-full">

        {{-- =========================================================
             HEADER
        ========================================================== --}}

        <div class="quick-actions-header">

            <span class="quick-actions-label">
                QUICK ACTIONS
            </span>

            <h2>
                Manage your store
            </h2>

            <p>
                Quickly access your most frequently used actions.
            </p>

        </div>


        {{-- =========================================================
             QUICK ACTIONS GRID
        ========================================================== --}}

        <div class="quick-actions-grid">


            {{-- =====================================================
                 ADD PRODUCT
            ====================================================== --}}

            <a
                href="{{ route('filament.admin.resources.products.create') }}"
                class="quick-action-card"
            >

                <div class="quick-action-icon product-icon">
                    <x-heroicon-o-cube />
                </div>

                <div class="quick-action-content">
                    <h3>Add Product</h3>
                    <p>Create a new product</p>
                </div>

                <div class="quick-action-arrow">
                    <x-heroicon-o-arrow-up-right />
                </div>

            </a>


            {{-- =====================================================
                 ADD CATEGORY
            ====================================================== --}}

            <a
                href="{{ route('filament.admin.resources.categories.create') }}"
                class="quick-action-card"
            >

                <div class="quick-action-icon category-icon">
                    <x-heroicon-o-rectangle-stack />
                </div>

                <div class="quick-action-content">
                    <h3>Add Category</h3>
                    <p>Create a new category</p>
                </div>

                <div class="quick-action-arrow">
                    <x-heroicon-o-arrow-up-right />
                </div>

            </a>


            {{-- =====================================================
                 VIEW INQUIRIES
            ====================================================== --}}

            <a
                href="{{ route('filament.admin.resources.contact-inquiries.index') }}"
                class="quick-action-card"
            >

                <div class="quick-action-icon inquiry-icon">
                    <x-heroicon-o-envelope />
                </div>

                <div class="quick-action-content">
                    <h3>View Inquiries</h3>
                    <p>Check customer inquiries</p>
                </div>

                <div class="quick-action-arrow">
                    <x-heroicon-o-arrow-up-right />
                </div>

            </a>


            {{-- =====================================================
                 EXPORT EXCEL
            ====================================================== --}}

            <a
                href="{{ route('inquiries.export.excel') }}"
                class="quick-action-card"
            >

                <div class="quick-action-icon excel-icon">
                    <x-heroicon-o-table-cells />
                </div>

                <div class="quick-action-content">
                    <h3>Export inquiries</h3>
                    <p>Download inquiries as Excel</p>
                </div>

                <div class="quick-action-arrow">
                    <x-heroicon-o-arrow-up-right />
                </div>

            </a>


            {{-- =====================================================
                 EXPORT PDF
            ====================================================== --}}

            <a
                href="{{ route('inquiries.export.pdf') }}"
                target="_blank"
                class="quick-action-card"
            >

                <div class="quick-action-icon pdf-icon">
                    <x-heroicon-o-document-arrow-down />
                </div>

                <div class="quick-action-content">
                    <h3>Export inquiries PDF</h3>
                    <p>Download inquiries as PDF</p>
                </div>

                <div class="quick-action-arrow">
                    <x-heroicon-o-arrow-up-right />
                </div>

            </a>
            <a
                href="#"
                class="quick-action-card"
            >
                <div class="quick-action-icon excel-icon">
                    <x-heroicon-o-table-cells />
                </div>

                <div class="quick-action-content">
                    <h3>Export Products</h3>
                    <p>Download products as Excel</p>
                </div>

                <div class="quick-action-arrow">
                    <x-heroicon-o-arrow-up-right />
                </div>
            </a>

        </div>

    </div>

</x-filament::section>
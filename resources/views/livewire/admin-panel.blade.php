<section x-data="{ open: false }" class="flex flex-col lg:flex-row">
    <!-- Hamburger Menu for Mobile -->
    <button @click="open = true" class="fixed top-35 right-4 bg-blue-900 text-white p-2 rounded-full lg:hidden">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
    </button>
    <!-- Sidebar Drawer -->
    <div
    class="fixed top-25 left-0 w-64 h-full  bg-blue-900 text-white transform transition-transform ease-in-out duration-300" :class="{'-translate-x-full': !open, 'translate-x-0': open}">
        <div class="p-4 text-2xl font-bold mb-4">Admin Panel</div>
        <ul class="space-y-2">
            <li class="py-2">
                <a href="{{ route('cellars-statistics') }}" class="block px-4 py-2 rounded hover:bg-blue-800">statistique de la cellier</a>
            </li>
            <li class="py-2">
                <a href="#" class="block px-4 py-2 rounded hover:bg-blue-800">Users</a>
            </li>
            <li class="py-2">
                <a href="#" class="block px-4 py-2 rounded hover:bg-blue-800">Products</a>
            </li>
            <!-- Add more sidebar items as needed -->
        </ul>
        <button @click="open = false" class="absolute top-4 right-4 text-white lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
    <!-- End of Sidebar Drawer -->

    <!-- Main Content Area -->
    <div class="flex-grow p-4">
        <!-- Header -->
        <div class="text-3xl font-bold">Welcome to the Admin Panel</div>
        <div class="text-gray-600 mb-4">Admin User</div>

        <!-- Main Content -->
        <div class="bg-white p-4 rounded shadow">
            <!-- Your admin panel content goes here -->
            <p class="text-lg">This is the main content area of the admin panel page.</p>
            <p class="mt-4">You can add more content and sections as needed.</p>
        </div>

        
    </div>
    <!-- End of Main Content Area -->
</section>

<div x-data="{ open: false }">

    <button x-on:click="open = true"
        class="px-6 py-3 xl:text-lg font-normal text-sm  text-gray-900 bg-gradient-to-b from-[#f6e887] to-[#feb101] rounded-md hover:bg-yellow-600">Inquire
        Now</button>


    <template x-teleport="body">
        <!-- Backdrop -->
        <div x-show="open" x-transition.opacity
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">

            <!-- MODAL -->
            <div x-show="open" x-transition class="relative w-full max-w-xl p-6 bg-white shadow-xl rounded-2xl">

                <!-- Close Button -->
                <button x-on:click="open = false"
                    class="absolute flex items-center justify-center w-8 h-8 text-gray-600 rounded-md right-4 top-4 hover:bg-gray-100">
                    ✕
                </button>

                <!-- Title -->
                <h2 class="mb-1 text-2xl font-semibold text-gray-800">
                    Verifying Question
                </h2>

                <!-- Subtitle -->
                <p class="pb-4 my-4 text-sm text-gray-500 border-b">
                    Before we connect you with our property team, please verify that you’re not a bot.
                </p>

                <!-- Label -->
                <label class="block mb-2 font-medium text-gray-700">
                    What Presidential Decree No. protects property buyer rights?
                </label>

                <!-- Input -->
                <input type="text" placeholder="Type your answer in words"
                    class="w-full px-4 py-3 text-gray-700 border rounded-lg outline-none focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400"
                    required>


                <!-- Buttons -->
                <div class="flex justify-between gap-3 mt-6">
                    <div class="w-full" x-on:click="open = false">
                        {{-- this is the submit button --}}
                        <x-direct-inquiry-modal />
                    </div>

                    <button x-on:click="open = false"
                        class="w-full px-6 py-3 font-semibold text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>

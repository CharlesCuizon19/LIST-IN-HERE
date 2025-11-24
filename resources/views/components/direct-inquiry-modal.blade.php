<div x-data="{ open: false }" x-effect="document.body.classList.toggle('overflow-hidden', open)">

    <!-- Trigger button (example) -->
    <button x-on:click="open = true"
        class="bg-gradient-to-b from-[#f6e887] to-[#feb101] w-full text-gray-900 font-medium px-6 py-3 rounded-lg shadow hover:opacity-90">
        Submit Answer
    </button>

    <!-- TELEPORT INTO BODY -->
    <template x-teleport="body">

        <!-- Backdrop -->
        <div x-show="open" x-transition.opacity
            class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 backdrop-blur-sm">

            <!-- Modal -->
            <div x-show="open" x-transition
                class="bg-white w-full max-w-xl rounded-2xl max-h-[50rem] shadow-xl relative overflow-auto">

                <div class="sticky top-0 self-start px-6 py-6 bg-white drop-shadow-md">
                    <div class="relative justify-between w-full bg-white">
                        <h2 class="text-xl font-semibold text-gray-800 mb-1">
                            Direct Inquiry
                        </h2>
                        <button x-on:click="open = false"
                            class="absolute top-0 right-0 w-8 h-8 rounded-md flex items-center justify-center hover:bg-gray-100 text-gray-600">
                            ✕
                        </button>
                    </div>
                </div>

                <!-- Subtitle -->
                <p class="text-gray-500 text-sm border-b pb-4 mb-4 pt-5 mx-6">
                    To ask Customer Service a question or for assistance, please fill out the form below.
                </p>

                <form action="" class="p-6">

                    <!-- Topic -->
                    <label class="text-gray-700 font-medium text-sm">Topic</label>
                    <select
                        class="w-full border rounded-lg px-4 py-3 text-gray-700 mt-1 mb-4 focus:ring-2 focus:ring-yellow-400">
                        <option>Select a topic</option>
                    </select>

                    <!-- Full Name -->
                    <label class="text-gray-700 font-medium text-sm">Full Name</label>
                    <input type="text" placeholder="Enter full name"
                        class="w-full border rounded-lg px-4 py-3 mt-1 mb-4 focus:ring-2 focus:ring-yellow-400" />

                    <!-- Email -->
                    <label class="text-gray-700 font-medium text-sm">Email Address</label>
                    <input type="email" placeholder="Enter email address"
                        class="w-full border rounded-lg px-4 py-3 mt-1 mb-4 focus:ring-2 focus:ring-yellow-400" />

                    <!-- Contact Number -->
                    <label class="text-gray-700 font-medium text-sm">Contact Number</label>
                    <input type="text" placeholder="Enter contact number"
                        class="w-full border rounded-lg px-4 py-3 mt-1 mb-4 focus:ring-2 focus:ring-yellow-400" />

                    <!-- Radio group -->
                    <label class="text-gray-700 font-medium text-sm">Have You Been Introduced to an Agent?</label>
                    <div class="flex items-center gap-6 mt-2 mb-4">
                        <label class="flex items-center gap-2 text-gray-700">
                            <input type="radio" name="agent" class="form-radio text-yellow-500">
                            Yes
                        </label>

                        <label class="flex items-center gap-2 text-gray-700">
                            <input type="radio" name="agent" class="form-radio text-yellow-500">
                            No
                        </label>
                    </div>

                    <!-- Message -->
                    <label class="text-gray-700 font-medium text-sm">Message</label>
                    <textarea class="w-full border rounded-lg px-4 py-3 mt-1 mb-4 h-28 focus:ring-2 focus:ring-yellow-400"
                        placeholder="Enter message"></textarea>

                    <!-- Disclaimer -->
                    <div class="text-gray-600 text-xs leading-relaxed mb-6">
                        By clicking <strong>"Send Inquiry"</strong>, you agree that:
                        <ul class="list-disc ml-5 mt-2 space-y-1">
                            <li>You have read, understood and accepted the <span class="font-semibold">Privacy
                                    Policy</span>.</li>
                            <li>You may receive communications from ListInHere and can unsubscribe from marketing emails
                                anytime.</li>
                            <li>You are at least 18 years old.</li>
                        </ul>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3">
                        <button
                            class="bg-gradient-to-b from-yellow-300 to-yellow-500 text-gray-900 font-semibold px-6 py-3 rounded-lg w-full shadow hover:opacity-90">
                            Send Inquiry
                        </button>

                        <button x-on:click="open = false"
                            class="bg-gray-200 text-gray-700 font-semibold px-6 py-3 rounded-lg w-full hover:bg-gray-300">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>

</div>

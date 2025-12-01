<div x-data="{
    verifyOpen: false,
    inquiryOpen: false,
    answer: '',
    error: '',
    correctAnswer() {
        const a = this.answer.trim().toLowerCase();
        return a === '957' ||
            a === 'nine hundred fifty seven' ||
            a === 'presidential decree 957';
    },
    submitAnswer() {
        95
        if (this.correctAnswer()) {
            this.error = '';
            this.verifyOpen = false; // CLOSE verification modal
            this.inquiryOpen = true; // OPEN inquiry modal
        } else {
            this.error = 'Incorrect answer. Please try again.';
        }
    }
}" x-effect="document.body.classList.toggle('overflow-hidden', verifyOpen || inquiryOpen)">

    <!-- OPEN VERIFICATION MODAL -->
    <button x-on:click="verifyOpen = true"
        class="px-6 py-3 xl:text-lg font-normal text-sm  text-gray-900 bg-gradient-to-b from-[#f6e887] to-[#feb101] rounded-md hover:bg-yellow-600">
        Inquire Now
    </button>


    <!-- =============== VERIFICATION MODAL =============== -->
    <template x-teleport="body">
        <div x-show="verifyOpen" x-transition.opacity
            class="fixed inset-0 z-[60] flex items-center justify-center bg-black/50 backdrop-blur-sm">

            <div x-show="verifyOpen" x-transition class="relative w-full max-w-xl p-6 bg-white shadow-xl rounded-2xl">

                <button x-on:click="verifyOpen = false"
                    class="absolute flex items-center justify-center w-8 h-8 text-gray-600 rounded-md right-4 top-4 hover:bg-gray-100">
                    ✕
                </button>

                <h2 class="mb-1 text-2xl font-semibold text-gray-800">Verifying Question</h2>

                <p class="pb-4 my-4 text-sm text-gray-500 border-b">
                    Before we connect you with our property team, please verify that you’re not a bot.
                </p>

                <label class="block mb-2 font-medium text-gray-700">
                    What Presidential Decree No. protects property buyer rights?
                </label>

                <input type="text" x-model="answer" placeholder="Type your answer in words"
                    class="w-full px-4 py-3 text-gray-700 border rounded-lg outline-none 
                           focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">

                <!-- CUSTOM ERROR MESSAGE -->
                <p x-show="error" x-text="error" class="mt-2 text-sm text-red-500"></p>

                <div class="flex justify-between gap-3 mt-6">

                    <!-- SUBMIT FIXED -->
                    <button x-on:click="submitAnswer()"
                        class="w-full px-6 py-3 font-medium text-gray-900 bg-gradient-to-b from-yellow-300 to-yellow-500 rounded-lg hover:opacity-90">
                        Submit Answer
                    </button>

                    <button x-on:click="verifyOpen = false"
                        class="w-full px-6 py-3 font-semibold text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>

                </div>
            </div>
        </div>
    </template>



    <!-- =============== DIRECT INQUIRY MODAL =============== -->
    <template x-teleport="body">
        <div x-show="inquiryOpen" x-transition.opacity
            class="fixed inset-0 z-[70] bg-black/50 flex items-center justify-center backdrop-blur-sm">

            <div x-show="inquiryOpen" x-transition
                class="bg-white w-full max-w-xl rounded-2xl max-h-[50rem] shadow-xl relative overflow-auto">

                <div class="sticky top-0 px-6 py-6 bg-white drop-shadow-md">
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">Direct Inquiry</h2>
                    <button x-on:click="inquiryOpen = false"
                        class="absolute top-6 right-6 w-8 h-8 rounded-md flex items-center justify-center hover:bg-gray-100 text-gray-600">
                        ✕
                    </button>
                </div>

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

                    <div class="my-4">
                        <div class="g-recaptcha" data-sitekey="RECAPTCHA_SITEKEY"></div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3">
                        <button
                            class="bg-gradient-to-b from-yellow-300 to-yellow-500 text-gray-900 font-medium px-6 py-3 rounded-lg w-full shadow hover:opacity-90">
                            Send Inquiry
                        </button>

                        <button x-on:click="inquiryOpen = false"
                            class="bg-gray-200 text-gray-700 font-semibold px-6 py-3 rounded-lg w-full hover:bg-gray-300">
                            Cancel
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </template>

</div>

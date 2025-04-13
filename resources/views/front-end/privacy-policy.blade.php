<x-front-end-layout>
    <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <div class="container mx-auto pt-4 pb-12">
                <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="w-full">
                            <h1 class="text-3xl font-bold text-gray-900 border-b-2 border-gray-200 pb-4 mb-6">
                                Privacy Policy
                            </h1>

                            <h2 class="text-2xl font-semibold mb-4">
                                1. Introduction
                            </h2>
                            <p class="mb-4">
                                At <strong>{{ config('app.store_name', 'Online Store') }}</strong>,
                                we respect your privacy and are committed to protecting your personal information.
                                This policy explains what data we collect,
                                how we use it, and your rights regarding your information.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                2. Information We Collect
                            </h2>
                            <ul class="list-disc list-inside mb-4">
                                <li class="mb-2">
                                    <strong>Personal Data:</strong> Includes your name, email, address,
                                    payment details, and any other information you provide when making a purchase or
                                    creating an account.
                                </li>
                                <li class="mb-2">
                                    <strong>Usage Data:</strong> Information like your IP address,
                                    browser type, and pages visited on our site.
                                </li>
                                <li class="mb-2">
                                    <strong>Cookies:</strong> We use cookies to enhance your browsing
                                    experience and gather data on site usage.
                                </li>
                            </ul>

                            <h2 class="text-2xl font-semibold mb-4">
                                3. How We Use Your Information
                            </h2>
                            <ul class="list-disc list-inside mb-4">
                                <li class="mb-2">
                                    <strong>Order Processing:</strong> To fulfill your orders and manage
                                    your account.
                                </li>
                                <li class="mb-2">
                                    <strong>Communication:</strong> To send updates, promotional offers,
                                    and order-related information.
                                </li>
                                <li class="mb-2">
                                    <strong>Site Improvement:</strong> To analyze and improve our website
                                    and services.
                                </li>
                            </ul>

                            <h2 class="text-2xl font-semibold mb-4">
                                4. Sharing Your Information
                            </h2>
                            <p class="mb-4">
                                We do not sell your personal information. We may share data with trusted
                                partners who assist in operating our website and servicing you, under strict
                                confidentiality.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                5. Data Security
                            </h2>
                            <p class="mb-4">
                                We use various security measures to protect your personal information, but
                                we cannot guarantee absolute security due to the nature of the internet.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                6. Your Rights
                            </h2>
                            <p class="mb-4">
                                You have the right to access, correct, or delete your data. Contact us at
                                <a href="https://wa.me/{{ config('app.wa_number', 'WhatsApp Number') }}">
                                    <strong>Admin Information</strong>
                                </a> if you have any questions or concerns.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                7. Changes to This Policy
                            </h2>
                            <p class="mb-4">
                                We may update this policy periodically. Please review it regularly to stay
                                informed of any changes.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                8. Contact Us
                            </h2>
                            <p>
                                If you have any questions about this Privacy Policy, contact us at
                                <a href="https://wa.me/{{ config('app.wa_number', 'WhatsApp Number') }}">
                                    <strong>Admin Information</strong>
                                </a>.
                            </p>

                            <p class="mt-6 text-gray-600 font-bold">
                                Effective Date: {{ date('d M Y', strtotime('2024-09-01')) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-front-end-layout>

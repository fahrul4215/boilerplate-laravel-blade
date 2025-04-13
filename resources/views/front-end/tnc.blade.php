<x-front-end-layout>
    <section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <div class="container mx-auto pt-4 pb-12">
                <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="w-full">
                            <h1 class="text-3xl font-bold text-gray-900 border-b-2 border-gray-200 pb-4 mb-6">
                                Terms & Conditions
                            </h1>

                            <h2 class="text-2xl font-semibold mb-4">
                                1. Introduction
                            </h2>
                            <p class="mb-4">
                                Welcome to <strong>{{ config('app.store_name', 'Online Store') }}</strong>. These Terms
                                & Conditions govern your
                                use of our website and the purchase of products from our store. By accessing or using
                                our website, you agree to be bound by these Terms & Conditions.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                2. Eligibility
                            </h2>
                            <p class="mb-4">
                                To place an order on our website, you must be at least 18 years old and
                                have the legal capacity to enter into binding contracts.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                3. Orders
                            </h2>
                            <ul class="list-disc list-inside mb-4">
                                <li class="mb-2">
                                    <strong>Product Availability:</strong> All products are subject to
                                    availability. We reserve the right to limit the quantity of products we supply,
                                    supply only part of an order, or to divide orders.
                                </li>
                                <li class="mb-2">
                                    <strong>Order Confirmation:</strong> After placing an order, you will
                                    receive an order confirmation email. This email is only an acknowledgment and does
                                    not constitute acceptance of your order.
                                </li>
                                <li class="mb-2">
                                    <strong>Order Acceptance:</strong> Acceptance of your order and the
                                    completion of the contract between you and
                                    <strong>{{ config('app.store_name', 'Online Store') }}</strong> will take place
                                    when we dispatch the goods to you.
                                </li>
                            </ul>

                            <h2 class="text-2xl font-semibold mb-4">
                                4. Pricing and Payment
                            </h2>
                            <ul class="list-disc list-inside mb-4">
                                <li class="mb-2">
                                    <strong>Pricing:</strong> All prices on our website are in
                                    <strong>{{ config('app.currency', '$') }}</strong>
                                    and include applicable taxes. We reserve the right to change prices at any time
                                    without notice.
                                </li>
                                <li class="mb-2">
                                    <strong>Payment:</strong> Payment must be made at the time of placing
                                    the order via WhatsApp.
                                </li>
                            </ul>

                            <h2 class="text-2xl font-semibold mb-4">
                                5. Shipping and Delivery
                            </h2>
                            <ul class="list-disc list-inside mb-4">
                                <li class="mb-2">
                                    <strong>Shipping Costs:</strong> Shipping costs will be calculated
                                    and displayed at WhatsApp.
                                </li>
                                <li class="mb-2">
                                    <strong>Delivery Time:</strong> Estimated delivery times are provided
                                    during checkout via WhatsApp.
                                    However, delivery times may vary depending on the destination and
                                    are subject to delays beyond our control.
                                </li>
                                <li class="mb-2">
                                    <strong>Risk of Loss:</strong> The risk of loss or damage to the
                                    goods passes to you upon delivery.
                                </li>
                            </ul>

                            <h2 class="text-2xl font-semibold mb-4">
                                6. Returns and Refunds
                            </h2>
                            <ul class="list-disc list-inside mb-4">
                                <li class="mb-2">
                                    <strong>Non-Returnable Items:</strong> Our products are not
                                    eligible for return.
                                </li>
                            </ul>

                            <h2 class="text-2xl font-semibold mb-4">
                                7. Intellectual Property
                            </h2>
                            <p class="mb-4">
                                All content on this website, including text, graphics, logos, images, and
                                software, is the property of
                                <strong>{{ config('app.store_name', 'Online Store') }}</strong>
                                or its content suppliers and is
                                protected by intellectual property laws.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                8. Limitation of Liability
                            </h2>
                            <p class="mb-4">
                                To the fullest extent permitted by law,
                                <strong>{{ config('app.store_name', 'Online Store') }}</strong> shall not
                                be liable for any indirect, incidental, or consequential damages arising out of or in
                                connection with the use of our website or the purchase of products from our store.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                9. Governing Law
                            </h2>
                            <p class="mb-4">
                                These Terms & Conditions shall be governed by and construed in accordance
                                with the laws of <strong>{{ config('app.country', 'Country/State') }}</strong>.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                10. Changes to Terms & Conditions
                            </h2>
                            <p class="mb-4">
                                We reserve the right to update or modify these Terms & Conditions at any
                                time without prior notice. Your continued use of the website following any changes
                                indicates your acceptance of the new Terms & Conditions.
                            </p>

                            <h2 class="text-2xl font-semibold mb-4">
                                11. Contact Information
                            </h2>
                            <p>
                                If you have any questions about these Terms & Conditions, please contact us at
                                <a href="https://wa.me/{{ config('app.wa_number', 'WhatsApp Number') }}">
                                    <strong>Admin Information</strong>
                                </a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-front-end-layout>

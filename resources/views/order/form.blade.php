<div class="w-11/12 mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('orders.store') }}" class="flex flex-col items-center">
            @csrf
            <div class="flex w-full justify-around">
                <div>
                    <input
                        type="text"
                        name="full_name"
                        placeholder="Ime i prezime"
                        class="my-4 h-12 block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    />
                    <input
                        type="text"
                        name="phone_number"
                        placeholder="Broj telefona"
                        class="my-4 h-12 block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    />
                    <input
                        type="text"
                        name="street_address"
                        placeholder="Adresa"
                        class="my-4 h-12 block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    />
                    <input
                        type="text"
                        name="city"
                        placeholder="Grad"
                        class="my-4 h-12 block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    />
                </div>
                <div>
                        <input
                        type="text"
                        name="postal_code"
                        placeholder="Postanski broj"
                        class="my-4 h-12 block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    />
                    <input
                        type="email"
                        name="email_address"
                        placeholder="Imejl adresa"
                        class="my-4 h-12 block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    />
                    <textarea
                        name="delivery_instructions"
                        placeholder="Dodatni zahtevi"
                        class="my-4 h-28 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    ></textarea>
                </div>
            </div>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Naruci') }}</x-primary-button>
        </form>
    </div>

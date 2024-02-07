<div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <input
                type="text"
                name="full_name"
                placeholder="Ime i prezime"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <input
                type="text"
                name="phone_number"
                placeholder="Broj telefona"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <input
                type="text"
                name="street_address"
                placeholder="Adresa"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <input
                type="text"
                name="city"
                placeholder="Grad"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <input
                type="text"
                name="postal_code"
                placeholder="Postanski broj"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <input
                type="email"
                name="email_address"
                placeholder="Imejl adresa"
                class="block w-96 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            <textarea
                name="delivery_instructions"
                placeholder="Dodatni zahtevi"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Naruci') }}</x-primary-button>
        </form>
    </div>

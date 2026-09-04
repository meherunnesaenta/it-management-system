@props(['type' => 'button'])

<button {{ $attributes->merge([
    'type' => $type,
    'class' => 'inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150',
]) }}>
    {{ $slot }}
</button>

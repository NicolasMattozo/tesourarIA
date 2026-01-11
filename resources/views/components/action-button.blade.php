@props(['href'])

<a href="{{ $href }}"
   class="inline-flex items-center px-4 py-2 rounded-lg 
          bg-amber-600 hover:bg-amber-700 
          text-white font-medium text-sm 
          transition-colors duration-200 
          focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2
          shadow-sm hover:shadow">
    {{ $slot }}
</a>

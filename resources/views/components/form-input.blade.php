<div class="w-full my-5">
    <label for="{{ $id }}" class="text-xs px-1 text-neutral-500 capitalize">{{ $label }}</label>
    <div class="flex">
        <div class="w-10 z-10 text-center flex justify-center items-center">
            <i class="{{ $icon }} text-lg text-neutral-300"></i>
        </div>
        <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}" class="w-full border border-neutral-300 py-2 pl-12 -ml-10 outline-none text-neutral-900 focus:border-neutral-900 rounded" />
    </div>
</div>

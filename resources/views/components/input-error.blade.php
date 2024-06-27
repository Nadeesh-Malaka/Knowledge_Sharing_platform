{{-- @props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>{{ $message }}</p>
@enderror
  --}}

@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'alert alert-danger']) }}>
        <ul>
            @foreach ((array) $messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif



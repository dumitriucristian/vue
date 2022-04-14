@props([
    'type' => 'success',
    'colors' =>[
        'success' => 'bg-green-300',
        'error' => 'bg-red-400',
        'warning' => 'bg-blue-500'
        ]
]);

<section {{ $attributes->merge(
    [ 'class' => "{$colors[$type]} p-4 pl-10 pr-10 justify-between text-xl mb-3 font-semibold text-white flex"]
    ) }}>
    <div>
        <p>{{$slot}}</p>
    </div>
    <button > x </button>
</section>

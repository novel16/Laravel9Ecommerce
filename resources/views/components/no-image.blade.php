@props([
    'src' => asset('static/no-image.jpg'),
    'alt' => 'No Image Available',
    'class' => 'w-100'
])

<img src="{{$src}}" alt="{{ $alt }}" class="{{ $class }}">
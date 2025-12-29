@php
    $viteHotFile = public_path('hot');
    $viteManifest = public_path('build/manifest.json');
    $viteAvailable = file_exists($viteHotFile) || file_exists($viteManifest);
@endphp

@if ($viteAvailable)
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endif

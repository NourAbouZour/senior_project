{{-- resources/views/bundles.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.meta')
  <link rel="stylesheet" href="{{ asset('css/bundlestyle.css') }}" />
</head>
<body>
  @include('partials.header')

  <div class="container">
    {{-- Filter toolbar --}}
    <div class="filter-container">
      <button class="filter-btn active" data-filter="all">All</button>
      <button class="filter-btn" data-filter="garden">Garden</button>
      <button class="filter-btn" data-filter="living-room">Living Room</button>
      <button class="filter-btn" data-filter="kitchen">Kitchen</button>
      <button class="filter-btn" data-filter="bedroom">Bedroom</button>
      <button class="filter-btn" data-filter="bathroom">Bathroom</button>
      <button class="filter-btn" data-filter="garage">Garage</button>
    </div>

    {{-- Bundles grid --}}
    <main class="bundles-container">
      @include('widgets.bundle-garden')
      @include('widgets.bundle-living-room')
      @include('widgets.bundle-kitchen')
      @include('widgets.bundle-bedroom')
      @include('widgets.bundle-bathroom')
      @include('widgets.bundle-garage')
    </main>
  </div>

  @include('partials.footer')

  <script src="{{ asset('js/bundlescript.js') }}" defer></script>
</body>
</html>

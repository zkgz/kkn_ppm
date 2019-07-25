<script>
    var mapCenter = [{{  $taxpayer->lat ?? (request('latitude') ?? -4.0185)  }}, {{ $taxpayer->long ?? (request('longitude') ?? 119.6710) }}];
    var map = L.map('mapid', {gestureHandling: true}).setView(mapCenter, 12);
    var baseUrl = "{{ url('/') }}";
</script>
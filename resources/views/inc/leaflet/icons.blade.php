<script>
    var Icons = L.Icon.extend({
        options: {
            shadowUrl: '{{URL::asset("/map-marker/shadow-64.png")}}',
            iconSize:     [32, 32],
            shadowSize:   [32, 32],
            iconAnchor:   [16, 32],
            shadowAnchor: [16, 32],
            popupAnchor:  [0, -32]
        }
    });
    
    var restaurantIcon = new Icons({iconUrl: '{{URL::asset("/map-marker/restaurant-64.png")}}'}),
    propertyIcon = new Icons({iconUrl: '{{URL::asset("/map-marker/property-64-3.png")}}'}),
    parkingIcon = new Icons({iconUrl: '{{URL::asset("/map-marker/parking-64-2.png")}}'}),
    hotelIcon = new Icons({iconUrl: '{{URL::asset("/map-marker/hotel-64-4.png")}}'});
</script>
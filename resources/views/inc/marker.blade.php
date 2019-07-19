<script>

    var greenIcon = L.icon({
        shadowUrl: 'leaf-shadow.png',
        iconSize:     [38, 95], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    var hotelIcon       = new LeafIcon({iconUrl: 'hotel-64.png'}),
        propertyIcon    = new LeafIcon({iconUrl: 'pbb-64.png'}),
        parkingIcon     = new LeafIcon({iconUrl: 'parkir-64.png'}),
        restaurantIcon  = new LeafIcon({iconUrl: 'restaruant-64.png'});

</script>
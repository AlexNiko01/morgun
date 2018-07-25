var map;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        center: new google.maps.LatLng(50.427801, 30.519548),
        mapTypeId: 'roadmap',
        styles: [
            {
                "featureType": "all",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "hue": "#0080ff"
                    },
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "geometry",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "hue": "#0080ff"
                    },
                    {
                        "saturation": "24"
                    },
                    {
                        "lightness": "4"
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "visibility": "on"
                    },
                    {
                        "hue": "#0080ff"
                    },
                    {
                        "saturation": "48"
                    },
                    {
                        "lightness": "48"
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.text.stroke",
                "stylers": [
                    {
                        "visibility": "off"
                    },
                    {
                        "saturation": "0"
                    }
                ]
            },
            {
                "featureType": "all",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "simplified"
                    },
                    {
                        "hue": "#0080ff"
                    },
                    {
                        "weight": "0.01"
                    },
                    {
                        "lightness": "0"
                    },
                    {
                        "saturation": "48"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers": [
                    {
                        "color": "#ff0000"
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "poi.attraction",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "hue": "#ff0000"
                    },
                    {
                        "visibility": "off"
                    }
                ]
            }
        ]
    });

    var features = [
        {
            position: new google.maps.LatLng(50.427801, 30.519548)
        }
    ];

    features.forEach(function (feature) {
        let marker = new google.maps.Marker({
            position: feature.position,
            icon: '/web/images/map.svg',
            map: map
        });
    });
}
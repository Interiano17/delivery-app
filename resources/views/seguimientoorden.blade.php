<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/../resources/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <title>Seguimiento Orden</title>
    <style>
        #map{
            height: 85vh;
            width: 80vw;
        }

    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Delivery App</h1>
            </div>
        </nav>
    </header>
    <div class="container-fluid my-3 mx-auto d-flex justify-content-center">
    
        <div id="map"></div>

    </div>
    <footer>
        <p>© 2024 Delivery App</p>
    </footer>
</body>
<script>
    const repartidorCercano =  JSON.parse('<?php echo json_encode($repartidorCercano); ?>');
    console.log(repartidorCercano);
    const comercio = JSON.parse('<?php  echo json_encode($comercio);?>')//objeto completo de comercio
    console.log("comercio: latitud: "+ comercio.ubicacion.latitud + " longitud: " + comercio.ubicacion.longitud );
    
    let correoUsuario = localStorage.getItem("correo");
    let ubicacionCliente = JSON.parse('<?php echo $ubicacionCliente;?>')
    console.log("Esta es la ubicacion del cliente: latitud: " + ubicacionCliente.latitud+ " longitud: "+ ubicacionCliente.longitud);
    
    //obtener la ubicacion de destino(ubicacion de la persona)
    //poner la ubicacion de repartidorCercano en todo lugar que se necesite
    //poner la ubicacion del comercio como waypoint
    
    // var xhr = new XMLHttpRequest();

// Configurar la solicitud (método y URL)
// xhr.open('GET', `http://localhost:8091/api/persona/${correoUsuario}`, true);

// // Configurar una función para manejar la respuesta
// xhr.onreadystatechange = function () {
//     if (xhr.readyState === 4) { // La solicitud está completa
//         if (xhr.status === 200) { // La solicitud fue exitosa
//             // Procesar la respuesta
//             console.log(xhr.responseText);
//         } else {
//             // Manejar errores
//             console.error('Error en la solicitud: ' + xhr.status);
//         }
//     }
// };

// Enviar la solicitud
xhr.send();

    const ubicacionDestino = destino;
    // const ubicacionDestino = destino;
    console.log(repartidorCercano)
    function initMap(){
        map =  new google.maps.Map(document.getElementById("map"),{
            center: { lat: 14.088752345373827, lng: -87.18425930523999},
            zoom: 14,
            mapId: '7cb31370a4c118bc'})
        
        //solo de prueba
        localStorage.setItem("ubicacionDestino",JSON.stringify( { latitud: 14.084818012234761, longitud: -87.16209643407598 } ) )
        //let info = [ { ubicacion: { latitud: 14.092082987904433, longitud: -87.1905835151332 } } ]
        localStorage.setItem("ubicacionComercio", JSON.stringify( { latitud: 14.09796650253568, longitud:  -87.17859427114853 } ) )
        let info = JSON.parse('<?php echo json_encode($infos); ?>');
        console.log(info)

        info.forEach(element => {
            console.log("latitud: " + element.ubicacion.latitud + " longitud: " + element.ubicacion.longitud )
            new google.maps.Marker({
                position: { lat: parseFloat(element.ubicacion.latitud) , lng: parseFloat(element.ubicacion.longitud) },
                icon: {
                    url: "{{ asset('/bycicle.png') }}",
                    scaledSize: new google.maps.Size(38,31)
                },
                map
            }) 
        });

        const destino = JSON.parse(localStorage.getItem("ubicacionDestino"))
        new google.maps.Marker({
                position: { lat: destino.latitud , lng: destino.longitud },
                map,
                icon: {
                    url: "{{ asset('/finish_line.svg') }}",
                   // url: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
                    scaledSize: new google.maps.Size(38,31)
                }
            })
        
        const ubicacionComercio = JSON.parse(localStorage.getItem("ubicacionComercio"))

        let directions = new google.maps.DirectionsService();
        let directionsRenderer = new google.maps.DirectionsRenderer();
        directionsRenderer.setMap(map)
        console.log(info[info.length-1].ubicacion.latitud)
        const route = {
            // origin: { lat: info[1].ubicacion.latitud, lng: info[1].ubicacion.latitud },
            origin: new google.maps.LatLng(info[info.length-1].ubicacion.latitud, info[info.length-1].ubicacion.longitud)  ,
            waypoints: [ { location: new google.maps.LatLng(ubicacionComercio.latitud, ubicacionComercio.longitud) , stopover: false } ],
            // new google.maps.LatLng(ubicacionComercio.latitud, ubicacionComercio.longitud)
            // destination: { lat: destino.latitud, lng: destino.longitud },
            destination: new google.maps.LatLng(destino.latitud, destino.longitud),
            travelMode: 'DRIVING'
        }

        directions.route(route,function(response, status) { // anonymous function to capture directions
            if (status !== 'OK') {
                window.alert('La peticion de rutaa ha fallado ' + status);
                return;
            } else {
                directionsRenderer.setDirections(response); // Add route to the map
                var directionsData = response.routes[0].legs[0]; // Get data about the mapped route
                if (!directionsData) {
                    window.alert('Fallo la peticion');
                    return;
                }
                else {
                    console.log(" La distancia es " + directionsData.distance.text + " (" + directionsData.duration.text + ").")
                }
            }
        })
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCPrywMVc3u2xDWgwamhcxsGGDiExQT00&map_ids=7cb31370a4c118bc&callback=initMap" defer>
</script>

<!-- <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: "AIzaSyCVkBVA5djfVzi_ddSdNLxTt3TPES5m0Is", v: "weekly"});</script> -->




</html>

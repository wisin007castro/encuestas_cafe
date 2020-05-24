<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="stylesheet" href="{{ asset('/estilos_geoserver/css/leaflet.css') }}">
		<link rel="stylesheet" href="{{ asset('/estilos_geoserver/css/L.Control.Locate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/estilos_geoserver/css/qgis2web.css') }}">
		<link rel="stylesheet" href="{{ asset('/estilos_geoserver/css/fontawesome-all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/estilos_geoserver/css/leaflet-search.css') }}">
		<link rel="stylesheet" href="{{ asset('/estilos_geoserver/css/leaflet-control-geocoder.Geocoder.css') }}">
		<link rel="stylesheet" href="{{ asset('/estilos_geoserver/css/leaflet-measure.css') }}">
		<style>
		#map {
				width: 1035px;
				height: 540px;
		}
		</style>
		<title></title>
</head>
@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
<section  id="contenido_principal">
<section  id="content">
    <div class="" >
        <div class="container" id="map">
        </div>
      </div>
</section>

</section>
@endsection

@section('scripts')

@parent
<script src="{{ asset('/estilos_geoserver/js/qgis2web_expressions.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/leaflet.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/L.Control.Locate.min.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/leaflet.rotatedMarker.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/leaflet.pattern.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/leaflet-hash.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/Autolinker.min.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/rbush.min.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/labelgun.min.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/labels.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/leaflet.wms.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/leaflet-control-geocoder.Geocoder.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/leaflet-measure.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/js/leaflet-search.js') }}"></script>
<script src="{{ asset('/estilos_geoserver/data/MUNICIPIOS_1.js') }}"></script>
<script>
var map = L.map('map', {
		zoomControl:true, maxZoom:28, minZoom:1
}).fitBounds([[-12.57213589442418,-70.30059594512892],[-9.587635475842509,-64.5277180287252]]);
var hash = new L.Hash(map);
map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
L.control.locate({locateOptions: {maxZoom: 19}}).addTo(map);
var measureControl = new L.Control.Measure({
		position: 'topleft',
		primaryLengthUnit: 'meters',
		secondaryLengthUnit: 'kilometers',
		primaryAreaUnit: 'sqmeters',
		secondaryAreaUnit: 'hectares'
});
measureControl.addTo(map);
document.getElementsByClassName('leaflet-control-measure-toggle')[0]
.innerHTML = '';
document.getElementsByClassName('leaflet-control-measure-toggle')[0]
.className += ' fas fa-ruler';
var bounds_group = new L.featureGroup([]);
function setBounds() {
}
var layer_OpenStreetMap_0 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		opacity: 1.0,
		attribution: '',
		minZoom: 1,
		maxZoom: 28,
		minNativeZoom: 0,
		maxNativeZoom: 19
});
layer_OpenStreetMap_0;
map.addLayer(layer_OpenStreetMap_0);
function pop_MUNICIPIOS_1(feature, layer) {
		var popupContent = '<table>\
						<tr>\
								<th scope="row">ID</th>\
								<td>' + (feature.properties['ID'] !== null ? Autolinker.link(feature.properties['ID'].toLocaleString(), {truncate: {length: 30, location: 'smart'}}) : '') + '</td>\
						</tr>\
						<tr>\
								<th scope="row">MUNICIPIO</th>\
								<td>' + (feature.properties['MUNICIPIO'] !== null ? Autolinker.link(feature.properties['MUNICIPIO'].toLocaleString(), {truncate: {length: 30, location: 'smart'}}) : '') + '</td>\
						</tr>\
						<tr>\
								<th scope="row">PROVINCIA</th>\
								<td>' + (feature.properties['PROVINCIA'] !== null ? Autolinker.link(feature.properties['PROVINCIA'].toLocaleString(), {truncate: {length: 30, location: 'smart'}}) : '') + '</td>\
						</tr>\
						<tr>\
								<th scope="row">AREA</th>\
								<td>' + (feature.properties['AREA'] !== null ? Autolinker.link(feature.properties['AREA'].toLocaleString(), {truncate: {length: 30, location: 'smart'}}) : '') + '</td>\
						</tr>\
						<tr>\
								<th scope="row">PERIMETER</th>\
								<td>' + (feature.properties['PERIMETER'] !== null ? Autolinker.link(feature.properties['PERIMETER'].toLocaleString(), {truncate: {length: 30, location: 'smart'}}) : '') + '</td>\
						</tr>\
						<tr>\
								<th scope="row">HECTARES</th>\
								<td>' + (feature.properties['HECTARES'] !== null ? Autolinker.link(feature.properties['HECTARES'].toLocaleString(), {truncate: {length: 30, location: 'smart'}}) : '') + '</td>\
						</tr>\
				</table>';
		layer.bindPopup(popupContent, {maxHeight: 400});
}

function style_MUNICIPIOS_1_0() {
		return {
				pane: 'pane_MUNICIPIOS_1',
				opacity: 1,
				color: 'rgba(77,175,74,1.0)',
				dashArray: '',
				lineCap: 'square',
				lineJoin: 'bevel',
				weight: 4.0,
				fillOpacity: 0,
				interactive: false,
		}
}
map.createPane('pane_MUNICIPIOS_1');
map.getPane('pane_MUNICIPIOS_1').style.zIndex = 401;
map.getPane('pane_MUNICIPIOS_1').style['mix-blend-mode'] = 'normal';
var layer_MUNICIPIOS_1 = new L.geoJson(json_MUNICIPIOS_1, {
		attribution: '',
		interactive: false,
		dataVar: 'json_MUNICIPIOS_1',
		layerName: 'layer_MUNICIPIOS_1',
		pane: 'pane_MUNICIPIOS_1',
		onEachFeature: pop_MUNICIPIOS_1,
		style: style_MUNICIPIOS_1_0,
});
bounds_group.addLayer(layer_MUNICIPIOS_1);
map.addLayer(layer_MUNICIPIOS_1);
var layer_enc_productores_2 = L.WMS.layer("http://18.225.6.4:8080/geoserver/encuestas_cafe/wms", "enc_productores", {
		format: 'image/png',
		uppercase: true,
		transparent: true,
		continuousWorld : true,
		tiled: true,
		info_format: 'text/html',
		opacity: 1,
		identify: true,
		attribution: '',
});
map.addLayer(layer_enc_productores_2);
var osmGeocoder = new L.Control.Geocoder({
		collapsed: true,
		position: 'topleft',
		text: 'Search',
		title: 'Testing'
}).addTo(map);
document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
.className += ' fa fa-search';
document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
.title += 'Search for a place';
var baseMaps = {};
L.control.layers(baseMaps,{"enc_productores": layer_enc_productores_2,'<img src="{{ asset('/estilos_geoserver/legend/MUNICIPIOS_1.png') }}" /> MUNICIPIOS': layer_MUNICIPIOS_1,"OpenStreetMap": layer_OpenStreetMap_0,}).addTo(map);
setBounds();
var i = 0;
layer_MUNICIPIOS_1.eachLayer(function(layer) {
		var context = {
				feature: layer.feature,
				variables: {}
		};
		layer.bindTooltip((layer.feature.properties['MUNICIPIO'] !== null?String('<div style="color: #4daf4a; font-size: 10pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['MUNICIPIO']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_MUNICIPIOS_1'});
		labels.push(layer);
		totalMarkers += 1;
			layer.added = true;
			addLabel(layer, i);
			i++;
});
map.addControl(new L.Control.Search({
		layer: layer_MUNICIPIOS_1,
		initial: false,
		hideMarkerOnCollapse: true,
		propertyName: 'MUNICIPIO'}));
document.getElementsByClassName('search-button')[0].className +=
 ' fa fa-binoculars';
resetLabels([layer_MUNICIPIOS_1]);
map.on("zoomend", function(){
		resetLabels([layer_MUNICIPIOS_1]);
});
map.on("layeradd", function(){
		resetLabels([layer_MUNICIPIOS_1]);
});
map.on("layerremove", function(){
		resetLabels([layer_MUNICIPIOS_1]);
});
</script>


@endsection

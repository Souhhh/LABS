<div class="map" id="map-area">
        <div class="gmap_canvas">
            <iframe id="gmap_canvas" src="https://maps.google.com/maps?q= <?= urlencode(get_theme_mod('labs-contact-google')) ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
	</div>
	
	<style>
        /* always set the map height explicity to defne the size of the div element that contains the map. */
        .map {
            height: 100% !important;
            width: 100% !important;
        }

        .gmap_canvas {
            height: 100% !important;
            width: 100% !important;
        }

        #gmap_canvas {
            height: 100% !important;
            width: 100% !important;
        }
    </style>
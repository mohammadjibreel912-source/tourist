import './bootstrap';
import * as THREE from 'three';
import PhotoSphereViewer from 'photo-sphere-viewer';
import 'photo-sphere-viewer/dist/photo-sphere-viewer.css';

window.addEventListener('load', () => {
    const container = document.getElementById('viewer'); // 360 viewer container
    const imageUrl = container?.dataset.image;           // get the dynamic image URL

    if(container && imageUrl) {
        new PhotoSphereViewer.Viewer({
            container: container,
            panorama: imageUrl,      // your dynamic image
            navbar: true,            // show controls
            defaultLong: 0,          // initial horizontal rotation
            defaultLat: 0,           // initial vertical rotation
            loadingImg: 'https://unpkg.com/photo-sphere-viewer@4/assets/photosphere-logo.gif', // optional loading image
        });
    } else {
        console.error('Container or image URL missing for 360 viewer.');
    }
});

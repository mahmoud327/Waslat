
const lgContainer = document.getElementById('inline-gallery-container');
const inlineGallery = lightGallery(lgContainer, {
  container: lgContainer,
zoom:true,
fullScreen:true,
// Turn off hash plugin in case if you are using it
// as we don't want to change the url on slide change
hash: true,
// Do not allow users to close the gallery
closable: false,
// Add maximize icon to enlarge the gallery
showMaximizeIcon: false,

// Append caption inside the slide item
// to apply some animation for the captions (Optional)
appendSubHtmlTo: ".lg-item",


// Delay slide transition to complete captions animations
// before navigating to different slides (Optional)
// You can find caption animation demo on the captions demo page
slideDelay: 10,
plugins: [lgThumbnail,lgZoom,lgFullscreen],
});

// Since we are using dynamic mode, we need to programmatically open lightGallery
inlineGallery.openGallery();

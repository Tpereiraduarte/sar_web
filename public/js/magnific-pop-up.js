$(document).ready(function () {
  $('.image-link').magnificPopup({ type: 'image' });

  $('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    image: {
      verticalFit: true
    }
  });
});
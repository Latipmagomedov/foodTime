ymaps.ready(init);
function init() {
  let myMap = new ymaps.Map("map", {
    center: [42.97284001680514, 47.48597318185934],
    zoom: 14,
  });

  myGeoObject = new ymaps.GeoObject(
    {
      geometry: {
        type: "Point",
        coordinates: [42.97284001680514, 47.48597318185934],
      },
    },
    {
      draggable: false,
    }
  );

  myMap.geoObjects.add(myGeoObject);
}

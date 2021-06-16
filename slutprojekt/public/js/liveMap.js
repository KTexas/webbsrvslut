const MAP = document.querySelector(".destination-map");

let countryINP = document.querySelector('#inp-country')
let cityINP = document.querySelector('#inp-city')
let streetINP = document.querySelector('#inp-street')
let zipINP = document.querySelector('#inp-zip')

function filterString(s) {
    s = s.toLowerCase()
    let translate = { 'Š' : 'S', 'š' : 's', 'Ž' : 'Z', 'ž' : 'z', 'À' : 'A', 'Á' : 'A', 'Â' : 'A', 'Ã' : 'A', 'Ä' : 'A', 'Å' : 'A', 'Æ' : 'A', 'Ç' : 'C', 'È' : 'E', 'É' : 'E',
        'Ê' : 'E', 'Ë' : 'E', 'Ì' : 'I', 'Í' : 'I', 'Î' : 'I', 'Ï' : 'I', 'Ñ' : 'N', 'Ò' : 'O', 'Ó' : 'O', 'Ô' : 'O', 'Õ' : 'O', 'Ö' : 'O', 'Ø' : 'O', 'Ù' : 'U',
        'Ú' : 'U', 'Û' : 'U', 'Ü' : 'U', 'Ý' : 'Y', 'Þ' : 'B', 'ß' : 'Ss', 'à' : 'a', 'á' : 'a', 'â' : 'a', 'ã' : 'a', 'ä' : 'a', 'å' : 'a', 'æ' : 'a', 'ç' : 'c',
        'è' : 'e', 'é' : 'e', 'ê' : 'e', 'ë' : 'e', 'ì' : 'i', 'í' : 'i', 'î' : 'i', 'ï' : 'i', 'ð' : 'o', 'ñ' : 'n', 'ò' : 'o', 'ó' : 'o', 'ô' : 'o', 'õ' : 'o',
        'ö' : 'o', 'ø' : 'o', 'ù' : 'u', 'ú' : 'u', 'û' : 'u', 'ý' : 'y', 'þ' : 'b', 'ÿ' : 'y'
        };
    let translate_re = /[öäåüÖÄÅÜ]/g;
    return ( s.replace(translate_re, function(match) {
        return translate[match];
    }) );
}

updateMap = () => {
    let country = countryINP.value;
    let city = cityINP.value;
    let street = streetINP.value;
    let zip = zipINP.value;

    country = filterString(country);
    city = filterString(city);
    street = filterString(street);
    zip = filterString(zip);

    mapSRC = "https://www.google.com/maps/embed/v1/place?key=AIzaSyBWN6IL8paR0hWUg9Gy0QBx0JC5oQRbVP4&q=";
    mapComplete = mapSRC + country + ',' + city + ',' + street + ',' + zip

    MAP.src = mapComplete;
}
$(document).ready(


    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://kitsu.io/api/edge/anime",
        crossDomain: true,

        success: function(json) {

            const kitsu = json.data;
            var nombreAnime;
            var enlaceAnime;
            for (let i = 0; i < kitsu.length; i++) {

                nombreAnime = kitsu[i]["attributes"]["slug"];
                enlaceAnime = "https://www.crunchyroll.com/es-es/" + nombreAnime;

                $("#kitsu").append(
                    '<div class="card mb-3" style="max-width: 540px;">' +
                    '<div class="row g-0">' +
                    '<div class="col-md-6">' +
                    '<img alt="Imagen de portada de un anime" class="img-fluid rounded-start mx-2 my-2" src = "' + kitsu[i]["attributes"]["posterImage"]["small"] + '"/>' +
                    '</div>' +
                    '<div class="col-md-12">' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">' +
                    kitsu[i]["attributes"]["canonicalTitle"] +
                    "</h5>" +
                    (aux == 1 ? "<form action='anadirfavorito.php' method='POST'><input type='hidden' name='idAnime' value='" + kitsu[i]["id"] + "'><input type='hidden' name='nombreUsuario' value='" + usuario + "'><input type='hidden' name='nombreAnime' value='" + kitsu[i]["attributes"]["canonicalTitle"] + "'><input type='hidden' name='idUsuario' value='" + idUsuario + "'><input type='hidden' name='enlaceAnime' value='" + enlaceAnime + "'><button type='submit' name='fav'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-heart' viewBox='0 0 16 16'>" +
                        '<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>' +
                        '</svg></button></form></div>' : '') +
                    '<p class="card-text">' +
                    kitsu[i]["attributes"]["synopsis"] +
                    "</p>" +
                    "</div>" +
                    '<div class="card-footer">' +
                    '<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop' + kitsu[i]["id"] + '">' +
                    'Informacion adicional' +
                    '</button>' +
                    '<div class="modal fade" id="staticBackdrop' + kitsu[i]["id"] + '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">' +
                    '<div class="modal-dialog">' +
                    '<div class="modal-content">' +
                    '<div class="modal-header">' +
                    '<h5 class="modal-title fw-bold" id="staticBackdropLabel">Informacion extra</h5>' +
                    '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>' +
                    '</div>' +
                    '<div class="modal-body">' +
                    '<span class="fw-bold">Puntuación media:</span> ' + kitsu[i]["attributes"]["averageRating"] + '<hr>' +
                    '<span class="fw-bold">Fecha de inicio:</span> ' + kitsu[i]["attributes"]["startDate"] + '<hr>' +
                    '<span class="fw-bold">Fecha de finalización:</span> ' + kitsu[i]["attributes"]["endDate"] + '<hr>' +
                    '<span class="fw-bold">Siguiente capitulo:</span> ' + kitsu[i]["attributes"]["nextRelease"] + '<hr>' +
                    '<span class="fw-bold">Guía de clasificación de edad:</span> ' + kitsu[i]["attributes"]["ageRatingGuide"] + '<hr>' +
                    '<span class="fw-bold">Estado:</span> ' + kitsu[i]["attributes"]["status"] + '<hr>' +
                    '<a class="fw/bold" target="_blank" href="https://m.youtube.com/watch?v=' + kitsu[i]["attributes"]["youtubeVideoId"] + '">Trailer</a>' +
                    '</div>' +
                    '<div class="modal-footer">' +
                    '<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<a target="_blank" href="https://kitsu.io/anime/' +
                    kitsu[i]["id"] +
                    '" class="btn btn-primary float-lg-end">&#10010; Info</a>' +
                    "</div>" +
                    "</div>"
                );



            }
        },
        error: function(xhr, status) {
            $("#kitsu").append(
                '<div class="card text-dark bg-info mb-3">' +
                '<div class="card-body">' +
                '<h5 class="card-title">Info de KITSU no disponible en este momento</h5>' +
                '<p class="card-text">Inténtelo de nuevo más tarde</p>' +
                "</div>" +
                "</div>"
            );
        },
    })
);
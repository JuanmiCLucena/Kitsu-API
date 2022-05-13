$(document).ready(


    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://kitsu.io/api/edge/trending/anime",
        crossDomain: true,

        success: function(json) {

            const kitsu = json.data;

            for (let i = 0; i < kitsu.length; i++) {


                $("#kitsu").append(
                    '<div class="card border-primary mt-4">' +
                    '<div class="card-header"><h4>' +
                    kitsu[i]["attributes"]["canonicalTitle"] +
                    "</h4></div>" +
                    '<div class="card-body">' +
                    '<img src = "' + kitsu[i]["attributes"]["coverImage"]["small"] + '"/>' +
                    '<p class="card-text">' +
                    kitsu[i]["attributes"]["synopsis"] +
                    "</p>" +
                    "</div>" +
                    '<div class="card-footer">' +
                    '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop' + kitsu[i]["id"] + '">' +
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
                    '<span class="fw-bold">Estado:</span> ' + kitsu[i]["attributes"]["status"] +
                    '</div>' +
                    '<div class="modal-footer">' +
                    '<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<a href="https://kitsu.io/anime/' +
                    kitsu[i]["id"] +
                    '" class="btn btn-primary float-end">&#10010; Info</a>' +
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
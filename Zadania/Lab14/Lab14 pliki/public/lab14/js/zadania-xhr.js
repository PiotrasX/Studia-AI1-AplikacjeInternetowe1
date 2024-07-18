const url = `http://localhost:8000/api/countries`;

// ------------- Zadanie 14.8 -------------

// console.log('Przed 14.8')
// const xhr = new XMLHttpRequest();
// xhr.open('GET', url, false);
// xhr.send();
// if (xhr.status === 200) {
//     console.log(xhr.responseText);
// }
// console.log('Po 14.8')

// ------------- Zadanie 14.9 -------------

// console.log('Przed 14.9')
// const xhr = new XMLHttpRequest();
// xhr.open('GET', url);
// xhr.responseType = 'json';
// xhr.send(null);
// xhr.onreadystatechange = function () {
//     if (this.readyState == 0) {
//         console.log("UNSET");
//     }
//     if (this.readyState == 1) {
//         console.log("OPEN");
//     }
//     if (this.readyState == 2) {
//         console.log("HEADERS_RECEIVED");
//     }
//     if (this.readyState == 3) {
//         console.log("LOADING");
//     }
//     if (this.readyState == 4 && this.status == 200) {
//         console.log("DONE");
//         console.log(xhr.response);
//     }
// }
// console.log('Po 14.9')

// ------------- Zadanie 14.10 -------------

// const id = 11;

// // Wykonanie zadania

// const xhr = new XMLHttpRequest();
// const new_url = url + '/' + id;
// xhr.open('GET', new_url, true);
// xhr.send();
// xhr.onreadystatechange = function () {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//             const odpowiedz = JSON.parse(xhr.responseText);
//             console.log("Kraj został pomyślnie pobrany:", odpowiedz);
//         } else if (xhr.status === 403) {
//             console.log("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//         } else if (xhr.status === 404) {
//             console.log("Błąd 404: Kraj nie znaleziony.");
//         } else if (xhr.status === 500) {
//             console.log("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//         } else {
//             console.log("Wystąpił nieoczekiwany błąd:", xhr.status, xhr.statusText);
//         }
//     }
// };

// ------------- Zadanie 14.11 -------------

// const czechy = {
//     name: "Czechy",
//     code: "CZ",
//     currency: "korona",
//     area: 78868,
//     language: "czeski"
// };

// // Wykonanie zadania

// const xhr = new XMLHttpRequest();
// xhr.open('POST', url, true);
// xhr.setRequestHeader('Content-Type', 'application/json');
// xhr.send(JSON.stringify(czechy));
// xhr.onreadystatechange = function () {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 201) {
//             const odpowiedz = JSON.parse(xhr.responseText);
//             console.log("Kraj został pomyślnie dodany:", odpowiedz);
//         } else if (xhr.status === 400) {
//             console.log("Błąd 400: Nieprawidłowe dane wejściowe.");
//         } else if (xhr.status === 403) {
//             console.log("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//         } else if (xhr.status === 500) {
//             console.log("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//         } else {
//             console.log("Wystąpił nieoczekiwany błąd:", xhr.status, xhr.statusText);
//         }
//     }
// };

// ------------- Zadanie 14.12 -------------

// const id = 6;

// const australia = {
//     name: "Australia",
//     code: "AU",
//     currency: "dolar australijski",
//     area: 7686850,
//     language: "angielski"
// };

// // Wykonanie zadania

// const xhr = new XMLHttpRequest();
// const new_url = url + '/' + id;
// xhr.open('PUT', new_url, true);
// xhr.setRequestHeader('Content-Type', 'application/json');
// xhr.send(JSON.stringify(australia));
// xhr.onreadystatechange = function () {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//             const odpowiedz = JSON.parse(xhr.responseText);
//             console.log("Kraj został pomyślnie zaktualizowany:", odpowiedz);
//         } else if (xhr.status === 400) {
//             console.log("Błąd 400: Nieprawidłowe dane wejściowe.");
//         } else if (xhr.status === 403) {
//             console.log("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//         } else if (xhr.status === 404) {
//             console.log("Błąd 404: Kraj nie znaleziony.");
//         } else if (xhr.status === 500) {
//             console.log("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//         } else {
//             console.log("Wystąpił nieoczekiwany błąd:", xhr.status, xhr.statusText);
//         }
//     }
// };

// ------------- Zadanie 14.13 -------------

// const id = 7;

// // Wykonanie zadania

// const xhr = new XMLHttpRequest();
// const new_url = url + '/' + id;
// xhr.open('DELETE', new_url, true);
// xhr.send();
// xhr.onreadystatechange = function() {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 204) {
//             console.log("Kraj został pomyślnie usunięty.");
//         } else if (xhr.status === 403) {
//             console.log("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//         } else if (xhr.status === 404) {
//             console.log("Błąd 404: Kraj nie znaleziony.");
//         } else if (xhr.status === 500) {
//             console.log("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//         } else {
//             console.log("Wystąpił nieoczekiwany błąd:", xhr.status, xhr.statusText);
//         }
//     }
// };

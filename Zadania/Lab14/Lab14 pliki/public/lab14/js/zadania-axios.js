const url = `http://localhost:8000/api/countries`;

// ------------- Zadanie 14.21 (16) -------------

// console.log('Przed 14.21')

// axios.get(url)
//     .then(response => console.log(response.data))
//     .catch(error => console.log(error.message));

// console.log('Po 14.21')

// ------------- Zadanie 14.21 (17)  -------------

// const id = 1;

// // Wykonanie zadania

// const new_url = url + '/' + id;
// axios.get(new_url)
//     .then(response => {
//         console.log("Kraj został pomyślnie pobrany:", response.data);
//     })
//     .catch(error => {
//         if (error.response) {
//             if (error.response.status === 403) {
//                 console.error("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//             } else if (error.response.status === 404) {
//                 console.error("Błąd 404: Kraj nie znaleziony.");
//             } else if (error.response.status === 500) {
//                 console.error("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//             } else {
//                 console.error("Wystąpił nieoczekiwany błąd:", error.response.status, error.response.statusText);
//             }
//         } else {
//             console.error("Żądanie nie powiodło się, sprawdź połączenie sieciowe.");
//         }
//     });

// ------------- Zadanie 14.21 (18) -------------

// const litwa = {
//     name: "Litwa",
//     code: "LT",
//     currency: "euro",
//     area: 49035,
//     language: "litewski"
// };

// // Wykonanie zadania

// axios.post(url, litwa)
//     .then(response => {
//         console.log("Kraj został pomyślnie dodany:", response.data);
//     })
//     .catch(error => {
//         if (error.response) {
//             if (error.response.status === 400) {
//                 console.error("Błąd 400: Nieprawidłowe dane wejściowe.");
//             } else if (error.response.status === 403) {
//                 console.error("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//             } else if (error.response.status === 500) {
//                 console.error("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//             } else {
//                 console.error("Wystąpił nieoczekiwany błąd:", error.response.status, error.response.statusText);
//             }
//         } else {
//             console.error("Żądanie nie powiodło się, sprawdź połączenie sieciowe.");
//         }
//     });

// ------------- Zadanie 14.21 (19) -------------

// const id = 6;

// const australia = {
//     name: "Australia",
//     code: "AU",
//     currency: "dolar australijski",
//     area: 7686850,
//     language: "angielski"
// };

// // Wykonanie zadania

// const new_url = url + '/' + id;
// axios.put(new_url, australia)
//     .then(response => {
//         console.log("Kraj został pomyślnie zaktualizowany:", response.data);
//     })
//     .catch(error => {
//         if (error.response) {
//             if (error.response.status === 400) {
//                 console.error("Błąd 400: Nieprawidłowe dane wejściowe.");
//             } else if (error.response.status === 403) {
//                 console.error("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//             } else if (error.response.status === 404) {
//                 console.error("Błąd 404: Kraj nie znaleziony.");
//             } else if (error.response.status === 500) {
//                 console.error("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//             } else {
//                 console.error("Wystąpił nieoczekiwany błąd:", error.response.status, error.response.statusText);
//             }
//         } else {
//             console.error("Żądanie nie powiodło się, sprawdź połączenie sieciowe.");
//         }
//     });

// ------------- Zadanie 14.21 (20) -------------

// const id = 9;

// // Wykonanie zadania

// const new_url = url + '/' + id;
// axios.delete(new_url)
//     .then(response => {
//         if (response.status === 204) {
//             console.log("Kraj został pomyślnie usunięty.");
//         }
//     })
//     .catch(error => {
//         if (error.response) {
//             if (error.response.status === 403) {
//                 console.error("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//             } else if (error.response.status === 404) {
//                 console.error("Błąd 404: Kraj nie znaleziony.");
//             } else if (error.response.status === 500) {
//                 console.error("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//             } else {
//                 console.error("Wystąpił nieoczekiwany błąd:", error.response.status, error.response.statusText);
//             }
//         } else {
//             console.error("Żądanie nie powiodło się, sprawdź połączenie sieciowe.");
//         }
//     });

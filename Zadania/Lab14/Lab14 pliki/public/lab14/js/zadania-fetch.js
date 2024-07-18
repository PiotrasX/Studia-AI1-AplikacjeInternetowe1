const url = `http://localhost:8000/api/countries`;

// ------------- Zadanie 14.15 -------------

// console.log('Przed 14.15')

// function getRandomInt(max) {
//     return Math.floor(Math.random() * max);
// }

// function checkIfEven(id) {
//     return new Promise((resolve, reject) => {
//         if (id % 2 == 0) {
//             resolve('Jest parzysty!');
//         } else {
//             reject('Nie jest parzysty!');
//         }
//     });
// }

// const id = getRandomInt(20);
// console.log(id);

// checkIfEven(id)
//     .then(data => console.log(data))
//     .catch(error => console.log(error))
//     .finally(() => console.log('Koniec1'));

// // lub
// checkIfEven(id).then(
//     data => console.log(data),
//     error => console.log(error)
// ).finally(() => console.log('Koniec2'));

// // lub
// async function funkcja(){
//     try {
//         const data = await checkIfEven(id);
//         console.log(data);
//     } catch (error) {
//         console.log(error);
//     } finally {
//         console.log('Koniec3');
//     }
// }

// funkcja();

// console.log('Po 14.15')

// ------------- Zadanie 14.16 -------------

// console.log('Przed 14.16')

// fetch(url)
//     .then(response => response.json())
//     .then(data => console.log(data))

// console.log('Po 14.16')

// ------------- Zadanie 14.17 -------------

// const id = 1;

// // Wykonanie zadania

// const new_url = url + '/' + id;
// fetch(new_url)
//     .then(response => {
//         if (response.ok) {
//             return response.json();
//         } else {
//             if (response.status === 403) {
//                 throw new Error("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//             } else if (response.status === 404) {
//                 throw new Error("Błąd 404: Kraj nie znaleziony.");
//             } else if (response.status === 500) {
//                 throw new Error("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//             } else {
//                 throw new Error(`Wystąpił nieoczekiwany błąd: ${response.status} ${response.statusText}`);
//             }
//         }
//     })
//     .then(data => {
//         console.log("Kraj został pomyślnie pobrany:", data);
//     })
//     .catch(error => {
//         console.error(error.message);
//     });

// ------------- Zadanie 14.18 -------------

// const slowacja = {
//     name: "Słowacja",
//     code: "SK",
//     currency: "euro",
//     area: 49035,
//     language: "słowacki"
// };

// // Wykonanie zadania

// fetch(url, {
//     method: 'POST',
//     headers: {
//         'Content-Type': 'application/json'
//     },
//     body: JSON.stringify(slowacja)
// })
//     .then(response => {
//         if (response.ok) {
//             return response.json();
//         } else {
//             if (response.status === 400) {
//                 throw new Error("Błąd 400: Nieprawidłowe dane wejściowe.");
//             } else if (response.status === 403) {
//                 throw new Error("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//             } else if (response.status === 500) {
//                 throw new Error("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//             } else {
//                 throw new Error(`Wystąpił nieoczekiwany błąd: ${response.status} ${response.statusText}`);
//             }
//         }
//     })
//     .then(data => {
//         console.log("Kraj został pomyślnie dodany:", data);
//     })
//     .catch(error => {
//         i
//         console.error(error.message);
//     });

// ------------- Zadanie 14.19 -------------

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
// fetch(new_url, {
//     method: 'PUT',
//     headers: {
//         'Content-Type': 'application/json'
//     },
//     body: JSON.stringify(australia)
// })
//     .then(response => {
//         if (response.ok) {
//             return response.json();
//         } else {
//             if (response.status === 400) {
//                 throw new Error("Błąd 400: Nieprawidłowe dane wejściowe.");
//             } else if (response.status === 403) {
//                 throw new Error("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//             } else if (response.status === 404) {
//                 throw new Error("Błąd 404: Kraj nie znaleziony.");
//             } else if (response.status === 500) {
//                 throw new Error("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//             } else {
//                 throw new Error(`Wystąpił nieoczekiwany błąd: ${response.status} ${response.statusText}`);
//             }
//         }
//     })
//     .then(data => {
//         console.log("Kraj został pomyślnie zaktualizowany:", data);
//     })
//     .catch(error => {
//         console.error(error.message);
//     });

// ------------- Zadanie 14.20 -------------

// const id = 8;

// // Wykonanie zadania

// const new_url = url + '/' + id;
// fetch(new_url, {
//     method: 'DELETE'
// })
//     .then(response => {
//         if (response.status === 204) {
//             console.log("Kraj został pomyślnie usunięty.");
//         } else if (response.status === 403) {
//             throw new Error("Błąd 403: Dostęp zabroniony, nie masz odpowiednich uprawnień.");
//         } else if (response.status === 404) {
//             throw new Error("Błąd 404: Kraj nie znaleziony.");
//         } else if (response.status === 500) {
//             throw new Error("Błąd 500: Wewnętrzny błąd serwera, spróbuj ponownie później.");
//         } else {
//             throw new Error(`Wystąpił nieoczekiwany błąd: ${response.status} ${response.statusText}`);
//         }
//     })
//     .catch(error => {
//         console.error(error.message);
//     });

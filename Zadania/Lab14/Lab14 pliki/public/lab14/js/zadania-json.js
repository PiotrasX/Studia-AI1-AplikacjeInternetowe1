// ------------- Zadanie 14.4 -------------

// const user = {
//     name: 'Jan',
//     age: 30,
//     salesman: true,
//     birthDate: new Date(2000, 11, 24, 10, 33, 30, 0),
//     salary: 12000.0,
//     gender: undefined,
//     card: null,
//     technologies: ['PHP', 'C#', 'Python', 'Java'],
//     description: function () {
//         return this.name + " " + this.age;
//     }
// };

// user = { name: "Adam" };

// console.log(JSON.stringify(user));

// console.log(JSON.stringify(user, ['name', 'age']));

// console.log(JSON.stringify(user, null));

// console.log(JSON.stringify(user, null, 4));

// const user2 = {
//     name: 'Marta',
//     age: 28,
//     toJSON: function () {
//         return "AAA";
//     }
// };

// console.log(JSON.stringify(user2));

// ------------- Zadanie 14.5 -------------

// const json3 = '{ "name": "Jan", "age": 30, "technologies": ["PHP", "Java"] }';
// const user3 = JSON.parse(json3);
// console.log(user3);

// try {
//     const json4 = '{ "name": "Jan", "age": 30, "technologies": ["PHP", "Java"] }'
//     JSON.parse(json4);
// } catch (error) {
//     console.log(error)
//     // Obsłużenie błędu parsowania JSON
// }

// ------------- Zadanie 14.6 -------------

// const json5 = '{ "name": "Jan", "age": 30, "technologies": ["PHP", "Java"] }';
// const user5 = JSON.parse(json5, (field, value) => {
//     if (field === 'name') {
//         return value.toUpperCase();
//     }
//     return value;
// });
// console.log(user5);

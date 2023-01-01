// import database
const db = require("../config/database");

// membuat class Student
class Student {
  // solution with callback
  //   static all(callback) {
  //     const query = "SELECT * FROM students";
  //     /**
  //      * Melakukan query meggunakan method query
  //      * Menerima 2 params: query dan callback
  //      */
  //     db.query(query, (err, results) => {
  //       callback(results);
  //     });
  //   }

  // solution with promise + async await
  static all() {
    return new Promise((resolve, reject) => {
      const query = "SELECT * FROM students";
      /**
       * Melakukan query meggunakan method query
       * Menerima 2 params: query dan callback
       */
      db.query(query, (err, results) => {
        resolve(results);
      });
    });
  }
}

// export class Student
module.exports = Student;

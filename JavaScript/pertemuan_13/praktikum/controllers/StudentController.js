// import Model Student
const Student = require("../models/Student");

// buat class StudentController
class StudentController {
  // index(req, res) {
  //   // memanggil method static all
  //   Student.all(function (students) {
  //     const data = {
  //       message: "Menampilkan semua students",
  //       data: students,
  //     };
  //     res.json(data);
  //   });
  // }

  // menambahkan keyword async untuk memberitahu proses asynchronous
  async index(req, res) {
    // memanggil method static all dengan async await
    const students = await Student.all();

    const data = {
      message: "Menampilkan semua students",
      data: students,
    };

    res.json(data);
  }

  store(req, res) {
    const { nama } = req.body;
    const data = {
      message: `Menambahkan data student: ${nama}`,
      data: [],
    };
    res.json(data);
  }

  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;
    const data = {
      message: `Mengedit data student ${id}, nama ${nama}`,
      data: [],
    };
    res.json(data);
  }

  destroy(req, res) {
    const { id } = req.params;
    const data = {
      message: `Menghapus data student ${id}`,
      data: [],
    };
    res.json(data);
  }
}

// membuat object StudenController
const object = new StudentController();

// export object StudentController
module.exports = object;

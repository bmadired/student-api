<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow p-4">
      <h3 class="text-center mb-4">Add New Student</h3>

      <form id="studentForm">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Date of Birth</label>
          <input type="date" id="date_of_birth" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Intake Class</label>
          <input type="text" id="intake_class" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Department ID</label>
          <input type="number" id="department_id" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Submit</button>
      </form>

      <div id="responseMsg" class="mt-3"></div>
    </div>
  </div>

  <!-- 👇 SCRIPT MUST BE HERE -->
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("studentForm");

    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      //alert("Submitting..."); // test if the script runs

      const data = {
        name: document.getElementById("name").value,
        date_of_birth: document.getElementById("date_of_birth").value,
        intake_class: document.getElementById("intake_class").value,
        department_id: document.getElementById("department_id").value
      };

      const response = await fetch("http://localhost/backend/student_api_ci/public/students", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
      });
      console.log(JSON.stringify(data));
      const result = await response.json();
      const msgDiv = document.getElementById("responseMsg");

      if (response.ok) {
        msgDiv.innerHTML = `<div class="alert alert-success">✅ ${result.message || 'Student added successfully!'}</div>`;
        form.reset();
      } else {
        msgDiv.innerHTML = `<div class="alert alert-danger">❌ ${result.message || 'Failed to add student.'}</div>`;
      }
    });
  });
  </script>
</body>
</html>
